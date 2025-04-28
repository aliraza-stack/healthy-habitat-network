<header class="bg-white shadow-lg sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="text-2xl font-bold text-gray-800">
                <a href="/" class="flex items-center space-x-2">
                    <span>Healthy Habitat</span>
                </a>
            </div>

            <!-- Hamburger Menu (Mobile) -->
            <button id="mobileMenuButton" class="md:hidden text-gray-600 focus:outline-none" aria-label="Toggle navigation menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="/products" class="nav-link font-medium">Products</a>
                <a href="/about" class="nav-link font-medium">About Us</a>
                <a href="/contact" class="nav-link font-medium">Contact Us</a>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="/login" class="nav-link font-medium">Login</a>
                    <a href="/register" class="nav-link font-medium">Sign Up</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- User Dropdown -->
                    <div class="relative">
                        <button id="userDropdown" class="flex items-center space-x-2 focus:outline-none" aria-haspopup="true" aria-expanded="false">
                            <img src="https://placehold.co/40" alt="User profile" class="w-10 h-10 rounded-full">
                            <span class="text-gray-600 font-medium"><?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="dropdownMenu" class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-10">
                            <a href="/dashboard" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600">Dashboard</a>
                            <a href="/logout" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600">Logout</a>
                        </div>
                    </div>
                <?php endif; ?>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden">
            <nav class="flex flex-col space-y-4 py-4">

                <a href="/products" class="nav-link font-medium">Products</a>
                <a href="/about" class="nav-link font-medium">About Us</a>
                <a href="/contact" class="nav-link font-medium">Contact Us</a>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="/login" class="nav-link font-medium">Login</a>
                    <a href="/register" class="nav-link font-medium">Sign Up</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                <div class="border-t pt-4">
                    <div class="flex items-center space-x-2">
                        <img src="https://placehold.co/40" alt="User profile" class="w-10 h-10 rounded-full">
                        <span class="text-gray-600 font-medium"><?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span>
                    </div>
                    <a href="/dashboard" class="block mt-2 text-gray-600 hover:text-blue-600">Dashboard</a>
                    <a href="/logout" class="block mt-2 text-gray-600 hover:text-blue-600">Logout</a>
                </div>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>
