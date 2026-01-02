<?php
/**
 * ForestSoul SQLite Database Connection
 * Provides a portable database solution for local development and testing.
 */

function get_db_connection() {
    // Database file will be created in the backend directory
    $dbPath = __DIR__ . '/forestsoul.sqlite';
    $dsn = "sqlite:$dbPath";
    
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, null, null, $options);
        
        // SQLite specific performance and feature tunings
        $pdo->exec("PRAGMA foreign_keys = ON;"); // Ensure relational integrity
        $pdo->exec("PRAGMA journal_mode = WAL;"); // Improved concurrency
        $pdo->exec("PRAGMA synchronous = NORMAL;");
        
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException("SQLite Connection Failed: " . $e->getMessage(), (int)$e->getCode());
    }
}
?>
