<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/ProductController.php';
require_once __DIR__ . '/../controllers/VoteController.php';
require_once __DIR__ . '/../controllers/CompanyController.php';
require_once __DIR__ . '/../controllers/AreaController.php';
require_once __DIR__ . '/../controllers/AdminController.php';
require_once __DIR__ . '/../controllers/PageController.php';

// Apply configuration settings
$config = Config::getConfig();
date_default_timezone_set($config['timezone']);

// Enable error reporting based on debug mode
if ($config['debug_mode']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
}

// Start session (moved to middleware, but ensure it's initialized here for non-restricted routes)
session_name($config['session']['name']);
session_set_cookie_params($config['session']['lifetime']);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri, '/'));

function render404() {
    http_response_code(404);
    $title = "404 Not Found";
    ob_start();
    require_once __DIR__ . '/../views/shared/404.php';
    $content = ob_get_clean();
    require_once __DIR__ . '/../views/layouts/main.php';
    exit;
}

try {
    switch ($segments[0] ?? '') {
        case '':
            $controller = new HomeController();
            $controller->index();
            break;

        case 'products':
            $controller = new ProductController();
            if ($method === 'GET' && !isset($segments[1])) {
                $controller->index();
            } elseif ($method === 'GET' && $segments[1] === 'create') {
                $controller->showCreate();
            } elseif ($method === 'POST' && $segments[1] === 'create') {
                $controller->create($_POST);
            } elseif ($method === 'GET' && isset($segments[1]) && is_numeric($segments[1])) {
                $controller->show($segments[1]);
            } else {
                render404();
            }
            break;

        case 'register':
            $controller = new AuthController();
            if ($method === 'GET') {
                $controller->showRegister();
            } elseif ($method === 'POST') {
                $controller->register($_POST);
            } else {
                render404();
            }
            break;

        case 'login':
            $controller = new AuthController();
            if ($method === 'GET') {
                $controller->showLogin();
            } elseif ($method === 'POST') {
                $controller->login($_POST);
            } else {
                render404();
            }
            break;

        case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;

        case 'vote':
            $controller = new VoteController();
            if ($method === 'GET' && isset($segments[1]) && is_numeric($segments[1])) {
                $controller->show($segments[1]);
            } elseif ($method === 'POST' && isset($segments[1]) && is_numeric($segments[1])) {
                $controller->vote($segments[1], $_POST);
            } else {
                render404();
            }
            break;

        case 'companies':
            $controller = new CompanyController();
            if ($method === 'GET' && !isset($segments[1])) {
                $controller->index();
            } elseif ($method === 'GET' && $segments[1] === 'create') {
                $controller->showCreate();
            } elseif ($method === 'POST' && $segments[1] === 'create') {
                $controller->create($_POST);
            } elseif ($method === 'GET' && isset($segments[1]) && is_numeric($segments[1])) {
                $controller->show($segments[1]);
            } else {
                render404();
            }
            break;

        case 'areas':
            $controller = new AreaController();
            if ($method === 'GET' && !isset($segments[1])) {
                $controller->index();
            } elseif ($method === 'GET' && $segments[1] === 'create') {
                $controller->showCreate();
            } elseif ($method === 'POST' && $segments[1] === 'create') {
                $controller->create($_POST);
            } else {
                render404();
            }
            break;

        case 'about':
            $controller = new PageController();
            $controller->about();
            break;

        case 'contact':
            $controller = new PageController();
            $controller->contact($_POST);
            break;

        case 'admin':
            $controller = new AdminController();
            if ($method === 'GET' && !isset($segments[1])) {
                $controller->dashboard();
            } elseif ($method === 'POST' && isset($segments[1]) && $segments[1] === 'create-company') {
                $controller->createCompany($_POST);
            } elseif ($method === 'POST' && isset($segments[1]) && $segments[1] === 'create-area') {
                $controller->createArea($_POST);
            } else {
                render404();
            }
            break;

        default:
            render404();
    }
} catch (Exception $e) {
    Config::log("Exception occurred: " . $e->getMessage());
    http_response_code(500);
    $title = "Error";
    $error = $e->getMessage();
    ob_start();
    require_once __DIR__ . '/../views/alerts/error.php';
    $content = ob_get_clean();
    require_once __DIR__ . '/../views/layouts/main.php';
}