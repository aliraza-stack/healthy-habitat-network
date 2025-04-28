<?php
require_once __DIR__ . '/../services/CompanyService.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
require_once __DIR__ . '/../config/config.php';

class CompanyController {
    private $companyService;

    public function __construct() {
        $this->companyService = new CompanyService();
    }

    public function index() {
        $title = "Companies";
        $companies = $this->companyService->getAllCompanies();
        ob_start();
        require_once __DIR__ . '/../views/companies/index.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function showCreate() {
        AuthMiddleware::check(); // Restrict to logged-in users
        $title = "Add Company";
        ob_start();
        require_once __DIR__ . '/../views/companies/create.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function create($data) {
        AuthMiddleware::check(); // Restrict to logged-in users
        try {
            if (empty($data['name']) || empty($data['contact_email']) || empty($data['contact_phone'])) {
                throw new Exception("All fields are required.");
            }
            $this->companyService->addCompany([
                'name' => $data['name'],
                'contact_email' => $data['contact_email'],
                'contact_phone' => $data['contact_phone'],
                'contact_address' => $data['contact_address'] ?? null
            ]);
            Config::log("Company created by user {$_SESSION['user_id']}: {$data['name']}");
            $success = "Company added successfully!";
            $title = "Companies";
            $companies = $this->companyService->getAllCompanies();
            ob_start();
            require_once __DIR__ . '/../views/companies/index.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        } catch (Exception $e) {
            $error = $e->getMessage();
            $title = "Add Company";
            ob_start();
            require_once __DIR__ . '/../views/companies/create.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        }
    }

    public function show($id) {
        $title = "Company Details";
        $company = $this->companyService->getCompany($id);
        if (!$company) {
            throw new Exception("Company not found.");
        }
        ob_start();
        require_once __DIR__ . '/../views/companies/show.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }
}