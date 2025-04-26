<?php
require_once __DIR__ . '/../config/config.php';

class AuthMiddleware {
    public static function check() {
        $config = Config::getConfig();

        // Start session with configured settings
        session_name($config['session']['name']);
        session_set_cookie_params($config['session']['lifetime']);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            Config::log("Unauthorized access attempt to restricted route: " . $_SERVER['REQUEST_URI']);
            header('Location: ' . $config['base_url'] . '/login');
            exit;
        }

        Config::log("User {$_SESSION['user_id']} accessed restricted route: " . $_SERVER['REQUEST_URI']);
    }
}