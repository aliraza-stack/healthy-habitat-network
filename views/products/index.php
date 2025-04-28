<main class="min-h-screen w-full py-8 px-4 md:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        <!-- Filter Sidebar -->
        <aside class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Filters</h2>
                <form>
                    <!-- Votes Filter -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-900 mb-2">Votes</h3>
                        <label class="flex items-center mb-2">
                            <input type="checkbox" class="h-4 w-4 accent-blue-600">
                            <span class="ml-2 text-sm text-gray-900">High Yes Votes (10+)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 accent-blue-600" checked>
                            <span class="ml-2 text-sm text-gray-900">Low No Votes (0-5)</span>
                        </label>
                    </div>
                </form>
            </div>
        </aside>

        <!-- Products Section -->
        <section class="lg:col-span-3">
            <!-- Search and Sorting -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <div class="flex items-center w-full md:w-auto mb-4 md:mb-0">
                    <input type="text" placeholder="Search products..." class="w-full md:w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-label="Search products">
                    <button class="ml-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Search
                    </button>
                </div>
                <div class="flex items-center">
                    <span class="text-sm text-gray-500 mr-2">Search results: <?php echo count($products); ?></span>
                    <select class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-label="Sort products">
                        <option>Sort by: Highest Votes</option>
                        <option>Sort by: Lowest Votes</option>
                        <option>Sort by: Price (Low to High)</option>
                        <option>Sort by: Price (High to Low)</option>
                    </select>
                </div>
            </div>

            <!-- Products List -->
            <?php if (empty($products)): ?>
                <p class="text-center text-gray-500 text-sm">No products available.</p>
            <?php else: ?>
                <?php
                // Helper: fetch company for each product
                require_once __DIR__ . '/../../services/CompanyService.php';
                $companyService = new CompanyService();
                ?>
                <div class="space-y-4">
                    <?php foreach ($products as $productData): ?>
                        <?php
                        $product = $productData['product'];
                        $company = null;
                        if (isset($product->company_id)) {
                            $company = $companyService->getCompany($product->company_id);
                        }
                        ?>
                        <article class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($product->name); ?></h3>
                                <span class="text-sm text-gray-500">10 days ago</span>
                            </div>
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="px-2 py-1 bg-gray-100 text-sm text-gray-900 rounded"><?php echo htmlspecialchars($product->price_category); ?>/unit</span>
                                <span class="px-2 py-1 bg-gray-100 text-sm text-gray-900 rounded">Yes: <?php echo $productData['votes']['yes_votes'] ?? 0; ?> | No: <?php echo $productData['votes']['no_votes'] ?? 0; ?></span>
                                <span class="px-2 py-1 bg-gray-100 text-sm text-gray-900 rounded"><?php echo htmlspecialchars($company ? $company->name : 'N/A'); ?></span>
                            </div>
                            <p class="text-sm text-gray-900 mb-2">
                                <?php echo htmlspecialchars(substr($product->description, 0, 100)); ?>...
                                <a href="/products/<?php echo $product->id; ?>" class="text-orange-500 hover:text-orange-600">read more</a>
                            </p>
                            <div class="flex space-x-2">
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-400">
                                        Suggest
                                    </button>
                                    <button class="text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400" aria-label="Save product">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </button>
                                <?php endif; ?>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Suggest reward: 500 USD</p>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- Promotional Sidebar -->
        <aside class="lg:col-span-1 hidden lg:block">
            <div class="space-y-4">
                <!-- Suggest a Product -->
                <div class="bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg p-6 text-white">
                    <h3 class="text-lg font-semibold mb-2">Do you know a great product?</h3>
                    <p class="text-sm mb-4">Suggest a product to us and receive a reward when it's added!</p>
                    <button class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition duration-300 focus:outline-none focus:ring-2 focus:ring-teal-400">
                        Suggest a Product
                    </button>
                </div>

                <!-- Create an Alert -->
                <div class="bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg p-6 text-white">
                    <h3 class="text-lg font-semibold mb-2">Create a subscription</h3>
                    <p class="text-sm mb-4">Just enter your email to get all new product offers matching your search.</p>
                    <button class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition duration-300 focus:outline-none focus:ring-2 focus:ring-teal-400">
                        Create a subscription
                    </button>
                </div>
            </div>
        </aside>
    </div>
</main>