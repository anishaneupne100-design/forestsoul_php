<?php
/**
 * Booking Model
 * Handles therapy session bookings between users and therapists
 */

require_once __DIR__ . '/Model.php';

class Booking extends Model
{
    protected static $table = 'bookings';
    
    protected static $fillable = [
        'user_id',
        'therapist_id',
        'event_id',
        'therapy_type',
        'scheduled_at',
        'duration_minutes',
        'status',
        'notes',
        'user_notes',
        'therapist_notes',
        'cancellation_reason',
        'price',
        'payment_status',
        'meeting_link',
        'is_virtual'
    ];

    // Booking status constants
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_NO_SHOW = 'no_show';
    const STATUS_RESCHEDULED = 'rescheduled';

    // Payment status constants
    const PAYMENT_PENDING = 'pending';
    const PAYMENT_PAID = 'paid';
    const PAYMENT_REFUNDED = 'refunded';

    // Therapy type constants
    const TYPE_INDIVIDUAL = 'individual';
    const TYPE_COUPLE = 'couple';
    const TYPE_GROUP = 'group';
    const TYPE_FAMILY = 'family';

    /**
     * Create a new booking
     */
    public static function createBooking($data)
    {
        $bookingData = [
            'user_id' => $data['user_id'],
            'therapist_id' => $data['therapist_id'],
            'event_id' => $data['event_id'] ?? null,
            'therapy_type' => $data['therapy_type'] ?? self::TYPE_INDIVIDUAL,
            'scheduled_at' => $data['scheduled_at'],
            'duration_minutes' => $data['duration_minutes'] ?? 60,
            'status' => self::STATUS_PENDING,
            'notes' => $data['notes'] ?? null,
            'user_notes' => $data['user_notes'] ?? null,
            'price' => $data['price'] ?? 0.00,
            'payment_status' => self::PAYMENT_PENDING,
            'meeting_link' => $data['meeting_link'] ?? null,
            'is_virtual' => $data['is_virtual'] ?? true
        ];

        return self::create($bookingData);
    }

