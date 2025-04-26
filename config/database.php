<?php
class DatabaseConfig {
    private const HOST = 'localhost';
    private const DB_NAME = 'healthy_habitat';
    private const USERNAME = 'root';
    private const PASSWORD = '';

    public static function getConfig() {
        return [
            'host' => self::HOST,
            'dbname' => self::DB_NAME,
            'username' => self::USERNAME,
            'password' => self::PASSWORD,
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        ];
    }
}