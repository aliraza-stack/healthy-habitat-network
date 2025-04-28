<div class="flex items-center justify-center min-h-screen">
    <main class="flex flex-1 justify-center items-center py-8">
        <div class="w-full max-w-lg px-4">
            <!-- Form Title -->
            <h1 class="text-2xl font-bold text-center mb-6 text-gray-900">Add New Company</h1>

            <!-- Company Form -->
            <form id="companyForm" method="POST" action="/companies/create" class="space-y-4">
                <div class="form-group relative">
                    <label for="name" class="sr-only">Name</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-4m-6 0H5" />
                        </svg>
                        <input type="text" id="name" name="name" placeholder="Company Name" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="name-error">
                    </div>
                    <p id="name-error" class="error-message text-red-600 text-xs mt-1 hidden">Company name is required</p>
                </div>
                <div class="form-group relative">
                    <label for="contact_email" class="sr-only">Contact Email</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <input type="email" id="contact_email" name="contact_email" placeholder="Contact Email" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="contact_email-error">
                    </div>
                    <p id="contact_email-error" class="error-message text-red-600 text-xs mt-1 hidden">A valid email is required</p>
                </div>
                <div class="form-group relative">
                    <label for="contact_phone" class="sr-only">Contact Phone</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <input type="text" id="contact_phone" name="contact_phone" placeholder="Contact Phone" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" required aria-describedby="contact_phone-error">
                    </div>
                    <p id="contact_phone-error" class="error-message text-red-600 text-xs mt-1 hidden">Contact phone is required</p>
                </div>
                <div class="form-group relative">
                    <label for="contact_address" class="sr-only">Contact Address</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.243l-4.243-4.243m0 0L9.172 7.757M13.414 12l4.243-4.243" />
                        </svg>
                        <input type="text" id="contact_address" name="contact_address" placeholder="Contact Address (Optional)" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-describedby="contact_address-error">
                    </div>
                    <p id="contact_address-error" class="error-message text-red-600 text-xs mt-1 hidden"></p>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Add Company
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
