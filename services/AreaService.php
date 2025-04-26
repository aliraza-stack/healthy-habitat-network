<?php
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/Area.php';

class AreaService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addArea($data) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO areas (name, council_id)
                VALUES (:name, :council_id)
            ");
            $stmt->execute([
                ':name' => $data['name'],
                ':council_id' => $data['council_id']
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Area creation failed: " . $e->getMessage());
        }
    }

    public function getAllAreas() {
        try {
            $stmt = $this->db->query("SELECT * FROM areas ORDER BY id DESC");
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Area');
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch areas: " . $e->getMessage());
        }
    }
}