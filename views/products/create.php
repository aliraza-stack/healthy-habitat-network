
<div class="flex items-center justify-center min-h-screen">
    <main class="flex flex-1 justify-center items-center py-8">
        <div class="w-full max-w-2xl px-4">
            <!-- Form Title -->
            <h1 class="text-2xl font-bold text-center mb-6 text-gray-900">Add New Product</h1>

            <!-- Product Form -->
            <form id="productForm" method="POST" action="/products/create" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group relative">
                        <label for="name" class="sr-only">Name</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18m-9-9v18" />
                            </svg>
                            <input type="text" id="name" name="name" placeholder="Product Name" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="name-error">
                        </div>
                        <p id="name-error" class="error-message text-red-600 text-xs mt-1 hidden">Product name is required</p>
                    </div>
                    <div class="form-group relative">
                        <label for="size_quantity" class="sr-only">Size/Quantity</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4m8-8v16" />
                            </svg>
                            <input type="text" id="size_quantity" name="size_quantity" placeholder="Size/Quantity" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="size_quantity-error">
                        </div>
                        <p id="size_quantity-error" class="error-message text-red-600 text-xs mt-1 hidden">Size/Quantity is required</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group relative">
                        <label for="description" class="sr-only">Description</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <textarea id="description" name="description" placeholder="Description" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 min-h-[100px]" required aria-describedby="description-error"></textarea>
                        </div>
                        <p id="description-error" class="error-message text-red-600 text-xs mt-1 hidden">Description is required</p>
                    </div>
                    <div class="form-group relative">
                        <label for="health_benefits" class="sr-only">Health Benefits</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            <textarea id="health_benefits" name="health_benefits" placeholder="Health Benefits" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 min-h-[100px]" required aria-describedby="health_benefits-error"></textarea>
                        </div>
                        <p id="health_benefits-error" class="error-message text-red-600 text-xs mt-1 hidden">Health Benefits are required</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group relative">
                        <label for="price_category" class="sr-only">Price Category</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.1 0-2 .9-2 2m0 4c0 1.1.9 2 2 2m-6-6h12m-6-6v12" />
                            </svg>
                            <select id="price_category" name="price_category" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="price_category-error">
                                <option value="">Select Price Category...</option>
                                <option value="affordable">Affordable</option>
                                <option value="moderate">Moderate</option>
                                <option value="premium">Premium</option>
                            </select>
                        </div>
                        <p id="price_category-error" class="error-message text-red-600 text-xs mt-1 hidden">Please select a price category</p>
                    </div>
                    <div class="form-group relative">
                        <label for="company_id" class="sr-only">Company</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-4m-6 0H5" />
                            </svg>
                            <select id="company_id" name="company_id" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="company_id-error">
                                <option value="">Select a company...</option>
                                <?php foreach ($companies as $company): ?>
                                    <option value="<?php echo $company->id; ?>"><?php echo htmlspecialchars($company->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <p id="company_id-error" class="error-message text-red-600 text-xs mt-1 hidden">Please select a company</p>
                    </div>
                </div>
                <div class="form-group relative">
                    <label for="certifications" class="sr-only">Certifications</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6-6H3v16h18V6z" />
                        </svg>
                        <input type="text" id="certifications" name="certifications" placeholder="Certifications (comma-separated)" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="certifications-error">
                    </div>
                    <p id="certifications-error" class="error-message text-red-600 text-xs mt-1 hidden"></p>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Add Product
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
