<?php
/**
 * Comment Model
 * Handles comments on community posts
 */

require_once __DIR__ . '/Model.php';

class Comment extends Model
{
    protected static $table = 'community_comments';
    
    protected static $fillable = [
        'post_id',
        'user_id',
        'parent_id',
        'content',
        'is_anonymous',
        'likes_count',
        'status'
    ];

    // Comment status constants
    const STATUS_PUBLISHED = 'published';
    const STATUS_HIDDEN = 'hidden';
    const STATUS_FLAGGED = 'flagged';

    /**
     * Create a new comment
     */
    public static function createComment($data)
    {
        $commentData = [
            'post_id' => $data['post_id'],
            'user_id' => $data['user_id'],
            'parent_id' => $data['parent_id'] ?? null,
            'content' => $data['content'],
            'is_anonymous' => $data['is_anonymous'] ?? false,
            'likes_count' => 0,
            'status' => self::STATUS_PUBLISHED
        ];

        $comment = self::create($commentData);
        
        // Increment comments count on the post
        if ($comment) {
            require_once __DIR__ . '/CommunityPost.php';
            CommunityPost::incrementComments($data['post_id']);
        }
        
        return $comment;
    }

    /**
     * Get comments by post
     */
    public static function getByPost($postId, $limit = 50)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT c.*, 
                   CASE WHEN c.is_anonymous = 1 THEN 'Anonymous' ELSE u.name END as author_name,
                   CASE WHEN c.is_anonymous = 1 THEN NULL ELSE u.avatar END as author_avatar
            FROM " . self::$table . " c
            LEFT JOIN users u ON c.user_id = u.id
            WHERE c.post_id = ? AND c.status = ?
            ORDER BY c.created_at ASC
            LIMIT ?
        ");
        $stmt->execute([$postId, self::STATUS_PUBLISHED, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get comments by user
     */
    public static function getByUser($userId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT c.*, p.title as post_title
            FROM " . self::$table . " c
            LEFT JOIN community_posts p ON c.post_id = p.id
            WHERE c.user_id = ?
            ORDER BY c.created_at DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get replies to a comment
     */
    public static function getReplies($commentId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT c.*, 
                   CASE WHEN c.is_anonymous = 1 THEN 'Anonymous' ELSE u.name END as author_name,
                   CASE WHEN c.is_anonymous = 1 THEN NULL ELSE u.avatar END as author_avatar
            FROM " . self::$table . " c
            LEFT JOIN users u ON c.user_id = u.id
            WHERE c.parent_id = ? AND c.status = ?
            ORDER BY c.created_at ASC
        ");
        $stmt->execute([$commentId, self::STATUS_PUBLISHED]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Delete comment and update post count
     */
    public static function deleteComment($commentId)
    {
        $comment = self::find($commentId);
        if (!$comment) return false;
        
        $deleted = self::delete($commentId);
        
        if ($deleted) {
            require_once __DIR__ . '/CommunityPost.php';
            CommunityPost::decrementComments($comment['post_id']);
        }
        
        return $deleted;
    }

    /**
     * Increment likes
     */
    public static function incrementLikes($commentId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            UPDATE " . self::$table . "
            SET likes_count = likes_count + 1
            WHERE id = ?
        ");
        return $stmt->execute([$commentId]);
    }

    /**
     * Update status
     */
    public static function updateStatus($commentId, $status)
    {
        return self::update($commentId, ['status' => $status]);
    }

    /**
     * Get comment count for post
     */
    public static function getCountForPost($postId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT COUNT(*) as count FROM " . self::$table . "
            WHERE post_id = ? AND status = ?
        ");
        $stmt->execute([$postId, self::STATUS_PUBLISHED]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }
}
