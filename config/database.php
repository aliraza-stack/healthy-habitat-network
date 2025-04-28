<?php
require_once __DIR__ . '/../includes/Env.php';

class DatabaseConfig {
    private const HOST = null;
    private const DB_NAME = null;
    private const USERNAME = null;
    private const PASSWORD = null;

    public static function getConfig() {
        return [
            'host' => getenv('DB_HOST'),
            'dbname' => getenv('DB_NAME'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        ];
    }
}