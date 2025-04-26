<?php

require_once __DIR__ . '/../services/HomeService.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
require_once __DIR__ . '/../config/config.php';

class HomeController
{
    private $homeService;

    public function __construct() {
        $this->homeService = new HomeService();
    }

    public function index()
    {
        $title = "Home";
        ob_start();
        require_once __DIR__ . '/../views/home/index.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }
}