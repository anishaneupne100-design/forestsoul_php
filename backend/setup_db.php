<?php
/**
 * ForestSoul SQLite Setup Script
 * Recreates the exact database structure from MySQL in a portable SQLite format.
 */

require_once __DIR__ . '/db.php';

try {
    $pdo = get_db_connection();
    echo "Connected to SQLite database at: " . __DIR__ . "/forestsoul.sqlite\n";

    // Enable foreign keys for the session
    $pdo->exec("PRAGMA foreign_keys = OFF;");

    // Helper function for creating update triggers
    function createUpdateTrigger($pdo, $tableName) {
        $triggerName = "update_{$tableName}_timestamp";
        $pdo->exec("DROP TRIGGER IF EXISTS $triggerName");
        $pdo->exec("
            CREATE TRIGGER $triggerName AFTER UPDATE ON $tableName
            BEGIN
                UPDATE $tableName SET updated_at = CURRENT_TIMESTAMP WHERE id = NEW.id;
            END;
        ");
    }

    // 1. Users Table
    $pdo->exec("DROP TABLE IF EXISTS users");
    $pdo->exec("
    CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        lastname TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL,
        age INTEGER,
        phone_number TEXT,
        address TEXT,
        is_admin INTEGER DEFAULT 0,
        is_expert INTEGER DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ");
    createUpdateTrigger($pdo, 'users');
    echo "Users table created with triggers.\n";

    // 2. Events Table
    $pdo->exec("DROP TABLE IF EXISTS events");
    $pdo->exec("
    CREATE TABLE events (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        description TEXT,
        start_date DATETIME NOT NULL,
        deadline DATETIME,
        location TEXT,
        latitude REAL,
        longitude REAL,
        created_by INTEGER,
        needs_approval INTEGER DEFAULT 0,
        thumbnail TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
    );
    ");
    createUpdateTrigger($pdo, 'events');
    echo "Events table created.\n";

    // 3. Event Registrations Table
    $pdo->exec("DROP TABLE IF EXISTS event_registrations");
    $pdo->exec("
    CREATE TABLE event_registrations (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        event_id INTEGER NOT NULL,
        remarks TEXT,
        plan_to_join_at DATETIME,
        is_approved INTEGER DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
        UNIQUE (user_id, event_id)
    );
    ");
    echo "Event Registrations table created.\n";

    // 4. Notifications Table
    $pdo->exec("DROP TABLE IF EXISTS notifications");
    $pdo->exec("
    CREATE TABLE notifications (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        message TEXT NOT NULL,
        is_read INTEGER DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );
    ");
    echo "Notifications table created.\n";

    // 5. Community Posts
    $pdo->exec("DROP TABLE IF EXISTS community_posts");
    $pdo->exec("
    CREATE TABLE community_posts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        posted_by INTEGER NOT NULL,
        title TEXT NOT NULL,
        description TEXT,
        is_archived INTEGER DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (posted_by) REFERENCES users(id) ON DELETE CASCADE
    );
    ");
    createUpdateTrigger($pdo, 'community_posts');
    echo "Community Posts table created.\n";

    // 6. Community Post Images
    $pdo->exec("DROP TABLE IF EXISTS community_images");
    $pdo->exec("
    CREATE TABLE community_images (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        post_id INTEGER NOT NULL,
        image_url TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (post_id) REFERENCES community_posts(id) ON DELETE CASCADE
    );
    ");
    echo "Community Images table created.\n";

    // 7. Community Comments
    $pdo->exec("DROP TABLE IF EXISTS community_comments");
    $pdo->exec("
    CREATE TABLE community_comments (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        post_id INTEGER NOT NULL,
        posted_by INTEGER NOT NULL,
        comment TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (post_id) REFERENCES community_posts(id) ON DELETE CASCADE,
        FOREIGN KEY (posted_by) REFERENCES users(id) ON DELETE CASCADE
    );
    ");
    echo "Community Comments table created.\n";

    // 8. Community Likes
    $pdo->exec("DROP TABLE IF EXISTS community_likes");
    $pdo->exec("
    CREATE TABLE community_likes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        post_id INTEGER NOT NULL,
        created_by INTEGER NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (post_id) REFERENCES community_posts(id) ON DELETE CASCADE,
        FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE,
        UNIQUE (post_id, created_by)
    );
    ");
    echo "Community Likes table created.\n";

    // 9. Activity Logs Table
    $pdo->exec("DROP TABLE IF EXISTS activity_logs");
    $pdo->exec("
    CREATE TABLE activity_logs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        action TEXT NOT NULL,
        details TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );
    ");
    echo "Activity Logs table created.\n";

    // 10. Experts Table
    $pdo->exec("DROP TABLE IF EXISTS experts");
    $pdo->exec("
    CREATE TABLE experts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        name TEXT NOT NULL,
        lastname TEXT,
        email TEXT,
        phone_1 TEXT NOT NULL,
        phone_2 TEXT,
        address TEXT,
        degree TEXT,
        specialization TEXT,
        experience_years INTEGER,
        bio TEXT,
        profile_picture TEXT,
        is_active INTEGER DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );
    ");
    createUpdateTrigger($pdo, 'experts');
    echo "Experts table created.\n";

    // 11. Expert Applications Table
    $pdo->exec("DROP TABLE IF EXISTS expert_applications");
    $pdo->exec("
    CREATE TABLE expert_applications (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        name TEXT NOT NULL,
        lastname TEXT,
        email TEXT,
        phone_1 TEXT NOT NULL,
        phone_2 TEXT,
        address TEXT,
        degree TEXT,
        specialization TEXT,
        experience_years INTEGER,
        bio TEXT,
        profile_picture TEXT,
        proof_url TEXT,
        remarks TEXT,
        status TEXT DEFAULT 'pending' CHECK(status IN ('pending', 'approved', 'rejected')),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );
    ");
    echo "Expert Applications table created.\n";

    // 12. Therapy Sessions Table
    $pdo->exec("DROP TABLE IF EXISTS therapy_sessions");
    $pdo->exec("
    CREATE TABLE therapy_sessions (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        expert_id INTEGER NOT NULL,
        desired_date DATE NOT NULL,
        desired_time TIME NOT NULL,
        status TEXT DEFAULT 'pending' CHECK(status IN ('pending', 'approved', 'rejected', 'completed')),
        remarks TEXT,
        meeting_link TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (expert_id) REFERENCES experts(id) ON DELETE CASCADE
    );
    ");
    echo "Therapy Sessions table created.\n";

    // 13. Expert Ratings Table
    $pdo->exec("DROP TABLE IF EXISTS expert_ratings");
    $pdo->exec("
    CREATE TABLE expert_ratings (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        expert_id INTEGER NOT NULL,
        rating INTEGER NOT NULL CHECK(rating >= 1 AND rating <= 5),
        feedback TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (expert_id) REFERENCES experts(id) ON DELETE CASCADE
    );
    ");
    echo "Expert Ratings table created.\n";

    // 14. User Questionnaires Table
    $pdo->exec("DROP TABLE IF EXISTS user_questionnaires");
    $pdo->exec("
    CREATE TABLE user_questionnaires (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        answers TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );
    ");
    echo "User Questionnaires table created.\n";

    // 15. Default Admin User (admin@admin.com / password123)
    $stmt = $pdo->prepare("INSERT INTO users (name, lastname, email, password, is_admin) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute(['Master', 'Admin', 'admin@admin.com', password_hash('password123', PASSWORD_DEFAULT), 1]);
    echo "Default admin user created.\n";

    // Re-enable foreign key checks
    $pdo->exec("PRAGMA foreign_keys = ON;");

    echo "SQLite Database setup completed successfully.\n";

} catch (Exception $e) {
    die("Setup failed: " . $e->getMessage());
}
