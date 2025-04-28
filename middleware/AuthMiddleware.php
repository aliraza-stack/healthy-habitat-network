<?php
require_once __DIR__ . '/../config/config.php';

class AuthMiddleware {
    public static function check() {
        $config = Config::getConfig();

        // Check if route is restricted
        if (strpos($_SERVER['REQUEST_URI'], '/api') === false) {
            return;
        }

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

        // Only allow admin user to access /admin routes
        if (strpos($_SERVER['REQUEST_URI'], '/admin') === 0) {
            if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
                Config::log("Non-admin user attempted to access admin route: " . $_SERVER['REQUEST_URI']);
                http_response_code(403);
                $title = 'Forbidden';
                $error = 'You do not have permission to access this page.';
                ob_start();
                require_once __DIR__ . '/../views/alerts/error.php';
                $content = ob_get_clean();
                require_once __DIR__ . '/../views/layouts/main.php';
                exit;
            }
        }

        Config::log("User {$_SESSION['user_id']} accessed restricted route: " . $_SERVER['REQUEST_URI']);
    }
}