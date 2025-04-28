<div class="flex flex-col md:flex-row min-h-screen">
    <!-- Sidebar -->
    <aside class="bg-gray-800 text-white w-full md:w-64 flex-shrink-0">
        <div class="p-4">
            <h2 class="text-xl font-bold">Admin Dashboard</h2>
        </div>
        <nav class="flex md:flex-col space-x-2 md:space-x-0 md:space-y-1 p-4">
            <button id="dashboardTab" class="w-full text-left px-4 py-2 bg-blue-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" aria-selected="true" role="tab">
                Dashboard
            </button>
            <button id="companyTab" class="w-full text-left px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-400" aria-selected="false" role="tab">
                Create Company
            </button>
            <button id="areaTab" class="w-full text-left px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-400" aria-selected="false" role="tab">
                Create Area
            </button>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <div class="max-w-4xl mx-auto">
            <!-- Dashboard Section -->
            <div id="dashboardSection">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Dashboard</h3>
                <!-- Companies Table -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">Companies</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg shadow-sm">
                            <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Info</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">GreenLife Inc.</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{ "email": "contact@greenlife.com", "phone": "123-456-7890" }</td>
                            </tr>
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">EcoWellness Ltd.</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{ "email": "info@ecowellness.com", "phone": "987-654-3210" }</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Areas Table -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">Areas</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg shadow-sm">
                            <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Area Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Council ID</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">North Valley</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">101</td>
                            </tr>
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">South Ridge</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">102</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Create Company Form (Hidden by default) -->
            <form id="companyForm" method="POST" action="/admin/create-company" class="space-y-4 hidden">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Create Company</h3>
                <div class="form-group relative">
                    <label for="company_name" class="sr-only">Company Name</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-4m-6 0H5" />
                        </svg>
                        <input type="text" id="company_name" name="company_name" placeholder="Company Name" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="company_name-error">
                    </div>
                    <p id="company_name-error" class="error-message text-red-600 text-xs mt-1 hidden">Company name is required</p>
                </div>
                <div class="form-group relative">
                    <label for="contact_info" class="sr-only">Contact Info (JSON)</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-3 top-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <textarea id="contact_info" name="contact_info" placeholder="Contact Info (JSON)" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 min-h-[100px]" required aria-describedby="contact_info-error"></textarea>
                    </div>
                    <p id="contact_info-error" class="error-message text-red-600 text-xs mt-1 hidden">Contact info is required</p>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Create Company
                    </button>
                </div>
            </form>

            <!-- Create Area Form (Hidden by default) -->
            <form id="areaForm" method="POST" action="/admin/create-area" class="space-y-4 hidden">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Create Area</h3>
                <div class="form-group relative">
                    <label for="area_name" class="sr-only">Area Name</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.243l-4.243-4.243m0 0L9.172 7.757M13.414 12l4.243-4.243" />
                        </svg>
                        <input type="text" id="area_name" name="area_name" placeholder="Area Name" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="area_name-error">
                    </div>
                    <p id="area_name-error" class="error-message text-red-600 text-xs mt-1 hidden">Area name is required</p>
                </div>
                <div class="form-group relative">
                    <label for="council_id" class="sr-only">Council ID</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        <input type="number" id="council_id" name="council_id" placeholder="Council ID" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="council_id-error">
                    </div>
                    <p id="council_id-error" class="error-message text-red-600 text-xs mt-1 hidden">Council ID is required</p>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Create Area
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
