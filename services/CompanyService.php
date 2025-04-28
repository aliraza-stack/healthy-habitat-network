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
                INSERT INTO companies (name, contact_email, contact_phone, contact_address)
                VALUES (:name, :contact_email, :contact_phone, :contact_address)
            ");
            $stmt->execute([
                ':name' => $data['name'],
                ':contact_email' => $data['contact_email'],
                ':contact_phone' => $data['contact_phone'],
                ':contact_address' => $data['contact_address'] ?? null
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

    public function getProductCompanies($companyId) {
        try {
            $stmt = $this->db->prepare("
                SELECT c.id, c.name, c.contact_email, c.contact_phone, c.contact_address
                FROM companies c
                JOIN products p ON c.id = p.company_id
                WHERE p.company_id = :company_id
            ");
            $stmt->execute([':company_id' => $companyId]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch votes: " . $e->getMessage());
        }
    }
}