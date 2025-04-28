<?php
require_once __DIR__ . '/../../includes/db_connect.php';

class CreateTablesMigration {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    private function tableExists($table) {
        $stmt = $this->db->prepare("SHOW TABLES LIKE ?");
        $stmt->execute([$table]);
        return $stmt->fetch() !== false;
    }

    public function up() {
        try {
            // Create areas table first (referenced by users)
            if (!$this->tableExists('areas')) {
                $this->db->exec("
                    CREATE TABLE areas (
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        name VARCHAR(100) NOT NULL UNIQUE,
                        council_id INT NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    )
                ");
            }

            // Create users table (references areas)
            if (!$this->tableExists('users')) {
                $this->db->exec("
                    CREATE TABLE users (
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        username VARCHAR(50) NOT NULL UNIQUE,
                        email VARCHAR(100) NOT NULL UNIQUE,
                        password VARCHAR(255) NOT NULL,
                        location INT NOT NULL,
                        age_group VARCHAR(20) NOT NULL,
                        gender VARCHAR(20) NOT NULL,
                        interests JSON NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        FOREIGN KEY (location) REFERENCES areas(id)
                    )
                ");
            }

            // Create companies table
            if (!$this->tableExists('companies')) {
                $this->db->exec("
                    CREATE TABLE companies (
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        name VARCHAR(100) NOT NULL UNIQUE,
                        contact_email VARCHAR(100) NOT NULL,
                        contact_phone VARCHAR(30) NOT NULL,
                        contact_address VARCHAR(255),
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    )
                ");
            }

            // Create products table (references companies)
            if (!$this->tableExists('products')) {
                $this->db->exec("
                    CREATE TABLE products (
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        name VARCHAR(100) NOT NULL UNIQUE,
                        description TEXT NOT NULL,
                        size_quantity VARCHAR(50) NOT NULL,
                        health_benefits TEXT NOT NULL,
                        price_category ENUM('affordable', 'moderate', 'premium') NOT NULL,
                        company_id INT NOT NULL,
                        certifications JSON,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        FOREIGN KEY (company_id) REFERENCES companies(id)
                    )
                ");
            }

            // Create votes table (references users and products)
            if (!$this->tableExists('votes')) {
                $this->db->exec("
                    CREATE TABLE votes (
                        user_id INT NOT NULL,
                        product_id INT NOT NULL,
                        vote TINYINT(1) NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        PRIMARY KEY (user_id, product_id),
                        FOREIGN KEY (user_id) REFERENCES users(id),
                        FOREIGN KEY (product_id) REFERENCES products(id)
                    )
                ");
            }

            echo "Migration completed successfully.\n";
        } catch (PDOException $e) {
            echo "Migration failed: " . $e->getMessage() . "\n";
            exit(1);
        }
    }

    public function down($table = null) {
        try {
            $this->db->exec("SET FOREIGN_KEY_CHECKS = 0");
            if ($table) {
                // Drop only the specified table
                if ($this->tableExists($table)) {
                    $this->db->exec("DROP TABLE IF EXISTS `" . addslashes($table) . "`");
                    echo "Table '$table' dropped successfully.\n";
                } else {
                    echo "Table '$table' does not exist.\n";
                }
            } else {
                // Drop all tables in reverse order to respect foreign key constraints
                $this->db->exec("DROP TABLE IF EXISTS votes");
                $this->db->exec("DROP TABLE IF EXISTS products");
                $this->db->exec("DROP TABLE IF EXISTS companies");
                $this->db->exec("DROP TABLE IF EXISTS users");
                $this->db->exec("DROP TABLE IF EXISTS areas");
                echo "All tables dropped successfully.\n";
            }
            $this->db->exec("SET FOREIGN_KEY_CHECKS = 1");
        } catch (PDOException $e) {
            echo "Rollback failed: " . $e->getMessage() . "\n";
        }
    }
}

$dropTable = null;
if (isset($argv[1]) && $argv[1] === 'down') {
    $dropTable = isset($argv[2]) ? $argv[2] : null;
    $migration = new CreateTablesMigration();
    $migration->down($dropTable);
} else {
    $migration = new CreateTablesMigration();
    $migration->up();
}