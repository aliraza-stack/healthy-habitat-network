<?php
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/User.php';

class UserService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function registerUser($data) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO users (username, email, password, location, age_group, gender, interests)
                VALUES (:username, :email, :password, :location, :age_group, :gender, :interests)
            ");
            $stmt->execute([
                ':username' => $data['username'],
                ':email' => $data['email'],
                ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
                ':location' => $data['location'],
                ':age_group' => $data['age_group'],
                ':gender' => $data['gender'],
                ':interests' => json_encode($data['interests'])
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("User registration failed: " . $e->getMessage());
        }
    }

    public function login($email, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetchObject('User');
            if ($user && password_verify($password, $user->password)) {
                return $user;
            }
            throw new Exception("Invalid email or password");
        } catch (PDOException $e) {
            throw new Exception("Login failed: " . $e->getMessage());
        }
    }

    public function getUser($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetchObject('User');
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch user: " . $e->getMessage());
        }
    }
}