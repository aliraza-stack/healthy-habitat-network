<div class="flex items-center justify-center min-h-screen">
    <main class="flex flex-1 justify-center items-center py-8">
        <div class="w-full max-w-2xl px-4">
            <!-- Tabs -->
            <div class="flex justify-center mb-6 space-x-6">
                <button id="individualTab" class="font-semibold pb-2 border-b-2 border-blue-600 text-blue-600 cursor-pointer focus:outline-none" aria-selected="true" role="tab">
                    For Individual
                </button>
                <button id="businessTab" class="font-semibold pb-2 border-b-2 border-transparent text-gray-500 hover:text-blue-600 hover:border-blue-600 transition cursor-pointer focus:outline-none" aria-selected="false" role="tab">
                    For Business
                </button>
            </div>

            <!-- Form Title -->
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-900">Create Your Account</h2>

            <!-- Individual Form -->
            <form id="individualForm" method="POST" action="/register" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group relative">
                        <label for="ind-username" class="sr-only">Username</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <input type="text" id="ind-username" name="username" placeholder="Username" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="ind-username-error">
                        </div>
                        <p id="ind-username-error" class="error-message text-red-600 text-xs mt-1 hidden">Username must be at least 3 characters long</p>
                    </div>
                    <div class="form-group relative">
                        <label for="ind-email" class="sr-only">Email</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v4a2 2 0 002 2h2m-2 4h12a2 2 0 002-2v-2H6v2a2 2 0 002 2z" />
                            </svg>
                            <input type="email" id="ind-email" name="email" placeholder="Email" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="ind-email-error">
                        </div>
                        <p id="ind-email-error" class="error-message text-red-600 text-xs mt-1 hidden">Please enter a valid email address</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group relative">
                        <label for="ind-password" class="sr-only">Password</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1.9-2 2-2m-2 6c-1.1 0-2-.9-2-2m0 0c0-1.1-.9-2-2-2m2 2c1.1 0 2 .9 2 2m-4-6h8m-8 4h8M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            </svg>
                            <input id="ind-password" type="password" name="password" placeholder="Password" class="w-full pl-10 pr-12 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="ind-password-error">
                            <button type="button" onclick="togglePassword('ind-password', 'ind-eyeIcon')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700" aria-label="Toggle password visibility">
                                <svg id="ind-eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <p id="ind-password-error" class="error-message text-red-600 text-xs mt-1 hidden">Password must be at least 8 characters, include uppercase, lowercase, number, and special character</p>
                    </div>
                    <div class="form-group relative">
                        <label for="ind-confirm-password" class="sr-only">Confirm Password</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1.9-2 2-2m-2 6c-1.1 0-2-.9-2-2m0 0c0-1.1-.9-2-2-2m2 2c1.1 0 2 .9 2 2m-4-6h8m-8 4h8M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            </svg>
                            <input id="ind-confirm-password" type="password" name="confirm_password" placeholder="Confirm Password" class="w-full pl-10 pr-12 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="ind-confirm-password-error">
                            <button type="button" onclick="togglePassword('ind-confirm-password', 'ind-confirm-eyeIcon')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700" aria-label="Toggle password visibility">
                                <svg id="ind-confirm-eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <p id="ind-confirm-password-error" class="error-message text-red-600 text-xs mt-1 hidden">Passwords do not match</p>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Sign Up
                    </button>
                </div>
            </form>

            <!-- Business Form (Hidden by default) -->
            <form id="businessForm" method="POST" action="/register" class="space-y-4 hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group relative">
                        <label for="bus-username" class="sr-only">Business Username</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <input type="text" id="bus-username" name="username" placeholder="Business Username" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="bus-username-error">
                        </div>
                        <p id="bus-username-error" class="error-message text-red-600 text-xs mt-1 hidden">Username must be at least 3 characters long</p>
                    </div>
                    <div class="form-group relative">
                        <label for="bus-email" class="sr-only">Business Email</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v4a2 2 0 002 2h2m-2 4h12a2 2 0 002-2v-2H6v2a2 2 0 002 2z" />
                            </svg>
                            <input type="email" id="bus-email" name="email" placeholder="Business Email" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="bus-email-error">
                        </div>
                        <p id="bus-email-error" class="error-message text-red-600 text-xs mt-1 hidden">Please enter a valid email address</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group relative">
                        <label for="bus-password" class="sr-only">Password</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1.9-2 2-2m-2 6c-1.1 0-2-.9-2-2m0 0c0-1.1-.9-2-2-2m2 2c1.1 0 2 .9 2 2m-4-6h8m-8 4h8M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            </svg>
                            <input id="bus-password" type="password" name="password" placeholder="Password" class="w-full pl-10 pr-12 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="bus-password-error">
                            <button type="button" onclick="togglePassword('bus-password', 'bus-eyeIcon')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700" aria-label="Toggle password visibility">
                                <svg id="bus-eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <p id="bus-password-error" class="error-message text-red-600 text-xs mt-1 hidden">Password must be at least 8 characters, include uppercase, lowercase, number, and special character</p>
                    </div>
                    <div class="form-group relative">
                        <label for="bus-confirm-password" class="sr-only">Confirm Password</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1.9-2 2-2m-2 6c-1.1 0-2-.9-2-2m0 0c0-1.1-.9-2-2-2m2 2c1.1 0 2 .9 2 2m-4-6h8m-8 4h8M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            </svg>
                            <input id="bus-confirm-password" type="password" name="confirm_password" placeholder="Confirm Password" class="w-full pl-10 pr-12 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="bus-confirm-password-error">
                            <button type="button" onclick="togglePassword('bus-confirm-password', 'bus-confirm-eyeIcon')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700" aria-label="Toggle password visibility">
                                <svg id="bus-confirm-eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <p id="bus-confirm-password-error" class="error-message text-red-600 text-xs mt-1 hidden">Passwords do not match</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="form-group">
                        <label for="bus-location" class="sr-only">Location</label>
                        <select id="bus-location" name="location" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="bus-location-error">
                            <option value="">Select an area...</option>
                            <?php foreach ($areas as $area): ?>
                                <option value="<?php echo $area->id; ?>"><?php echo htmlspecialchars($area->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p id="bus-location-error" class="error-message text-red-600 text-xs mt-1 hidden">Please select a location</p>
                    </div>
                    <div class="form-group">
                        <label for="bus-age_group" class="sr-only">Age Group</label>
                        <select id="bus-age_group" name="age_group" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="bus-age_group-error">
                            <option value="">Select...</option>
                            <option value="18-25">18-25</option>
                            <option value="26-35">26-35</option>
                            <option value="36-50">36-50</option>
                            <option value="51+">51+</option>
                        </select>
                        <p id="bus-age_group-error" class="error-message text-red-600 text-xs mt-1 hidden">Please select an age group</p>
                    </div>
                    <div class="form-group">
                        <label for="bus-gender" class="sr-only">Gender</label>
                        <select id="bus-gender" name="gender" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="bus-gender-error">
                            <option value="">Select...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <p id="bus-gender-error" class="error-message text-red-600 text-xs mt-1 hidden">Please select a gender</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700 mb-2">Interests</label>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="relative flex items-center p-4 rounded-lg border border-gray-200 hover:border-blue-400 transition-colors interest-container">
                            <input class="absolute opacity-0 w-full h-full cursor-pointer" type="checkbox" name="interests[]" value="Nutrition" id="bus-nutrition">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center group-hover:bg-green-200 transition-colors">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                                    </svg>
                                </div>
                                <label class="text-gray-700 font-medium cursor-pointer" for="bus-nutrition">Nutrition</label>
                            </div>
                        </div>
                        <div class="relative flex items-center p-4 rounded-lg border border-gray-200 hover:border-blue-400 transition-colors interest-container">
                            <input class="absolute opacity-0 w-full h-full cursor-pointer" type="checkbox" name="interests[]" value="Fitness" id="bus-fitness">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <label class="text-gray-700 font-medium cursor-pointer" for="bus-fitness">Fitness</label>
                            </div>
                        </div>
                        <div class="relative flex items-center p-4 rounded-lg border border-gray-200 hover:border-blue-400 transition-colors interest-container">
                            <input class="absolute opacity-0 w-full h-full cursor-pointer" type="checkbox" name="interests[]" value="Mental Health" id="bus-mental_health">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <label class="text-gray-700 font-medium cursor-pointer" for="bus-mental_health">Mental Health</label>
                            </div>
                        </div>
                        <div class="relative flex items-center p-4 rounded-lg border border-gray-200 hover:border-blue-400 transition-colors interest-container">
                            <input class="absolute opacity-0 w-full h-full cursor-pointer" type="checkbox" name="interests[]" value="Sustainable Living" id="bus-sustainable_living">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center group-hover:bg-yellow-200 transition-colors">
                                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <label class="text-gray-700 font-medium cursor-pointer" for="bus-sustainable_living">Sustainable Living</label>
                            </div>
                        </div>
                        <p id="bus-interests-error" class="error-message text-red-600 text-xs mt-1 hidden">Please select at least one interest</p>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Sign Up
                        </button>
                    </div>
            </form>

            <!-- Login Link -->
            <p class="text-center text-gray-500 mt-6 text-sm">
                Already have an account? <a href="/login" class="text-blue-600 font-semibold hover:underline">Log In</a>
            </p>
        </div>
    </main>
</div>
