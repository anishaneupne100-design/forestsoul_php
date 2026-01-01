<?php
require_once __DIR__ . '/db.php';

function create_community_post($userId, $data) {
    $pdo = get_db_connection();
    
    // Start transaction for atomicity (posts + images)
    $pdo->beginTransaction();

    try {
        if (empty($data['title'])) {
            return ['error' => 'Title is required', 'status' => 400];
        }

        // Insert Post
        $stmt = $pdo->prepare("INSERT INTO community_posts (posted_by, title, description, is_archived) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $userId,
            $data['title'],
            $data['description'] ?? '',
            isset($data['is_archived']) ? 1 : 0
        ]);
        $postId = $pdo->lastInsertId();

        // Insert Images if any
        if (!empty($data['images']) && is_array($data['images'])) {
            $stmtImg = $pdo->prepare("INSERT INTO community_images (post_id, image_url) VALUES (?, ?)");
            foreach ($data['images'] as $url) {
                // Here you might validate URL or process it
                $stmtImg->execute([$postId, $url]);
            }
        }

        $pdo->commit();
        return ['success' => true, 'message' => 'Post created', 'post_id' => $postId];

    } catch (PDOException $e) {
        $pdo->rollBack();
        return ['error' => 'Database error: ' . $e->getMessage(), 'status' => 500];
    }
}

function get_community_posts($filters = []) {
    $pdo = get_db_connection();
    
    // We need: Post info, User info, Image URLs (array), Like Count, Comment Count
    // GROUP_CONCAT is useful for Images
    // Subqueries or LEFT JOINs with COUNT for Likes/Comments are tricky to do efficiently in one go without causing cartesian product issues if simplified indiscriminately.
    // Safest and efficient way in standard SQL for multiple counts + lists is often correlated subqueries or multiple joins with GROUP BY carefully derived.
    
    // Let's try a main query that joins User and Post, and LEFT JOINs aggregated subqueries.
    
    $sql = "
    SELECT 
        p.id, p.title, p.description, p.created_at, p.posted_by,
        u.name as user_name, u.lastname as user_lastname,
        (SELECT COUNT(*) FROM community_likes l WHERE l.post_id = p.id) as like_count,
        (SELECT COUNT(*) FROM community_comments c WHERE c.post_id = p.id) as comment_count,
        (
            SELECT GROUP_CONCAT(i.image_url SEPARATOR '||') 
            FROM community_images i 
            WHERE i.post_id = p.id
        ) as image_urls
    FROM community_posts p
    JOIN users u ON p.posted_by = u.id
    WHERE p.is_archived = 0
    ORDER BY p.created_at DESC
    ";

    try {
        $stmt = $pdo->query($sql);
        $posts = $stmt->fetchAll();
        
        // Post-process image_urls from string to array
        foreach ($posts as &$post) {
            $post['images'] = $post['image_urls'] ? explode('||', $post['image_urls']) : [];
            unset($post['image_urls']);
        }
        
        return ['success' => true, 'data' => $posts];
    } catch (PDOException $e) {
        return ['error' => 'Database error: ' . $e->getMessage(), 'status' => 500];
    }
}

function add_comment($userId, $postId, $comment) {
    $pdo = get_db_connection();
    try {
        $stmt = $pdo->prepare("INSERT INTO community_comments (post_id, posted_by, comment) VALUES (?, ?, ?)");
        $stmt->execute([$postId, $userId, $comment]);
        // Ideally fetch the new comment to return it
        return ['success' => true, 'message' => 'Comment added'];
    } catch (PDOException $e) {
        return ['error' => 'Database error', 'status' => 500];
    }
}

function get_post_comments($postId) {
    $pdo = get_db_connection();
    try {
        $sql = "SELECT c.*, u.name, u.lastname 
                FROM community_comments c 
                JOIN users u ON c.posted_by = u.id 
                WHERE c.post_id = ? 
                ORDER BY c.created_at ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$postId]);
        return ['success' => true, 'data' => $stmt->fetchAll()];
    } catch (PDOException $e) {
        return ['error' => 'Database error', 'status' => 500];
    }
}

function toggle_like($userId, $postId) {
    $pdo = get_db_connection();
    try {
        // Check if already liked
        $stmt = $pdo->prepare("SELECT id FROM community_likes WHERE post_id = ? AND created_by = ?");
        $stmt->execute([$postId, $userId]);
        $like = $stmt->fetch();

        if ($like) {
            // Unlike
            $stmt = $pdo->prepare("DELETE FROM community_likes WHERE id = ?");
            $stmt->execute([$like['id']]);
            return ['success' => true, 'message' => 'Unliked', 'liked' => false];
        } else {
            // Like
            $stmt = $pdo->prepare("INSERT INTO community_likes (post_id, created_by) VALUES (?, ?)");
            $stmt->execute([$postId, $userId]);
            return ['success' => true, 'message' => 'Liked', 'liked' => true];
        }
    } catch (PDOException $e) {
        return ['error' => 'Database error', 'status' => 500];
    }
}
