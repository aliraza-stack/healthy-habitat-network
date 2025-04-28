<div class="flex items-center justify-center min-h-screen">
    <main class="flex flex-1 justify-center items-center py-8">
        <div class="w-full max-w-lg px-4">
            <!-- Company Name -->
            <h1 class="text-2xl font-bold text-gray-900 mb-6"><?php echo htmlspecialchars($company->name); ?></h1>

            <!-- Company Details -->
            <dl class="space-y-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <dt class="text-sm font-medium text-gray-500">Email:</dt>
                    <dd class="ml-2 text-sm text-gray-900"><?php echo htmlspecialchars($company->contact_email); ?></dd>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <dt class="text-sm font-medium text-gray-500">Phone:</dt>
                    <dd class="ml-2 text-sm text-gray-900"><?php echo htmlspecialchars($company->contact_phone); ?></dd>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.243l-4.243-4.243m0 0L9.172 7.757M13.414 12l4.243-4.243" />
                    </svg>
                    <dt class="text-sm font-medium text-gray-500">Address:</dt>
                    <dd class="ml-2 text-sm text-gray-900"><?php echo htmlspecialchars($company->contact_address); ?></dd>
                </div>
            </dl>

            <!-- Back to Companies Button -->
            <div class="mt-6">
                <a href="/companies" class="inline-block bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Back to Companies
                </a>
            </div>
        </div>
    </main>
</div>
