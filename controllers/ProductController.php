<?php
require_once __DIR__ . '/../services/ProductService.php';
require_once __DIR__ . '/../services/VoteService.php';
require_once __DIR__ . '/../services/CompanyService.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
require_once __DIR__ . '/../config/config.php';

class ProductController {
    private $productService;
    private $voteService;
    private $companyService;

    public function __construct() {
        $this->productService = new ProductService();
        $this->voteService = new VoteService();
        $this->companyService = new CompanyService();
    }

    public function index() {
        $title = "Products";
        $products = $this->productService->getAllProducts();
        $result = [];
        foreach ($products as $product) {
            $votes = $this->voteService->getProductVotes($product->id);
            $companies = $this->companyService->getProductCompanies($product->company_id);
            $result[] = ['product' => $product, 'votes' => $votes, 'companies' => $companies];
        }
        $products = $result;
        ob_start();
        require_once __DIR__ . '/../views/products/index.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function showCreate() {
        AuthMiddleware::check(); // Restrict to logged-in users
        $title = "Add Product";
        $companies = $this->companyService->getAllCompanies();
        ob_start();
        require_once __DIR__ . '/../views/products/create.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function create($data) {
        AuthMiddleware::check(); // Restrict to logged-in users
        try {
            if (empty($data['name']) || empty($data['description']) || empty($data['size_quantity']) || empty($data['health_benefits']) || empty($data['price_category']) || empty($data['company_id'])) {
                throw new Exception("All fields except certifications are required.");
            }
            $this->productService->addProduct([
                'name' => $data['name'],
                'description' => $data['description'],
                'size_quantity' => $data['size_quantity'],
                'health_benefits' => $data['health_benefits'],
                'price_category' => $data['price_category'],
                'company_id' => $data['company_id'],
                'certifications' => array_filter(explode(',', $data['certifications'] ?? ''))
            ]);
            Config::log("Product created by user {$_SESSION['user_id']}: {$data['name']}");
            $success = "Product added successfully!";
            $title = "Products";
            $products = $this->productService->getAllProducts();
            $result = [];
            foreach ($products as $product) {
                $votes = $this->voteService->getProductVotes($product->id);
                $result[] = ['product' => $product, 'votes' => $votes];
            }
            $products = $result;
            ob_start();
            require_once __DIR__ . '/../views/products/index.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        } catch (Exception $e) {
            $error = $e->getMessage();
            $title = "Add Product";
            $companies = $this->companyService->getAllCompanies();
            ob_start();
            require_once __DIR__ . '/../views/products/create.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        }
    }

    public function show($id) {
        $title = "Product Details";
        $products = $this->productService->getAllProducts();
        $product = $products[array_search($id, array_column($products, 'id'))] ?? null;
        if (!$product) {
            throw new Exception("Product not found.");
        }
        $votes = $this->voteService->getProductVotes($id);
        $company = $this->companyService->getCompany($product->company_id);
        ob_start();
        require_once __DIR__ . '/../views/products/show.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }
}