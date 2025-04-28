<div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 opacity-0 -translate-y-4 transition-all duration-500 ease-in-out" id="errorToast">
    <div class="bg-green-400 text-white rounded-xl px-4 py-3 shadow-lg flex items-center space-x-3 max-w-md w-full" role="alert" aria-live="assertive">
        <!-- Error Icon -->
        <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <!-- Message -->
        <div class="flex-1">
            <?php echo htmlspecialchars($success); ?>
        </div>
        <!-- Close Button -->
        <button class="focus:outline-none" id="closeToast" aria-label="Close error message">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>