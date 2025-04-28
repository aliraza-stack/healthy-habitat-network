<div class="min-h-screen">
    <main class="flex flex-1 justify-center items-center py-8">
        <div class="w-full px-4">
            <!-- Page Title and Add New Company Button -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Companies</h1>
                <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="/companies/create" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow-sm hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Add New Company
                </a>
                <?php endif; ?>
            </div>

            <!-- Companies Table or Empty State -->
            <?php if (empty($companies)): ?>
                <p class="text-center text-gray-500 text-sm">No companies available.</p>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow-sm">
                        <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Phone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Address</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($companies as $company): ?>
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($company->name); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($company->contact_email); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($company->contact_phone); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?php echo htmlspecialchars($company->contact_address); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="/companies/<?php echo $company->id; ?>" class="text-blue-600 hover:text-blue-800 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-400 rounded px-2 py-1">View</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </main>
</div>
