<?php
/**
 * CommunityPost Model
 * Handles community posts and discussions
 */

require_once __DIR__ . '/Model.php';

class CommunityPost extends Model
{
    protected static $table = 'community_posts';
    
    protected static $fillable = [
        'user_id',
        'title',
        'content',
        'category',
        'is_anonymous',
        'likes_count',
        'comments_count',
        'status',
        'is_pinned',
        'image_url'
    ];

    protected static $hidden = [];

    // Post status constants
    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';
    const STATUS_HIDDEN = 'hidden';
    const STATUS_FLAGGED = 'flagged';

    // Category constants
    const CATEGORY_GENERAL = 'general';
    const CATEGORY_MENTAL_HEALTH = 'mental_health';
    const CATEGORY_SUPPORT = 'support';
    const CATEGORY_SUCCESS_STORY = 'success_story';
    const CATEGORY_QUESTION = 'question';
    const CATEGORY_RESOURCE = 'resource';

    /**
     * Create a new post
     */
    public static function createPost($data)
    {
        $postData = [
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'category' => $data['category'] ?? self::CATEGORY_GENERAL,
            'is_anonymous' => $data['is_anonymous'] ?? false,
            'likes_count' => 0,
            'comments_count' => 0,
            'status' => self::STATUS_PUBLISHED,
            'is_pinned' => false,
            'image_url' => $data['image_url'] ?? null
        ];

        return self::create($postData);
    }

