<?php
/**
 * UserProgress Model
 * Tracks user progress in activities (meditation, yoga, games, etc.)
 */

require_once __DIR__ . '/Model.php';

class UserProgress extends Model
{
    protected static $table = 'user_progress';
    
    protected static $fillable = [
        'user_id',
        'activity_type',
        'activity_id',
        'duration_minutes',
        'completed_at',
        'notes',
        'score'
    ];

    // Activity type constants
    const TYPE_MEDITATION = 'meditation';
    const TYPE_YOGA = 'yoga';
    const TYPE_GAME = 'game';
    const TYPE_QUESTIONNAIRE = 'questionnaire';
    const TYPE_THERAPY = 'therapy';
    const TYPE_READING = 'reading';

    /**
     * Log an activity
     */
    public static function logActivity($data)
    {
        $progressData = [
            'user_id' => $data['user_id'],
            'activity_type' => $data['activity_type'],
            'activity_id' => $data['activity_id'] ?? null,
            'duration_minutes' => $data['duration_minutes'] ?? 0,
            'completed_at' => $data['completed_at'] ?? date('Y-m-d H:i:s'),
            'notes' => $data['notes'] ?? null,
            'score' => $data['score'] ?? null
        ];

        return self::create($progressData);
    }

    /**
     * Get progress by user
     */
    public static function getByUser($userId, $limit = 50)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT * FROM " . self::$table . "
            WHERE user_id = ?
            ORDER BY completed_at DESC
            LIMIT ?
        ");
        $stmt->execute([$userId, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get progress by activity type
     */
    public static function getByActivityType($userId, $activityType)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT * FROM " . self::$table . "
            WHERE user_id = ? AND activity_type = ?
            ORDER BY completed_at DESC
        ");
        $stmt->execute([$userId, $activityType]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get total duration by activity type
     */
    public static function getTotalDuration($userId, $activityType = null)
    {
        $db = Database::getInstance()->getConnection();
        
        if ($activityType) {
            $stmt = $db->prepare("
                SELECT SUM(duration_minutes) as total FROM " . self::$table . "
                WHERE user_id = ? AND activity_type = ?
            ");
            $stmt->execute([$userId, $activityType]);
        } else {
            $stmt = $db->prepare("
                SELECT SUM(duration_minutes) as total FROM " . self::$table . "
                WHERE user_id = ?
            ");
            $stmt->execute([$userId]);
        }
        
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    }

    /**
     * Get activity count
     */
    public static function getActivityCount($userId, $activityType = null)
    {
        $db = Database::getInstance()->getConnection();
        
        if ($activityType) {
            $stmt = $db->prepare("
                SELECT COUNT(*) as count FROM " . self::$table . "
                WHERE user_id = ? AND activity_type = ?
            ");
            $stmt->execute([$userId, $activityType]);
        } else {
            $stmt = $db->prepare("
                SELECT COUNT(*) as count FROM " . self::$table . "
                WHERE user_id = ?
            ");
            $stmt->execute([$userId]);
        }
        
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }

    /**
     * Get daily statistics for a user
     */
    public static function getDailyStats($userId, $date = null)
    {
        $date = $date ?? date('Y-m-d');
        $db = Database::getInstance()->getConnection();
        
        $stmt = $db->prepare("
            SELECT 
                activity_type,
                COUNT(*) as count,
                SUM(duration_minutes) as total_duration
            FROM " . self::$table . "
            WHERE user_id = ? AND DATE(completed_at) = ?
            GROUP BY activity_type
        ");
        $stmt->execute([$userId, $date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get weekly statistics for a user
     */
    public static function getWeeklyStats($userId)
    {
        $db = Database::getInstance()->getConnection();
        
        $stmt = $db->prepare("
            SELECT 
                DATE(completed_at) as date,
                activity_type,
                COUNT(*) as count,
                SUM(duration_minutes) as total_duration
            FROM " . self::$table . "
            WHERE user_id = ? AND completed_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
            GROUP BY DATE(completed_at), activity_type
            ORDER BY DATE(completed_at) ASC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get user streak (consecutive days of activity)
     */
    public static function getStreak($userId)
    {
        $db = Database::getInstance()->getConnection();
        
        $stmt = $db->prepare("
            SELECT DISTINCT DATE(completed_at) as activity_date
            FROM " . self::$table . "
            WHERE user_id = ?
            ORDER BY activity_date DESC
        ");
        $stmt->execute([$userId]);
        $dates = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        if (empty($dates)) return 0;
        
        $streak = 0;
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        
        // Check if user has activity today or yesterday to start the streak
        if ($dates[0] !== $today && $dates[0] !== $yesterday) {
            return 0;
        }
        
        $expectedDate = $dates[0];
        foreach ($dates as $date) {
            if ($date === $expectedDate) {
                $streak++;
                $expectedDate = date('Y-m-d', strtotime($expectedDate . ' -1 day'));
            } else {
                break;
            }
        }
        
        return $streak;
    }

    /**
     * Get user summary statistics
     */
    public static function getUserSummary($userId)
    {
        $db = Database::getInstance()->getConnection();
        
        $stmt = $db->prepare("
            SELECT 
                COUNT(*) as total_activities,
                SUM(duration_minutes) as total_minutes,
                COUNT(DISTINCT activity_type) as activity_types,
                COUNT(DISTINCT DATE(completed_at)) as active_days
            FROM " . self::$table . "
            WHERE user_id = ?
        ");
        $stmt->execute([$userId]);
        $summary = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $summary['streak'] = self::getStreak($userId);
        
        return $summary;
    }

    /**
     * Get recent activities
     */
    public static function getRecent($userId, $limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT * FROM " . self::$table . "
            WHERE user_id = ?
            ORDER BY completed_at DESC
            LIMIT ?
        ");
        $stmt->execute([$userId, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
