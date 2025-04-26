<?php
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../models/Home.php';

class HomeService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

}