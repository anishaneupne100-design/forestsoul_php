<?php
/**
 * EventRegistration Model
 * Handles user registrations for events
 */

require_once __DIR__ . '/Model.php';

class EventRegistration extends Model
{
    protected static $table = 'event_registrations';
    
    protected static $fillable = [
        'event_id',
        'user_id',
        'status',
        'registered_at'
    ];

    // Registration status constants
    const STATUS_REGISTERED = 'registered';
    const STATUS_ATTENDED = 'attended';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_NO_SHOW = 'no_show';

    /**
     * Register for an event
     */
    public static function register($eventId, $userId)
    {
        require_once __DIR__ . '/Event.php';
        
        // Check if already registered
        if (self::isRegistered($eventId, $userId)) {
            return ['success' => false, 'message' => 'Already registered for this event'];
        }
        
        // Check if event has available slots
        if (!Event::hasAvailableSlots($eventId)) {
            return ['success' => false, 'message' => 'Event is full'];
        }
        
        $registration = self::create([
            'event_id' => $eventId,
            'user_id' => $userId,
            'status' => self::STATUS_REGISTERED,
            'registered_at' => date('Y-m-d H:i:s')
        ]);
        
        if ($registration) {
            Event::incrementParticipants($eventId);
            return ['success' => true, 'message' => 'Successfully registered', 'registration' => $registration];
        }
        
        return ['success' => false, 'message' => 'Registration failed'];
    }

    /**
     * Cancel registration
     */
    public static function cancelRegistration($eventId, $userId)
    {
        require_once __DIR__ . '/Event.php';
        
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET status = ?
            WHERE event_id = ? AND user_id = ? AND status = ?
        ");
        $result = $stmt->execute([self::STATUS_CANCELLED, $eventId, $userId, self::STATUS_REGISTERED]);
        
        if ($result && $stmt->rowCount() > 0) {
            Event::decrementParticipants($eventId);
            return ['success' => true, 'message' => 'Registration cancelled'];
        }
        
        return ['success' => false, 'message' => 'Could not cancel registration'];
    }

    /**
     * Check if user is registered for an event
     */
    public static function isRegistered($eventId, $userId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT COUNT(*) as count FROM " . self::$table . "
            WHERE event_id = ? AND user_id = ? AND status = ?
        ");
        $stmt->execute([$eventId, $userId, self::STATUS_REGISTERED]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'] > 0;
    }

    /**
     * Get registrations for an event
     */
    public static function getForEvent($eventId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT er.*, u.name as user_name, u.email as user_email, u.avatar as user_avatar
            FROM " . self::$table . " er
            LEFT JOIN users u ON er.user_id = u.id
            WHERE er.event_id = ?
            ORDER BY er.registered_at ASC
        ");
        $stmt->execute([$eventId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get user's event registrations
     */
    public static function getForUser($userId, $status = null)
    {
        $db = Database::getInstance()->getConnection();
        
        if ($status) {
            $stmt = $db->prepare("
                SELECT er.*, e.title as event_title, e.scheduled_at, e.location, e.is_virtual
                FROM " . self::$table . " er
                LEFT JOIN events e ON er.event_id = e.id
                WHERE er.user_id = ? AND er.status = ?
                ORDER BY e.scheduled_at ASC
            ");
            $stmt->execute([$userId, $status]);
        } else {
            $stmt = $db->prepare("
                SELECT er.*, e.title as event_title, e.scheduled_at, e.location, e.is_virtual
                FROM " . self::$table . " er
                LEFT JOIN events e ON er.event_id = e.id
                WHERE er.user_id = ?
                ORDER BY e.scheduled_at ASC
            ");
            $stmt->execute([$userId]);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get upcoming registered events for user
     */
    public static function getUpcomingForUser($userId, $limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT er.*, e.title as event_title, e.scheduled_at, e.location, e.is_virtual, e.meeting_link
            FROM " . self::$table . " er
            LEFT JOIN events e ON er.event_id = e.id
            WHERE er.user_id = ?
            AND er.status = ?
            AND e.scheduled_at > NOW()
            ORDER BY e.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([$userId, self::STATUS_REGISTERED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mark attendance
     */
    public static function markAttended($eventId, $userId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET status = ?
            WHERE event_id = ? AND user_id = ?
        ");
        return $stmt->execute([self::STATUS_ATTENDED, $eventId, $userId]);
    }

    /**
     * Mark no show
     */
    public static function markNoShow($eventId, $userId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET status = ?
            WHERE event_id = ? AND user_id = ?
        ");
        return $stmt->execute([self::STATUS_NO_SHOW, $eventId, $userId]);
    }

    /**
     * Get registration count for event
     */
    public static function getRegistrationCount($eventId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT COUNT(*) as count FROM " . self::$table . "
            WHERE event_id = ? AND status = ?
        ");
        $stmt->execute([$eventId, self::STATUS_REGISTERED]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }

    /**
     * Get attendance statistics for event
     */
    public static function getEventStatistics($eventId)
    {
        $db = Database::getInstance()->getConnection();
        
        $stmt = $db->prepare("
            SELECT status, COUNT(*) as count
            FROM " . self::$table . "
            WHERE event_id = ?
            GROUP BY status
        ");
        $stmt->execute([$eventId]);
        
        $stats = [
            'registered' => 0,
            'attended' => 0,
            'cancelled' => 0,
            'no_show' => 0
        ];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $stats[$row['status']] = $row['count'];
        }
        
        return $stats;
    }
}
