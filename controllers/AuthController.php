<?php
require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../services/AreaService.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
require_once __DIR__ . '/../config/config.php';

class AuthController {
    private $userService;
    private $areaService;

    public function __construct() {
        $this->userService = new UserService();
        $this->areaService = new AreaService();
    }

    public function showRegister() {
        // AuthMiddleware::check(); // Restrict registration to logged-in users
        $title = "Register";
        $areas = $this->areaService->getAllAreas();
        ob_start();
        require_once __DIR__ . '/../views/auth/register.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function register($data) {
        // AuthMiddleware::check(); // Restrict registration to logged-in users
        try {
            if (empty($data['username']) || empty($data['email']) || empty($data['password']) || empty($data['location']) || empty($data['age_group']) || empty($data['gender'])) {
                throw new Exception("All fields are required.");
            }
            $userId = $this->userService->registerUser([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                'location' => $data['location'],
                'age_group' => $data['age_group'],
                'gender' => $data['gender'],
                'interests' => $data['interests'] ?? []
            ]);
            Config::log("New user registered: ID $userId");
            $_SESSION['user_id'] = $userId;
            header('Location: /products');
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            $title = "Register";
            $areas = $this->areaService->getAllAreas();
            ob_start();
            require_once __DIR__ . '/../views/auth/register.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        }
    }

    public function showLogin() {
        $title = "Login";
        ob_start();
        require_once __DIR__ . '/../views/auth/login.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function login($data) {
        try {
            if (empty($data['email']) || empty($data['password'])) {
                throw new Exception("Email and password are required.");
            }
            $user = $this->userService->login($data['email'], $data['password']);
            Config::log("User logged in: ID {$user->id}");
            $_SESSION['user_id'] = $user->id;
            header('Location: /products');
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            $title = "Login";
            ob_start();
            require_once __DIR__ . '/../views/auth/login.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        }
    }

    public function logout() {
        Config::log("User logged out: ID {$_SESSION['user_id']}");
        session_destroy();
        header('Location: /');
        exit;
    }
}