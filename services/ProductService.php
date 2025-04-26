<?php
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/Product.php';

class ProductService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addProduct($data) {
        try {
            // Check if product already exists
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM products WHERE name = :name");
            $stmt->execute([':name' => $data['name']]);

            if ($stmt->fetchColumn() > 0) {
                throw new Exception("Product already exists");
            }

            $stmt = $this->db->prepare("
                INSERT INTO products (name, description, size_quantity, health_benefits, price_category, company_id, certifications)
                VALUES (:name, :description, :size_quantity, :health_benefits, :price_category, :company_id, :certifications)
            ");

            $stmt->execute([
                ':name' => $data['name'],
                ':description' => $data['description'],
                ':size_quantity' => $data['size_quantity'],
                ':health_benefits' => $data['health_benefits'],
                ':price_category' => $data['price_category'],
                ':company_id' => $data['company_id'],
                ':certifications' => json_encode($data['certifications'])
            ]);

            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Product addition failed: " . $e->getMessage());
        }
    }

    public function getAllProducts() {
        try {
            $stmt = $this->db->query("SELECT * FROM products ORDER BY id DESC");
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch products: " . $e->getMessage());
        }
    }
}