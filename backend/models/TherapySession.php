<?php
/**
 * TherapySession Model
 * Handles therapy sessions table (existing schema)
 */

require_once __DIR__ . '/Model.php';

class TherapySession extends Model
{
    protected static $table = 'therapy_sessions';
    
    protected static $fillable = [
        'user_id',
        'therapist_id',
        'scheduled_at',
        'duration_minutes',
        'status',
        'notes'
    ];

    // Status constants
    const STATUS_SCHEDULED = 'scheduled';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_NO_SHOW = 'no_show';

    /**
     * Create a new therapy session
     */
    public static function createSession($data)
    {
        $sessionData = [
            'user_id' => $data['user_id'],
            'therapist_id' => $data['therapist_id'],
            'scheduled_at' => $data['scheduled_at'],
            'duration_minutes' => $data['duration_minutes'] ?? 60,
            'status' => self::STATUS_SCHEDULED,
            'notes' => $data['notes'] ?? null
        ];

        return self::create($sessionData);
    }

    /**
     * Get sessions by user
     */
    public static function getByUser($userId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT ts.*, u.name as therapist_name, u.avatar as therapist_avatar
            FROM " . self::$table . " ts
            LEFT JOIN users u ON ts.therapist_id = u.id
            WHERE ts.user_id = ?
            ORDER BY ts.scheduled_at DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get sessions by therapist
     */
    public static function getByTherapist($therapistId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT ts.*, u.name as user_name, u.email as user_email
            FROM " . self::$table . " ts
            LEFT JOIN users u ON ts.user_id = u.id
            WHERE ts.therapist_id = ?
            ORDER BY ts.scheduled_at ASC
        ");
        $stmt->execute([$therapistId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get upcoming sessions for user
     */
    public static function getUpcomingForUser($userId, $limit = 5)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT ts.*, u.name as therapist_name, u.avatar as therapist_avatar
            FROM " . self::$table . " ts
            LEFT JOIN users u ON ts.therapist_id = u.id
            WHERE ts.user_id = ?
            AND ts.scheduled_at > NOW()
            AND ts.status = ?
            ORDER BY ts.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([$userId, self::STATUS_SCHEDULED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get upcoming sessions for therapist
     */
    public static function getUpcomingForTherapist($therapistId, $limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT ts.*, u.name as user_name, u.email as user_email
            FROM " . self::$table . " ts
            LEFT JOIN users u ON ts.user_id = u.id
            WHERE ts.therapist_id = ?
            AND ts.scheduled_at > NOW()
            AND ts.status = ?
            ORDER BY ts.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([$therapistId, self::STATUS_SCHEDULED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Update session status
     */
    public static function updateStatus($sessionId, $status)
    {
        return self::update($sessionId, ['status' => $status]);
    }

    /**
     * Cancel session
     */
    public static function cancel($sessionId)
    {
        return self::updateStatus($sessionId, self::STATUS_CANCELLED);
    }

    /**
     * Complete session
     */
    public static function complete($sessionId, $notes = null)
    {
        $data = ['status' => self::STATUS_COMPLETED];
        if ($notes) {
            $data['notes'] = $notes;
        }
        return self::update($sessionId, $data);
    }

    /**
     * Get session with full details
     */
    public static function getWithDetails($sessionId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT ts.*,
                   t.name as therapist_name, t.avatar as therapist_avatar, t.bio as therapist_bio,
                   u.name as user_name, u.email as user_email
            FROM " . self::$table . " ts
            LEFT JOIN users t ON ts.therapist_id = t.id
            LEFT JOIN users u ON ts.user_id = u.id
            WHERE ts.id = ?
        ");
        $stmt->execute([$sessionId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get sessions for a specific date
     */
    public static function getByDate($date, $therapistId = null)
    {
        $db = Database::getInstance()->getConnection();
        
        if ($therapistId) {
            $stmt = $db->prepare("
                SELECT ts.*, u.name as user_name
                FROM " . self::$table . " ts
                LEFT JOIN users u ON ts.user_id = u.id
                WHERE DATE(ts.scheduled_at) = ? AND ts.therapist_id = ?
                ORDER BY ts.scheduled_at ASC
            ");
            $stmt->execute([$date, $therapistId]);
        } else {
            $stmt = $db->prepare("
                SELECT ts.*, u.name as user_name, t.name as therapist_name
                FROM " . self::$table . " ts
                LEFT JOIN users u ON ts.user_id = u.id
                LEFT JOIN users t ON ts.therapist_id = t.id
                WHERE DATE(ts.scheduled_at) = ?
                ORDER BY ts.scheduled_at ASC
            ");
            $stmt->execute([$date]);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get statistics
     */
    public static function getStatistics($therapistId = null)
    {
        $db = Database::getInstance()->getConnection();
        
        $whereClause = $therapistId ? "WHERE therapist_id = ?" : "";
        $params = $therapistId ? [$therapistId] : [];
        
        $stmt = $db->prepare("SELECT COUNT(*) as total FROM " . self::$table . " " . $whereClause);
        $stmt->execute($params);
        $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        
        $stmt = $db->prepare("SELECT COUNT(*) as completed FROM " . self::$table . " " .
            ($therapistId ? "WHERE therapist_id = ? AND status = ?" : "WHERE status = ?"));
        $stmt->execute($therapistId ? [$therapistId, self::STATUS_COMPLETED] : [self::STATUS_COMPLETED]);
        $completed = $stmt->fetch(PDO::FETCH_ASSOC)['completed'];
        
        $stmt = $db->prepare("SELECT COUNT(*) as scheduled FROM " . self::$table . " " .
            ($therapistId ? "WHERE therapist_id = ? AND status = ? AND scheduled_at > NOW()" : "WHERE status = ? AND scheduled_at > NOW()"));
        $stmt->execute($therapistId ? [$therapistId, self::STATUS_SCHEDULED] : [self::STATUS_SCHEDULED]);
        $scheduled = $stmt->fetch(PDO::FETCH_ASSOC)['scheduled'];
        
        return [
            'total_sessions' => $total,
            'completed_sessions' => $completed,
            'upcoming_sessions' => $scheduled
        ];
    }
}
