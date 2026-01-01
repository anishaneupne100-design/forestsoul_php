<?php
require_once __DIR__ . '/db.php';

try {
    $pdo = get_db_connection();
    echo "Connected to database.\n";

    // Disable foreign key checks to allow drops
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0");

    // 1. Users Table
    $pdo->exec("DROP TABLE IF EXISTS users");
    $sql_users = "
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        lastname VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        age INT,
        phone_number VARCHAR(20),
        address TEXT,
        is_admin BOOLEAN DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_users);
    echo "Users table created.\n";

    // 2. Events Table
    $pdo->exec("DROP TABLE IF EXISTS events");
    $sql_events = "
    CREATE TABLE events (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        start_date DATETIME NOT NULL,
        deadline DATETIME NULL,
        location VARCHAR(255),
        latitude DECIMAL(10, 8) NULL,
        longitude DECIMAL(11, 8) NULL,
        created_by INT,
        needs_approval BOOLEAN DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_events);
    echo "Events table created.\n";

    // 3. Event Registrations Table
    $pdo->exec("DROP TABLE IF EXISTS event_registrations");
    $sql_registrations = "
    CREATE TABLE event_registrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        event_id INT NOT NULL,
        remarks TEXT,
        plan_to_join_at DATETIME NULL,
        is_approved BOOLEAN DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
        UNIQUE KEY unique_registration (user_id, event_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_registrations);
    echo "Event Registrations table created.\n";

    // 4. Notifications Table
    $pdo->exec("DROP TABLE IF EXISTS notifications");
    $sql_notifications = "
    CREATE TABLE notifications (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        message TEXT NOT NULL,
        is_read BOOLEAN DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_notifications);
    echo "Notifications table created.\n";

    // 5. Community Posts
    $pdo->exec("DROP TABLE IF EXISTS community_posts");
    $sql_posts = "
    CREATE TABLE community_posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        posted_by INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        is_archived BOOLEAN DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (posted_by) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_posts);
    echo "Community Posts table created.\n";

    // 6. Community Post Images
    $pdo->exec("DROP TABLE IF EXISTS community_images");
    $sql_comm_images = "
    CREATE TABLE community_images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        post_id INT NOT NULL,
        image_url TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (post_id) REFERENCES community_posts(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_comm_images);
    echo "Community Images table created.\n";

    // 7. Community Comments
    $pdo->exec("DROP TABLE IF EXISTS community_comments");
    $sql_comments = "
    CREATE TABLE community_comments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        post_id INT NOT NULL,
        posted_by INT NOT NULL,
        comment TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (post_id) REFERENCES community_posts(id) ON DELETE CASCADE,
        FOREIGN KEY (posted_by) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_comments);
    echo "Community Comments table created.\n";

    // 8. Community Likes
    $pdo->exec("DROP TABLE IF EXISTS community_likes");
    $sql_likes = "
    CREATE TABLE community_likes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        post_id INT NOT NULL,
        created_by INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (post_id) REFERENCES community_posts(id) ON DELETE CASCADE,
        FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE,
        UNIQUE KEY unique_post_like (post_id, created_by)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_likes);
    echo "Community Likes table created.\n";

    // 9. Activity Logs Table
    $pdo->exec("DROP TABLE IF EXISTS activity_logs");
    $sql_activity = "
    CREATE TABLE activity_logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        action VARCHAR(255) NOT NULL,
        details TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_activity);
    echo "Activity Logs table created.\n";

    // 10. Experts Table
    $pdo->exec("DROP TABLE IF EXISTS experts");
    $sql_experts = "
    CREATE TABLE experts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        name VARCHAR(100) NOT NULL,
        lastname VARCHAR(100),
        email VARCHAR(150),
        phone_1 VARCHAR(20) NOT NULL,
        phone_2 VARCHAR(20),
        address TEXT,
        degree VARCHAR(255),
        specialization VARCHAR(255),
        experience_years INT,
        bio TEXT,
        profile_picture VARCHAR(255),
        is_active BOOLEAN DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_experts);
    echo "Experts table created.\n";

    // 11. Expert Applications Table
    $pdo->exec("DROP TABLE IF EXISTS expert_applications");
    $sql_expert_apps = "
    CREATE TABLE expert_applications (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        name VARCHAR(100) NOT NULL,
        lastname VARCHAR(100),
        email VARCHAR(150),
        phone_1 VARCHAR(20) NOT NULL,
        phone_2 VARCHAR(20),
        address TEXT,
        degree VARCHAR(255),
        specialization VARCHAR(255),
        experience_years INT,
        bio TEXT,
        profile_picture VARCHAR(255),
        proof_url VARCHAR(255),
        remarks TEXT,
        status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($sql_expert_apps);
    echo "Expert Applications table created.\n";

    // Enable foreign key checks
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

    echo "Database setup completed successfully (Version 2).\n";

} catch (PDOException $e) {
    die("Setup failed: " . $e->getMessage());
}
