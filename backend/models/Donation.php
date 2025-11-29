<?php
/**
 * Donation Model
 * Handles donation records and transactions
 */

require_once __DIR__ . '/Model.php';

class Donation extends Model {
    protected $table = 'donations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'donor_name',
        'donor_email',
        'amount',
        'currency',
        'payment_method',
        'payment_status',
        'transaction_id',
        'message',
        'is_anonymous',
        'created_at'
    ];
    
    // Payment statuses
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';
    const STATUS_REFUNDED = 'refunded';
    
    /**
     * Create a new donation
     */
    public function createDonation(array $data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['payment_status'] = $data['payment_status'] ?? self::STATUS_PENDING;
        $data['currency'] = $data['currency'] ?? 'USD';
        $data['is_anonymous'] = $data['is_anonymous'] ?? false;
        
        return $this->create($data);
    }
    
    /**
     * Get donations by user
     */
    public function getByUser($userId) {
        return $this->where('user_id', '=', $userId);
    }
    
    /**
     * Get donations by status
     */
    public function getByStatus($status) {
        return $this->where('payment_status', '=', $status);
    }
    
    /**
     * Get completed donations
     */
    public function getCompleted() {
        return $this->getByStatus(self::STATUS_COMPLETED);
    }
    
    /**
     * Get total donations amount
     */
    public function getTotalAmount() {
        $sql = "SELECT SUM(amount) as total FROM {$this->table} WHERE payment_status = :status";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['status' => self::STATUS_COMPLETED]);
        $result = $stmt->fetch();
        return $result['total'] ?? 0;
    }
    
    /**
     * Get total donations count
     */
    public function getTotalCount() {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE payment_status = :status";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['status' => self::STATUS_COMPLETED]);
        $result = $stmt->fetch();
        return $result['count'] ?? 0;
    }
    
    /**
     * Get recent donations
     */
    public function getRecent($limit = 10) {
        $sql = "SELECT d.*, u.name as user_name, u.avatar as user_avatar 
                FROM {$this->table} d 
                LEFT JOIN users u ON d.user_id = u.id 
                WHERE d.payment_status = :status 
                ORDER BY d.created_at DESC 
                LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', self::STATUS_COMPLETED);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Get public donations (non-anonymous)
     */
    public function getPublicDonations($limit = 20) {
        $sql = "SELECT d.donor_name, d.amount, d.currency, d.message, d.created_at 
                FROM {$this->table} d 
                WHERE d.payment_status = :status AND d.is_anonymous = 0 
                ORDER BY d.created_at DESC 
                LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', self::STATUS_COMPLETED);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Update payment status
     */
    public function updateStatus($id, $status, $transactionId = null) {
        $sql = "UPDATE {$this->table} SET payment_status = :status";
        $params = ['status' => $status, 'id' => $id];
        
        if ($transactionId) {
            $sql .= ", transaction_id = :transaction_id";
            $params['transaction_id'] = $transactionId;
        }
        
        $sql .= " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }
    
    /**
     * Get donations statistics
     */
    public function getStatistics() {
        $sql = "SELECT 
                    COUNT(*) as total_count,
                    SUM(CASE WHEN payment_status = 'completed' THEN amount ELSE 0 END) as total_amount,
                    COUNT(CASE WHEN payment_status = 'completed' THEN 1 END) as completed_count,
                    AVG(CASE WHEN payment_status = 'completed' THEN amount END) as average_amount
                FROM {$this->table}";
        $stmt = $this->db->query($sql);
        return $stmt->fetch();
    }
    
    /**
     * Get monthly donations
     */
    public function getMonthlyDonations($year = null) {
        $year = $year ?? date('Y');
        $sql = "SELECT 
                    MONTH(created_at) as month,
                    SUM(amount) as total,
                    COUNT(*) as count
                FROM {$this->table}
                WHERE payment_status = :status AND YEAR(created_at) = :year
                GROUP BY MONTH(created_at)
                ORDER BY month";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['status' => self::STATUS_COMPLETED, 'year' => $year]);
        return $stmt->fetchAll();
    }
}
