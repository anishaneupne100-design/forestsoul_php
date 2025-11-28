<?php
/**
 * Base Model Class
 * ORM-like structure for database operations
 */

require_once __DIR__ . '/../config/database.php';

abstract class Model {
    protected $db;
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $hidden = ['password'];
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    /**
     * Find a record by ID
     */
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    
    /**
     * Find a record by a specific column
     */
    public function findBy($column, $value) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$column} = :value LIMIT 1");
        $stmt->execute(['value' => $value]);
        return $stmt->fetch();
    }
    
    /**
     * Get all records
     */
    public function all($orderBy = null, $order = 'ASC') {
        $sql = "SELECT * FROM {$this->table}";
        if ($orderBy) {
            $sql .= " ORDER BY {$orderBy} {$order}";
        }
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
    
    /**
     * Get records with conditions
     */
    public function where($column, $operator, $value) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$column} {$operator} :value");
        $stmt->execute(['value' => $value]);
        return $stmt->fetchAll();
    }
    
    /**
     * Create a new record
     */
    public function create(array $data) {
        // Filter only fillable fields
        $data = array_intersect_key($data, array_flip($this->fillable));
        
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        
        if ($stmt->execute($data)) {
            return $this->find($this->db->lastInsertId());
        }
        return false;
    }
    
    /**
     * Update a record
     */
    public function update($id, array $data) {
        // Filter only fillable fields
        $data = array_intersect_key($data, array_flip($this->fillable));
        
        $setParts = [];
        foreach (array_keys($data) as $column) {
            $setParts[] = "{$column} = :{$column}";
        }
        $setClause = implode(', ', $setParts);
        
        $data['id'] = $id;
        $sql = "UPDATE {$this->table} SET {$setClause} WHERE {$this->primaryKey} = :id";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute($data);
    }
    
    /**
     * Delete a record
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id");
        return $stmt->execute(['id' => $id]);
    }
    
    /**
     * Count records
     */
    public function count($column = '*') {
        $stmt = $this->db->query("SELECT COUNT({$column}) as count FROM {$this->table}");
        $result = $stmt->fetch();
        return $result['count'];
    }
    
    /**
     * Check if a record exists
     */
    public function exists($column, $value) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM {$this->table} WHERE {$column} = :value");
        $stmt->execute(['value' => $value]);
        $result = $stmt->fetch();
        return $result['count'] > 0;
    }
    
    /**
     * Raw query execution
     */
    public function raw($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
    
    /**
     * Get the last inserted ID
     */
    public function lastInsertId() {
        return $this->db->lastInsertId();
    }
    
    /**
     * Begin a transaction
     */
    public function beginTransaction() {
        return $this->db->beginTransaction();
    }
    
    /**
     * Commit a transaction
     */
    public function commit() {
        return $this->db->commit();
    }
    
    /**
     * Rollback a transaction
     */
    public function rollback() {
        return $this->db->rollBack();
    }
    
    /**
     * Hide sensitive fields from output
     */
    protected function hideFields($data) {
        if (!$data) return $data;
        
        if (isset($data[0])) {
            // Array of records
            return array_map(function($record) {
                return array_diff_key($record, array_flip($this->hidden));
            }, $data);
        }
        
        // Single record
        return array_diff_key($data, array_flip($this->hidden));
    }
}
