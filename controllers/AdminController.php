<?php
require_once __DIR__ . '/../services/CompanyService.php';
require_once __DIR__ . '/../services/AreaService.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
require_once __DIR__ . '/../config/config.php';

class AdminController {
    private $companyService;
    private $areaService;

    public function __construct() {
        $this->companyService = new CompanyService();
        $this->areaService = new AreaService();
    }

    public function dashboard() {
        AuthMiddleware::check();
        $title = "Admin Dashboard";
        ob_start();
        require_once __DIR__ . '/../views/admin/admin.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function createCompany($data) {
        AuthMiddleware::check();
        try {
            if (empty($data['company_name']) || empty($data['contact_info'])) {
                throw new Exception("Company name and contact info are required.");
            }
            $this->companyService->addCompany([
                'name' => $data['company_name'],
                'contact_info' => $data['contact_info']
            ]);
            header('Location: /admin?success=company');
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            $title = "Admin Dashboard";
            ob_start();
            require_once __DIR__ . '/../views/admin/admin.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        }
    }

    public function createArea($data) {
        AuthMiddleware::check();
        try {
            if (empty($data['area_name']) || empty($data['council_id'])) {
                throw new Exception("Area name and council ID are required.");
            }
            $this->areaService->addArea([
                'name' => $data['area_name'],
                'council_id' => $data['council_id']
            ]);
            header('Location: /admin?success=area');
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            $title = "Admin Dashboard";
            ob_start();
            require_once __DIR__ . '/../views/admin/admin.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        }
    }
}
