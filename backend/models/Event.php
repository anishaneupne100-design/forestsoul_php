<?php
/**
 * Event Model
 * Handles events like workshops, group sessions, webinars, etc.
 */

require_once __DIR__ . '/Model.php';

class Event extends Model
{
    protected static $table = 'events';
    
    protected static $fillable = [
        'title',
        'description',
        'event_type',
        'host_id',
        'location',
        'is_virtual',
        'meeting_link',
        'scheduled_at',
        'end_at',
        'max_participants',
        'current_participants',
        'price',
        'is_free',
        'status',
        'image_url',
        'category'
    ];

    // Event status constants
    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_COMPLETED = 'completed';

    // Event type constants
    const TYPE_WORKSHOP = 'workshop';
    const TYPE_WEBINAR = 'webinar';
    const TYPE_GROUP_SESSION = 'group_session';
    const TYPE_RETREAT = 'retreat';
    const TYPE_SEMINAR = 'seminar';

    /**
     * Create a new event
     */
    public static function createEvent($data)
    {
        $eventData = [
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'event_type' => $data['event_type'] ?? self::TYPE_WORKSHOP,
            'host_id' => $data['host_id'],
            'location' => $data['location'] ?? null,
            'is_virtual' => $data['is_virtual'] ?? false,
            'meeting_link' => $data['meeting_link'] ?? null,
            'scheduled_at' => $data['scheduled_at'],
            'end_at' => $data['end_at'] ?? null,
            'max_participants' => $data['max_participants'] ?? null,
            'current_participants' => 0,
            'price' => $data['price'] ?? 0.00,
            'is_free' => $data['is_free'] ?? true,
            'status' => self::STATUS_DRAFT,
            'image_url' => $data['image_url'] ?? null,
            'category' => $data['category'] ?? null
        ];

        return self::create($eventData);
    }

    /**
     * Get upcoming events
     */
    public static function getUpcoming($limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT e.*, u.name as host_name, u.avatar as host_avatar
            FROM " . self::$table . " e
            LEFT JOIN users u ON e.host_id = u.id
            WHERE e.scheduled_at > NOW()
            AND e.status = ?
            ORDER BY e.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([self::STATUS_PUBLISHED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get past events
     */
    public static function getPast($limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT e.*, u.name as host_name
            FROM " . self::$table . " e
            LEFT JOIN users u ON e.host_id = u.id
            WHERE e.scheduled_at < NOW()
            AND e.status IN (?, ?)
            ORDER BY e.scheduled_at DESC
            LIMIT ?
        ");
        $stmt->execute([self::STATUS_PUBLISHED, self::STATUS_COMPLETED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get events by type
     */
    public static function getByType($type, $limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT e.*, u.name as host_name
            FROM " . self::$table . " e
            LEFT JOIN users u ON e.host_id = u.id
            WHERE e.event_type = ?
            AND e.status = ?
            AND e.scheduled_at > NOW()
            ORDER BY e.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([$type, self::STATUS_PUBLISHED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get events by host
     */
    public static function getByHost($hostId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT * FROM " . self::$table . "
            WHERE host_id = ?
            ORDER BY scheduled_at DESC
        ");
        $stmt->execute([$hostId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get event with host details
     */
    public static function getWithHost($eventId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT e.*, u.name as host_name, u.avatar as host_avatar, u.bio as host_bio
            FROM " . self::$table . " e
            LEFT JOIN users u ON e.host_id = u.id
            WHERE e.id = ?
        ");
        $stmt->execute([$eventId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update event status
     */
    public static function updateStatus($eventId, $status)
    {
        return self::update($eventId, ['status' => $status]);
    }

    /**
     * Increment participant count
     */
    public static function incrementParticipants($eventId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET current_participants = current_participants + 1
            WHERE id = ?
        ");
        return $stmt->execute([$eventId]);
    }

    /**
     * Decrement participant count
     */
    public static function decrementParticipants($eventId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET current_participants = GREATEST(current_participants - 1, 0)
            WHERE id = ?
        ");
        return $stmt->execute([$eventId]);
    }

    /**
     * Check if event has available slots
     */
    public static function hasAvailableSlots($eventId)
    {
        $event = self::find($eventId);
        if (!$event) return false;
        
        if ($event['max_participants'] === null) return true;
        
        return $event['current_participants'] < $event['max_participants'];
    }

    /**
     * Search events
     */
    public static function search($query, $limit = 20)
    {
        $db = Database::getInstance()->getConnection();
        $searchTerm = "%{$query}%";
        $stmt = $db->prepare("
            SELECT e.*, u.name as host_name
            FROM " . self::$table . " e
            LEFT JOIN users u ON e.host_id = u.id
            WHERE (e.title LIKE ? OR e.description LIKE ? OR e.category LIKE ?)
            AND e.status = ?
            ORDER BY e.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([$searchTerm, $searchTerm, $searchTerm, self::STATUS_PUBLISHED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get events by category
     */
    public static function getByCategory($category, $limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT e.*, u.name as host_name
            FROM " . self::$table . " e
            LEFT JOIN users u ON e.host_id = u.id
            WHERE e.category = ?
            AND e.status = ?
            AND e.scheduled_at > NOW()
            ORDER BY e.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([$category, self::STATUS_PUBLISHED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get free events
     */
    public static function getFreeEvents($limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT e.*, u.name as host_name
            FROM " . self::$table . " e
            LEFT JOIN users u ON e.host_id = u.id
            WHERE e.is_free = 1
            AND e.status = ?
            AND e.scheduled_at > NOW()
            ORDER BY e.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([self::STATUS_PUBLISHED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get statistics
     */
    public static function getStatistics()
    {
        $db = Database::getInstance()->getConnection();
        
        $stmt = $db->query("SELECT COUNT(*) as total FROM " . self::$table);
        $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        
        $stmt = $db->prepare("SELECT COUNT(*) as upcoming FROM " . self::$table . " WHERE scheduled_at > NOW() AND status = ?");
        $stmt->execute([self::STATUS_PUBLISHED]);
        $upcoming = $stmt->fetch(PDO::FETCH_ASSOC)['upcoming'];
        
        $stmt = $db->prepare("SELECT COUNT(*) as completed FROM " . self::$table . " WHERE status = ?");
        $stmt->execute([self::STATUS_COMPLETED]);
        $completed = $stmt->fetch(PDO::FETCH_ASSOC)['completed'];
        
        $stmt = $db->query("SELECT SUM(current_participants) as total_participants FROM " . self::$table);
        $totalParticipants = $stmt->fetch(PDO::FETCH_ASSOC)['total_participants'] ?? 0;
        
        return [
            'total_events' => $total,
            'upcoming_events' => $upcoming,
            'completed_events' => $completed,
            'total_participants' => $totalParticipants
        ];
    }
}
