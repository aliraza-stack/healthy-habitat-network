<?php
require_once __DIR__ . '/../includes/db_connect.php';

class VoteService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function castVote($userId, $productId, $vote) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO votes (user_id, product_id, vote)
                VALUES (:user_id, :product_id, :vote)
                ON DUPLICATE KEY UPDATE vote = :vote
            ");

            $stmt->execute([
                ':user_id' => $userId,
                ':product_id' => $productId,
                ':vote' => $vote
            ]);

            return true;
        } catch (PDOException $e) {
            throw new Exception("Voting failed: " . $e->getMessage());
        }
    }

    public function getProductVotes($productId) {
        try {
            $stmt = $this->db->prepare("
                SELECT
                    SUM(CASE WHEN vote = 1 THEN 1 ELSE 0 END) as yes_votes,
                    SUM(CASE WHEN vote = 0 THEN 1 ELSE 0 END) as no_votes
                FROM votes
                WHERE product_id = :product_id
            ");
            $stmt->execute([':product_id' => $productId]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch votes: " . $e->getMessage());
        }
    }
}