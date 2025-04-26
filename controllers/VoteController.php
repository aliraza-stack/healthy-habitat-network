<?php
require_once __DIR__ . '/../services/VoteService.php';
require_once __DIR__ . '/../services/ProductService.php';
require_once __DIR__ . '/../config/config.php';

class VoteController {
    private $voteService;
    private $productService;

    public function __construct() {
        $this->voteService = new VoteService();
        $this->productService = new ProductService();
    }

    public function show($productId) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $products = $this->productService->getAllProducts();
        $product = $products[array_search($productId, array_column($products, 'id'))] ?? null;
        if (!$product) {
            throw new Exception("Product not found.");
        }
        $title = "Vote for Product";
        ob_start();
        require_once __DIR__ . '/../views/votes/vote.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function vote($productId, $data) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        try {
            if (!isset($data['vote']) || !in_array($data['vote'], ['0', '1'])) {
                throw new Exception("Invalid vote selection.");
            }
            $this->voteService->castVote($_SESSION['user_id'], $productId, $data['vote']);
            Config::log("Vote cast by user {$_SESSION['user_id']} for product $productId: {$data['vote']}");
            $success = "Vote submitted successfully!";
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
            $products = $this->productService->getAllProducts();
            $product = $products[array_search($productId, array_column($products, 'id'))] ?? null;
            $title = "Vote for Product";
            ob_start();
            require_once __DIR__ . '/../views/votes/vote.php';
            $content = ob_get_clean();
            require_once __DIR__ . '/../views/layouts/main.php';
        }
    }
}