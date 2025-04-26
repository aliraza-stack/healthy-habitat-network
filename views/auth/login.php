<div class="flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-3xl font-bold text-gray-800 mb-8 text-center">
            LOGO
        </div>

        <!-- Login Form -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6 relative">
                Login
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-blue-600"></span>
            </h2>
            <form id="loginForm" method="POST" action="/login">
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mb-2">Email</label>
                    <input
                        type="email"
                        id="email"
                        placeholder="Email"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                        required
                    >
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-600 mb-2">Password</label>
                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            placeholder="Password"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            required
                        >
                        <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Forgot Password Link -->
                <div class="text-right mb-6">
                    <a href="#" class="text-blue-600 hover:underline text-sm">Forgot Password</a>
                </div>

                <!-- Login Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700"
                >
                    LOGIN
                </button>
            </form>

            <!-- Sign Up Link -->
            <p class="text-center mt-6 text-gray-600">
                If you have not Login.
                <a href="#" class="text-blue-600 hover:underline">SIGN UP</a>
            </p>
        </div>
    </div>
</div>