    /**
     * Get bookings by user
     */
    public static function getByUser($userId, $status = null)
    {
        $db = Database::getInstance()->getConnection();
        
        if ($status) {
            $stmt = $db->prepare("
                SELECT b.*, u.name as therapist_name, u.avatar as therapist_avatar, u.email as therapist_email
                FROM " . self::$table . " b
                LEFT JOIN users u ON b.therapist_id = u.id
                WHERE b.user_id = ? AND b.status = ?
                ORDER BY b.scheduled_at DESC
            ");
            $stmt->execute([$userId, $status]);
        } else {
            $stmt = $db->prepare("
                SELECT b.*, u.name as therapist_name, u.avatar as therapist_avatar, u.email as therapist_email
                FROM " . self::$table . " b
                LEFT JOIN users u ON b.therapist_id = u.id
                WHERE b.user_id = ?
                ORDER BY b.scheduled_at DESC
            ");
            $stmt->execute([$userId]);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get bookings by therapist
     */
    public static function getByTherapist($therapistId, $status = null)
    {
        $db = Database::getInstance()->getConnection();
        
        if ($status) {
            $stmt = $db->prepare("
                SELECT b.*, u.name as user_name, u.email as user_email, u.phone as user_phone
                FROM " . self::$table . " b
                LEFT JOIN users u ON b.user_id = u.id
                WHERE b.therapist_id = ? AND b.status = ?
                ORDER BY b.scheduled_at ASC
            ");
            $stmt->execute([$therapistId, $status]);
        } else {
            $stmt = $db->prepare("
                SELECT b.*, u.name as user_name, u.email as user_email, u.phone as user_phone
                FROM " . self::$table . " b
                LEFT JOIN users u ON b.user_id = u.id
                WHERE b.therapist_id = ?
                ORDER BY b.scheduled_at ASC
            ");
            $stmt->execute([$therapistId]);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get upcoming bookings for user
     */
    public static function getUpcomingForUser($userId, $limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT b.*, u.name as therapist_name, u.avatar as therapist_avatar
            FROM " . self::$table . " b
            LEFT JOIN users u ON b.therapist_id = u.id
            WHERE b.user_id = ?
            AND b.scheduled_at > NOW()
            AND b.status IN (?, ?)
            ORDER BY b.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([$userId, self::STATUS_PENDING, self::STATUS_CONFIRMED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get upcoming bookings for therapist
     */
    public static function getUpcomingForTherapist($therapistId, $limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT b.*, u.name as user_name, u.email as user_email
            FROM " . self::$table . " b
            LEFT JOIN users u ON b.user_id = u.id
            WHERE b.therapist_id = ?
            AND b.scheduled_at > NOW()
            AND b.status IN (?, ?)
            ORDER BY b.scheduled_at ASC
            LIMIT ?
        ");
        $stmt->execute([$therapistId, self::STATUS_PENDING, self::STATUS_CONFIRMED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get booking with full details
     */
    public static function getWithDetails($bookingId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT b.*, 
                   t.name as therapist_name, t.avatar as therapist_avatar, t.email as therapist_email, t.bio as therapist_bio,
                   u.name as user_name, u.email as user_email, u.phone as user_phone
            FROM " . self::$table . " b
            LEFT JOIN users t ON b.therapist_id = t.id
            LEFT JOIN users u ON b.user_id = u.id
            WHERE b.id = ?
        ");
        $stmt->execute([$bookingId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update booking status
     */
    public static function updateStatus($bookingId, $status, $reason = null)
    {
        $data = ['status' => $status];
        if ($reason && $status === self::STATUS_CANCELLED) {
            $data['cancellation_reason'] = $reason;
        }
        return self::update($bookingId, $data);
    }

    /**
     * Confirm booking
     */
    public static function confirm($bookingId)
    {
        return self::updateStatus($bookingId, self::STATUS_CONFIRMED);
    }

    /**
     * Cancel booking
     */
    public static function cancel($bookingId, $reason = null)
    {
        return self::updateStatus($bookingId, self::STATUS_CANCELLED, $reason);
    }

    /**
     * Mark booking as completed
     */
    public static function complete($bookingId, $therapistNotes = null)
    {
        $data = ['status' => self::STATUS_COMPLETED];
        if ($therapistNotes) {
            $data['therapist_notes'] = $therapistNotes;
        }
        return self::update($bookingId, $data);
    }

    /**
     * Update payment status
     */
    public static function updatePaymentStatus($bookingId, $paymentStatus)
    {
        return self::update($bookingId, ['payment_status' => $paymentStatus]);
    }

    /**
     * Get available time slots for a therapist
     */
    public static function getBookedSlots($therapistId, $date)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT scheduled_at, duration_minutes
            FROM " . self::$table . "
            WHERE therapist_id = ?
            AND DATE(scheduled_at) = ?
            AND status NOT IN (?, ?)
        ");
        $stmt->execute([$therapistId, $date, self::STATUS_CANCELLED, self::STATUS_NO_SHOW]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Check if time slot is available
     */
    public static function isSlotAvailable($therapistId, $scheduledAt, $durationMinutes = 60)
    {
        $db = Database::getInstance()->getConnection();
        $endTime = date('Y-m-d H:i:s', strtotime($scheduledAt . " +{$durationMinutes} minutes"));
        
        $stmt = $db->prepare("
            SELECT COUNT(*) as count
            FROM " . self::$table . "
            WHERE therapist_id = ?
            AND status NOT IN (?, ?)
            AND (
                (scheduled_at <= ? AND DATE_ADD(scheduled_at, INTERVAL duration_minutes MINUTE) > ?)
                OR (scheduled_at < ? AND DATE_ADD(scheduled_at, INTERVAL duration_minutes MINUTE) >= ?)
                OR (scheduled_at >= ? AND scheduled_at < ?)
            )
        ");
        $stmt->execute([
            $therapistId,
            self::STATUS_CANCELLED,
            self::STATUS_NO_SHOW,
            $scheduledAt, $scheduledAt,
            $endTime, $endTime,
            $scheduledAt, $endTime
        ]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'] == 0;
    }

    /**
     * Get bookings for a specific date
     */
    public static function getByDate($date, $therapistId = null)
    {
        $db = Database::getInstance()->getConnection();
        
        if ($therapistId) {
            $stmt = $db->prepare("
                SELECT b.*, u.name as user_name
                FROM " . self::$table . " b
                LEFT JOIN users u ON b.user_id = u.id
                WHERE DATE(b.scheduled_at) = ?
                AND b.therapist_id = ?
                ORDER BY b.scheduled_at ASC
            ");
            $stmt->execute([$date, $therapistId]);
        } else {
            $stmt = $db->prepare("
                SELECT b.*, u.name as user_name, t.name as therapist_name
                FROM " . self::$table . " b
                LEFT JOIN users u ON b.user_id = u.id
                LEFT JOIN users t ON b.therapist_id = t.id
                WHERE DATE(b.scheduled_at) = ?
                ORDER BY b.scheduled_at ASC
            ");
            $stmt->execute([$date]);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get booking statistics
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
        
        $stmt = $db->prepare("SELECT COUNT(*) as cancelled FROM " . self::$table . " " .
            ($therapistId ? "WHERE therapist_id = ? AND status = ?" : "WHERE status = ?"));
        $stmt->execute($therapistId ? [$therapistId, self::STATUS_CANCELLED] : [self::STATUS_CANCELLED]);
        $cancelled = $stmt->fetch(PDO::FETCH_ASSOC)['cancelled'];
        
        $stmt = $db->prepare("SELECT SUM(price) as revenue FROM " . self::$table . " " .
            ($therapistId ? "WHERE therapist_id = ? AND payment_status = ?" : "WHERE payment_status = ?"));
        $stmt->execute($therapistId ? [$therapistId, self::PAYMENT_PAID] : [self::PAYMENT_PAID]);
        $revenue = $stmt->fetch(PDO::FETCH_ASSOC)['revenue'] ?? 0;
        
        return [
            'total_bookings' => $total,
            'completed_sessions' => $completed,
            'cancelled_sessions' => $cancelled,
            'total_revenue' => $revenue
        ];
    }

    /**
     * Get recent bookings
     */
    public static function getRecent($limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT b.*, u.name as user_name, t.name as therapist_name
            FROM " . self::$table . " b
            LEFT JOIN users u ON b.user_id = u.id
            LEFT JOIN users t ON b.therapist_id = t.id
            ORDER BY b.created_at DESC
            LIMIT ?
        ");
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
