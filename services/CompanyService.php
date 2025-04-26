<?php
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/Company.php';

class CompanyService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addCompany($data) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO companies (name, contact_info)
                VALUES (:name, :contact_info)
            ");
            $stmt->execute([
                ':name' => $data['name'],
                ':contact_info' => json_encode($data['contact_info'])
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Company creation failed: " . $e->getMessage());
        }
    }

    public function getAllCompanies() {
        try {
            $stmt = $this->db->query("SELECT * FROM companies ORDER BY id DESC");
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Company');
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch companies: " . $e->getMessage());
        }
    }

    public function getCompany($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM companies WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetchObject('Company');
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch company: " . $e->getMessage());
        }
    }
}