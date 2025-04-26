<?php
require_once __DIR__ . '/../services/AreaService.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
require_once __DIR__ . '/../config/config.php';

class AreaController {
    private $areaService;

    public function __construct() {
        $this->areaService = new AreaService();
    }

    public function index() {
        $title = "Areas";
        $areas = $this->areaService->getAllAreas();
        ob_start();
        require_once __DIR__ . '/../views/areas/index.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function showCreate() {
        AuthMiddleware::check(); // Restrict to logged-in users
        $title = "Add Area";
        ob_start();
        require_once __DIR__ . '/../views/areas/create.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function create($data) {
        AuthMiddleware::check(); // Restrict to logged-in users
        try {
            if (empty($data['name']) || empty($data['council_id'])) {
                throw new Exception("All fields are required.");
            }
            $this->areaService->addArea([
                'name' => $data['name'],
                'council_id' => $data['council_id']
            ]);
            Config::log("Area created by user {$_SESSION['user_id']}: {$data['name']}");
            $success = "Area added successfully!";
            $title = "Areas";
            $areas = $this->areaService->getAllAreas();
            ob_start();
            require_once __DIR__ . '/../views/areas/index.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        } catch (Exception $e) {
            $error = $e->getMessage();
            $title = "Add Area";
            ob_start();
            require_once __DIR__ . '/../views/areas/create.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        }
    }
}