<main class="min-h-screen w-full py-8 px-4 md:px-8">
    <div class="h-full bg-white rounded-lg shadow-sm p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Image Section -->
            <div class="space-y-4">
                <!-- Main Image -->
                <figure>
                    <img src="https://placehold.co/800x600?text=<?php echo htmlspecialchars($product->name); ?>" alt="<?php echo htmlspecialchars($product->name); ?>" class="w-full h-full md:h-[70vh] object-cover rounded-lg">
                </figure>
                <!-- Thumbnails -->
                <div class="flex space-x-2 overflow-x-auto">
                    <button class="focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg">
                        <img src="https://placehold.co/100x100?text=Thumbnail+1" alt="Thumbnail 1 of Purple Dress" class="w-20 h-20 object-cover rounded-lg">
                    </button>
                    <button class="focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg">
                        <img src="https://placehold.co/100x100?text=Thumbnail+2" alt="Thumbnail 2 of Purple Dress" class="w-20 h-20 object-cover rounded-lg">
                    </button>
                    <button class="focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg">
                        <img src="https://placehold.co/100x100?text=Thumbnail+3" alt="Thumbnail 3 of Purple Dress" class="w-20 h-20 object-cover rounded-lg">
                    </button>
                    <button class="focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg">
                        <img src="https://placehold.co/100x100?text=Thumbnail+4" alt="Thumbnail 4 of Purple Dress" class="w-20 h-20 object-cover rounded-lg">
                    </button>
                </div>
            </div>

            <!-- Details Section -->
            <div class="space-y-4">
                <!-- Product Name -->
                <h1 class="text-3xl font-bold text-gray-900"><?php echo htmlspecialchars($product->name); ?></h1>

                <!-- Rating -->
                <div class="flex items-center">
                    <div class="flex space-x-1 text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>

                <!-- Price -->
                <p class="text-3xl font-semibold text-gray-900">$<?php echo htmlspecialchars($product->price_category); ?></p>


                <!-- Additional Details -->
                <dl class="space-y-2 mt-4">
                    <div class="flex items-start">
                        <dt class="text-sm font-medium text-gray-500">Description:</dt>
                        <dd class="ml-2 text-sm text-gray-900"><?php echo htmlspecialchars($product->description); ?></dd>
                    </div>
                    <div class="flex items-center">
                        <dt class="text-sm font-medium text-gray-500">Size/Quantity:</dt>
                        <dd class="ml-2 text-sm text-gray-900"><?php echo htmlspecialchars($product->size_quantity); ?></dd>
                    </div>
                    <div class="flex items-start">
                        <dt class="text-sm font-medium text-gray-500">Health Benefits:</dt>
                        <dd class="ml-2 text-sm text-gray-900"><?php echo htmlspecialchars($product->health_benefits); ?></dd>
                    </div>
                    <div class="flex items-center">
                        <dt class="text-sm font-medium text-gray-500">Company:</dt>
                        <dd class="ml-2 text-sm text-gray-900"><?php echo htmlspecialchars($company->name); ?></dd>
                    </div>
                    <div class="flex items-center">
                        <dt class="text-sm font-medium text-gray-500">Certifications:</dt>
                        <dd class="ml-2 text-sm text-gray-900"><?php echo htmlspecialchars(implode(', ', json_decode($product->certifications ?? '[]'))); ?></dd>
                    </div>
                    <div class="flex items-center">
                        <dt class="text-sm font-medium text-gray-500">Votes:</dt>
                        <dd class="ml-2 text-sm text-gray-900">Yes: <?php echo $votes['yes_votes'] ?? 0; ?> | No: <?php echo $votes['no_votes'] ?? 0; ?></dd>
                    </div>
                </dl>

                <!-- Back to Products Button -->
                <div class="mt-6">
                    <a href="/products" class="inline-block bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>