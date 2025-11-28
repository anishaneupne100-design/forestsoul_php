<?php
/**
 * User Model
 * Handles user data and authentication
 */

require_once __DIR__ . '/Model.php';

class User extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role',
        'phone',
        'bio',
        'created_at',
        'updated_at'
    ];
    protected $hidden = ['password'];
    
    // User roles
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    const ROLE_STAFF = 'staff';
    const ROLE_THERAPIST = 'therapist';
    
    /**
     * Find user by email
     */
    public function findByEmail($email) {
        return $this->findBy('email', $email);
    }
    
    /**
     * Create a new user with hashed password
     */
    public function register(array $data) {
        // Hash the password
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        // Set default role
        if (!isset($data['role'])) {
            $data['role'] = self::ROLE_USER;
        }
        
        // Set timestamps
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        return $this->create($data);
    }
    
    /**
     * Verify user password
     */
    public function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
    
    /**
     * Update user password
     */
    public function updatePassword($userId, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE {$this->table} SET password = :password, updated_at = :updated_at WHERE id = :id");
        return $stmt->execute([
            'password' => $hashedPassword,
            'updated_at' => date('Y-m-d H:i:s'),
            'id' => $userId
        ]);
    }
    
    /**
     * Get user with hidden fields removed
     */
    public function getSafe($id) {
        $user = $this->find($id);
        return $this->hideFields($user);
    }
    
    /**
     * Get all users (admin function)
     */
    public function getAllUsers() {
        $users = $this->all('created_at', 'DESC');
        return $this->hideFields($users);
    }
    
    /**
     * Get users by role
     */
    public function getByRole($role) {
        $users = $this->where('role', '=', $role);
        return $this->hideFields($users);
    }
    
    /**
     * Check if user is admin
     */
    public function isAdmin($userId) {
        $user = $this->find($userId);
        return $user && $user['role'] === self::ROLE_ADMIN;
    }
    
    /**
     * Check if user is staff
     */
    public function isStaff($userId) {
        $user = $this->find($userId);
        return $user && in_array($user['role'], [self::ROLE_ADMIN, self::ROLE_STAFF, self::ROLE_THERAPIST]);
    }
    
    /**
     * Update last login
     */
    public function updateLastLogin($userId) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET last_login = :last_login WHERE id = :id");
        return $stmt->execute([
            'last_login' => date('Y-m-d H:i:s'),
            'id' => $userId
        ]);
    }
}
