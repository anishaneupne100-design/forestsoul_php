<?php
/**
 * Notification Model
 * Handles user notifications
 */

require_once __DIR__ . '/Model.php';

class Notification extends Model
{
    protected static $table = 'notifications';
    
    protected static $fillable = [
        'user_id',
        'type',
        'title',
        'message',
        'data',
        'is_read',
        'read_at'
    ];

    // Notification type constants
    const TYPE_BOOKING_CONFIRMED = 'booking_confirmed';
    const TYPE_BOOKING_CANCELLED = 'booking_cancelled';
    const TYPE_BOOKING_REMINDER = 'booking_reminder';
    const TYPE_SESSION_COMPLETED = 'session_completed';
    const TYPE_NEW_MESSAGE = 'new_message';
    const TYPE_POST_LIKED = 'post_liked';
    const TYPE_POST_COMMENTED = 'post_commented';
    const TYPE_EVENT_REMINDER = 'event_reminder';
    const TYPE_DONATION_RECEIVED = 'donation_received';
    const TYPE_SYSTEM = 'system';

    /**
     * Create a notification
     */
    public static function createNotification($data)
    {
        $notificationData = [
            'user_id' => $data['user_id'],
            'type' => $data['type'],
            'title' => $data['title'],
            'message' => $data['message'] ?? null,
            'data' => isset($data['data']) ? json_encode($data['data']) : null,
            'is_read' => false,
            'read_at' => null
        ];

        return self::create($notificationData);
    }

    /**
     * Get notifications for user
     */
    public static function getForUser($userId, $limit = 50, $unreadOnly = false)
    {
        $db = Database::getInstance()->getConnection();
        
        if ($unreadOnly) {
            $stmt = $db->prepare("
                SELECT * FROM " . self::$table . "
                WHERE user_id = ? AND is_read = 0
                ORDER BY created_at DESC
                LIMIT ?
            ");
        } else {
            $stmt = $db->prepare("
                SELECT * FROM " . self::$table . "
                WHERE user_id = ?
                ORDER BY created_at DESC
                LIMIT ?
            ");
        }
        
        $stmt->execute([$userId, $limit]);
        $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Decode JSON data
        foreach ($notifications as &$notification) {
            if ($notification['data']) {
                $notification['data'] = json_decode($notification['data'], true);
            }
        }
        
        return $notifications;
    }

    /**
     * Get unread count for user
     */
    public static function getUnreadCount($userId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT COUNT(*) as count FROM " . self::$table . "
            WHERE user_id = ? AND is_read = 0
        ");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }

    /**
     * Mark notification as read
     */
    public static function markAsRead($notificationId)
    {
        return self::update($notificationId, [
            'is_read' => true,
            'read_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Mark all notifications as read for user
     */
    public static function markAllAsRead($userId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET is_read = 1, read_at = NOW()
            WHERE user_id = ? AND is_read = 0
        ");
        return $stmt->execute([$userId]);
    }

    /**
     * Delete old notifications
     */
    public static function deleteOld($days = 30)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            DELETE FROM " . self::$table . "
            WHERE created_at < DATE_SUB(NOW(), INTERVAL ? DAY)
            AND is_read = 1
        ");
        return $stmt->execute([$days]);
    }

    /**
     * Create booking confirmation notification
     */
    public static function notifyBookingConfirmed($userId, $bookingData)
    {
        return self::createNotification([
            'user_id' => $userId,
            'type' => self::TYPE_BOOKING_CONFIRMED,
            'title' => 'Booking Confirmed',
            'message' => "Your therapy session has been confirmed for {$bookingData['scheduled_at']}",
            'data' => $bookingData
        ]);
    }

    /**
     * Create booking reminder notification
     */
    public static function notifyBookingReminder($userId, $bookingData)
    {
        return self::createNotification([
            'user_id' => $userId,
            'type' => self::TYPE_BOOKING_REMINDER,
            'title' => 'Session Reminder',
            'message' => "You have a therapy session coming up on {$bookingData['scheduled_at']}",
            'data' => $bookingData
        ]);
    }

    /**
     * Create post liked notification
     */
    public static function notifyPostLiked($userId, $likerName, $postTitle)
    {
        return self::createNotification([
            'user_id' => $userId,
            'type' => self::TYPE_POST_LIKED,
            'title' => 'New Like',
            'message' => "{$likerName} liked your post \"{$postTitle}\"",
            'data' => ['post_title' => $postTitle]
        ]);
    }

    /**
     * Create post commented notification
     */
    public static function notifyPostCommented($userId, $commenterName, $postTitle)
    {
        return self::createNotification([
            'user_id' => $userId,
            'type' => self::TYPE_POST_COMMENTED,
            'title' => 'New Comment',
            'message' => "{$commenterName} commented on your post \"{$postTitle}\"",
            'data' => ['post_title' => $postTitle]
        ]);
    }
}
