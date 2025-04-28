<div class="flex items-center justify-center h-screen">
<main class="flex flex-1 justify-center items-center py-8">
    <div class="bg-white p-8 w-full max-w-md">
        <!-- Form Title -->
        <div class="text-4xl font-extrabold text-gray-900 mb-6 text-center">
            Welcome back to<br>Healthy Habitat
        </div>

        <!-- Login Form -->
        <form id="loginForm" method="POST" action="/login" class="space-y-5">
            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Email"
                        class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        aria-describedby="email-error"
                >
                <p id="email-error" class="error-message">Please enter a valid email address</p>
            </div>
            <div class="form-group relative">
                <label for="password" class="sr-only">Password</label>
                <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password"
                        class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        aria-describedby="password-error"
                >
                <button
                        type="button"
                        onclick="togglePassword('password', 'eyeIcon')"
                        class="absolute right-4 top-2.5 text-gray-500 hover:text-gray-700"
                        aria-label="Toggle password visibility"
                >
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
                <p id="password-error" class="error-message">Password must be at least 8 characters</p>
            </div>
            <div class="text-right">
                <a href="/forgot-password" class="text-blue-600 hover:underline text-sm">Forgot Password?</a>
            </div>
            <div>
                <button
                        type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
                    Log In
                </button>
            </div>
        </form>

        <!-- Sign Up Link -->
        <p class="text-center text-gray-500 mt-6 text-sm">
            Don't have an account? <a href="/register" class="text-blue-600 font-semibold hover:underline">Sign Up</a>
        </p>
    </div>
</main>
</div>