    /**
     * Get all published posts
     */
    public static function getPublished($limit = 20, $offset = 0)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT p.*, 
                   CASE WHEN p.is_anonymous = 1 THEN 'Anonymous' ELSE u.name END as author_name,
                   CASE WHEN p.is_anonymous = 1 THEN NULL ELSE u.avatar END as author_avatar
            FROM " . self::$table . " p
            LEFT JOIN users u ON p.user_id = u.id
            WHERE p.status = ?
            ORDER BY p.is_pinned DESC, p.created_at DESC
            LIMIT ? OFFSET ?
        ");
        $stmt->execute([self::STATUS_PUBLISHED, $limit, $offset]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get posts by category
     */
    public static function getByCategory($category, $limit = 20)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT p.*, 
                   CASE WHEN p.is_anonymous = 1 THEN 'Anonymous' ELSE u.name END as author_name,
                   CASE WHEN p.is_anonymous = 1 THEN NULL ELSE u.avatar END as author_avatar
            FROM " . self::$table . " p
            LEFT JOIN users u ON p.user_id = u.id
            WHERE p.category = ? AND p.status = ?
            ORDER BY p.is_pinned DESC, p.created_at DESC
            LIMIT ?
        ");
        $stmt->execute([$category, self::STATUS_PUBLISHED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get posts by user
     */
    public static function getByUser($userId, $includePrivate = false)
    {
        $db = Database::getInstance()->getConnection();
        
        if ($includePrivate) {
            $stmt = $db->prepare("
                SELECT * FROM " . self::$table . "
                WHERE user_id = ?
                ORDER BY created_at DESC
            ");
            $stmt->execute([$userId]);
        } else {
            $stmt = $db->prepare("
                SELECT * FROM " . self::$table . "
                WHERE user_id = ? AND status = ?
                ORDER BY created_at DESC
            ");
            $stmt->execute([$userId, self::STATUS_PUBLISHED]);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get post with author details
     */
    public static function getWithAuthor($postId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT p.*, 
                   CASE WHEN p.is_anonymous = 1 THEN 'Anonymous' ELSE u.name END as author_name,
                   CASE WHEN p.is_anonymous = 1 THEN NULL ELSE u.avatar END as author_avatar,
                   CASE WHEN p.is_anonymous = 1 THEN NULL ELSE u.bio END as author_bio
            FROM " . self::$table . " p
            LEFT JOIN users u ON p.user_id = u.id
            WHERE p.id = ?
        ");
        $stmt->execute([$postId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Increment likes count
     */
    public static function incrementLikes($postId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET likes_count = likes_count + 1
            WHERE id = ?
        ");
        return $stmt->execute([$postId]);
    }

    /**
     * Decrement likes count
     */
    public static function decrementLikes($postId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET likes_count = GREATEST(likes_count - 1, 0)
            WHERE id = ?
        ");
        return $stmt->execute([$postId]);
    }

    /**
     * Increment comments count
     */
    public static function incrementComments($postId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET comments_count = comments_count + 1
            WHERE id = ?
        ");
        return $stmt->execute([$postId]);
    }

    /**
     * Decrement comments count
     */
    public static function decrementComments($postId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET comments_count = GREATEST(comments_count - 1, 0)
            WHERE id = ?
        ");
        return $stmt->execute([$postId]);
    }

    /**
     * Update post status
     */
    public static function updateStatus($postId, $status)
    {
        return self::update($postId, ['status' => $status]);
    }

    /**
     * Pin/Unpin post
     */
    public static function togglePin($postId)
    {
        $post = self::find($postId);
        if (!$post) return false;
        
        return self::update($postId, ['is_pinned' => !$post['is_pinned']]);
    }

    /**
     * Search posts
     */
    public static function search($query, $limit = 20)
    {
        $db = Database::getInstance()->getConnection();
        $searchTerm = "%{$query}%";
        $stmt = $db->prepare("
            SELECT p.*, 
                   CASE WHEN p.is_anonymous = 1 THEN 'Anonymous' ELSE u.name END as author_name
            FROM " . self::$table . " p
            LEFT JOIN users u ON p.user_id = u.id
            WHERE (p.title LIKE ? OR p.content LIKE ?)
            AND p.status = ?
            ORDER BY p.created_at DESC
            LIMIT ?
        ");
        $stmt->execute([$searchTerm, $searchTerm, self::STATUS_PUBLISHED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get trending posts (most likes in recent days)
     */
    public static function getTrending($days = 7, $limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT p.*, 
                   CASE WHEN p.is_anonymous = 1 THEN 'Anonymous' ELSE u.name END as author_name
            FROM " . self::$table . " p
            LEFT JOIN users u ON p.user_id = u.id
            WHERE p.status = ?
            AND p.created_at >= DATE_SUB(NOW(), INTERVAL ? DAY)
            ORDER BY p.likes_count DESC, p.comments_count DESC
            LIMIT ?
        ");
        $stmt->execute([self::STATUS_PUBLISHED, $days, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get pinned posts
     */
    public static function getPinned()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT p.*, 
                   CASE WHEN p.is_anonymous = 1 THEN 'Anonymous' ELSE u.name END as author_name
            FROM " . self::$table . " p
            LEFT JOIN users u ON p.user_id = u.id
            WHERE p.is_pinned = 1 AND p.status = ?
            ORDER BY p.created_at DESC
        ");
        $stmt->execute([self::STATUS_PUBLISHED]);
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
        
        $stmt = $db->prepare("SELECT COUNT(*) as published FROM " . self::$table . " WHERE status = ?");
        $stmt->execute([self::STATUS_PUBLISHED]);
        $published = $stmt->fetch(PDO::FETCH_ASSOC)['published'];
        
        $stmt = $db->query("SELECT SUM(likes_count) as total_likes FROM " . self::$table);
        $totalLikes = $stmt->fetch(PDO::FETCH_ASSOC)['total_likes'] ?? 0;
        
        $stmt = $db->query("SELECT SUM(comments_count) as total_comments FROM " . self::$table);
        $totalComments = $stmt->fetch(PDO::FETCH_ASSOC)['total_comments'] ?? 0;
        
        return [
            'total_posts' => $total,
            'published_posts' => $published,
            'total_likes' => $totalLikes,
            'total_comments' => $totalComments
        ];
    }

    /**
     * Get recent posts
     */
    public static function getRecent($limit = 10)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT p.*, 
                   CASE WHEN p.is_anonymous = 1 THEN 'Anonymous' ELSE u.name END as author_name
            FROM " . self::$table . " p
            LEFT JOIN users u ON p.user_id = u.id
            WHERE p.status = ?
            ORDER BY p.created_at DESC
            LIMIT ?
        ");
        $stmt->execute([self::STATUS_PUBLISHED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
