$(document).ready(() => {
    // Toggle mobile menu
    $('#mobileMenuButton').on('click', function () {
        $('#mobileMenu').slideToggle('fast');
        $(this).find('svg').toggleClass('rotate-180');
    });

    // Toggle user dropdown
    $('#userDropdown').on('click', function () {
        $('#dropdownMenu').toggleClass('hidden');
        const isExpanded = !$('#dropdownMenu').hasClass('hidden');
        $(this).attr('aria-expanded', isExpanded);
    });

    // Close dropdown when clicking outside
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#userDropdown, #dropdownMenu').length) {
            $('#dropdownMenu').addClass('hidden');
            $('#userDropdown').attr('aria-expanded', 'false');
        }
    });

    // Accessibility: Allow keyboard navigation for dropdown
    $('#userDropdown').on('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $('#dropdownMenu').toggleClass('hidden');
            const isExpanded = !$('#dropdownMenu').hasClass('hidden');
            $(this).attr('aria-expanded', isExpanded);
        }
    });

    // Close mobile menu on link click
    $('#mobileMenu a').on('click', function () {
        $('#mobileMenu').slideUp('fast');
        $('#mobileMenuButton').find('svg').removeClass('rotate-180');
    });
    // Newsletter form validation
    $('#newsletterForm').on('submit', function (e) {
        let isValid = true;
        const $firstName = $('#firstName');
        const $lastName = $('#lastName');
        const $email = $('#email');

        const setError = ($input, message) => {
            $input.next('.error-message').remove();
            $input.after(`<p class="error-message text-red-600 text-xs mt-1">${message}</p>`);
            $input.addClass('border-red-600');
            isValid = false;
        };

        const clearError = ($input) => {
            $input.next('.error-message').remove();
            $input.removeClass('border-red-600');
        };

        // First Name validation
        if ($firstName.val().length < 2) {
            setError($firstName, 'First name must be at least 2 characters');
        } else {
            clearError($firstName);
        }

        // Last Name validation
        if ($lastName.val().length < 2) {
            setError($lastName, 'Last name must be at least 2 characters');
        } else {
            clearError($lastName);
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test($email.val())) {
            setError($email, 'Please enter a valid email address');
        } else {
            clearError($email);
        }

        if (!isValid) {
            e.preventDefault();
            $(this).find('.error-message:visible').first().prev('input').focus();
        }
    });

    // Real-time input validation with debounce
    let timeout;
    $('#firstName, #lastName, #email').on('input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const $this = $(this);
            const fieldName = $this.attr('id');

            if (fieldName === 'firstName' && $this.val().length >= 2) {
                $this.next('.error-message').remove();
                $this.removeClass('border-red-600');
            }

            if (fieldName === 'lastName' && $this.val().length >= 2) {
                $this.next('.error-message').remove();
                $this.removeClass('border-red-600');
            }

            if (fieldName === 'email' && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($this.val())) {
                $this.next('.error-message').remove();
                $this.removeClass('border-red-600');
            }
        }, 300);
    });

    // Testimonial carousel navigation
    let currentTestimonial = 0;
    const $dots = $('.flex.space-x-3 span');
    const $testimonials = $('.testimonial'); // Placeholder for dynamic testimonials

    function updateCarousel() {
        $dots.removeClass('bg-blue-600').addClass('bg-gray-300');
        $dots.eq(currentTestimonial).removeClass('bg-gray-300').addClass('bg-blue-600');
        // Add logic to update testimonial content if multiple testimonials are added
    }

    $('.flex.space-x-4 button').on('click', function () {
        if ($(this).attr('aria-label') === 'Previous testimonial') {
            currentTestimonial = currentTestimonial > 0 ? currentTestimonial - 1 : $dots.length - 1;
        } else {
            currentTestimonial = currentTestimonial < $dots.length - 1 ? currentTestimonial + 1 : 0;
        }
        updateCarousel();
    });

    const $toast = $('#errorToast');

    // Fade-in animation on page load
    setTimeout(() => {
        $toast.removeClass('opacity-0 -translate-y-4');
    }, 100); // Small delay to ensure initial classes are applied

    // Auto-dismiss after 3 seconds
    setTimeout(() => {
        $toast.addClass('opacity-0 -translate-y-4');
        $toast.one('transitionend', () => {
            $toast.remove();
        });
    }, 3000);

    // Manual dismiss on close button click
    $('#closeToast').on('click', () => {
        $toast.addClass('opacity-0 -translate-y-4');
        $toast.one('transitionend', () => {
            $toast.remove();
        });
    });

    // Accessibility: Allow keyboard dismissal
    $('#closeToast').on('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $toast.addClass('opacity-0 -translate-y-4');
            $toast.one('transitionend', () => {
                $toast.remove();
            });
        }
    });
});

$(document).ready(() => {
    // Tab switching
    const toggleTabs = (activeTab, activeSection) => {
        // Reset all tabs to inactive state
        $('#dashboardTab, #companyTab, #areaTab').removeClass('bg-blue-600').addClass('bg-gray-700 hover:bg-gray-600').attr('aria-selected', 'false');
        // Set active tab
        $(`#${activeTab}`).removeClass('bg-gray-700 hover:bg-gray-600').addClass('bg-blue-600').attr('aria-selected', 'true');
        // Hide all sections
        $('#dashboardSection, #companyForm, #areaForm').addClass('hidden');
        // Show active section
        $(`#${activeSection}`).removeClass('hidden');
    };

    $('#dashboardTab').on('click', () => toggleTabs('dashboardTab', 'dashboardSection'));
    $('#companyTab').on('click', () => toggleTabs('companyTab', 'companyForm'));
    $('#areaTab').on('click', () => toggleTabs('areaTab', 'areaForm'));

    // Validation for Create Company Form
    $('#companyForm').on('submit', function (e) {
        let isValid = true;
        const $companyName = $('#company_name');
        const $contactInfo = $('#contact_info');

        const setError = ($input, message) => {
            const $error = $(`#${$input.attr('id')}-error`);
            $error.text(message).removeClass('hidden');
            $input.addClass('border-red-600');
            isValid = false;
        };

        const clearError = ($input) => {
            const $error = $(`#${$input.attr('id')}-error`);
            $error.addClass('hidden').text('');
            $input.removeClass('border-red-600');
        };

        // Company Name validation
        if ($companyName.val().trim() === '') {
            setError($companyName, 'Company name is required');
        } else {
            clearError($companyName);
        }

        // Contact Info validation
        if ($contactInfo.val().trim() === '') {
            setError($contactInfo, 'Contact info is required');
        } else {
            try {
                JSON.parse($contactInfo.val());
                clearError($contactInfo);
            } catch (error) {
                setError($contactInfo, 'Contact info must be valid JSON');
            }
        }

        if (!isValid) {
            e.preventDefault();
            $(this).find('.error-message:not(.hidden)').first().prev().prev('input, textarea').focus();
        }
    });

    // Validation for Create Area Form
    $('#areaForm').on('submit', function (e) {
        let isValid = true;
        const $areaName = $('#area_name');
        const $councilId = $('#council_id');

        const setError = ($input, message) => {
            const $error = $(`#${$input.attr('id')}-error`);
            $error.text(message).removeClass('hidden');
            $input.addClass('border-red-600');
            isValid = false;
        };

        const clearError = ($input) => {
            const $error = $(`#${$input.attr('id')}-error`);
            $error.addClass('hidden').text('');
            $input.removeClass('border-red-600');
        };

        // Area Name validation
        if ($areaName.val().trim() === '') {
            setError($areaName, 'Area name is required');
        } else {
            clearError($areaName);
        }

        // Council ID validation
        if ($councilId.val().trim() === '') {
            setError($councilId, 'Council ID is required');
        } else {
            clearError($councilId);
        }

        if (!isValid) {
            e.preventDefault();
            $(this).find('.error-message:not(.hidden)').first().prev().prev('input').focus();
        }
    });

    // Real-time input validation with debounce
    let timeout;
    $('#company_name, #contact_info, #area_name, #council_id').on('input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const $this = $(this);
            const fieldName = $this.attr('id');

            if (fieldName === 'company_name' || fieldName === 'area_name' || fieldName === 'council_id') {
                if ($this.val().trim() !== '') {
                    const $error = $(`#${fieldName}-error`);
                    $error.addClass('hidden').text('');
                    $this.removeClass('border-red-600');
                }
            }

            if (fieldName === 'contact_info') {
                if ($this.val().trim() !== '') {
                    try {
                        JSON.parse($this.val());
                        const $error = $(`#${fieldName}-error`);
                        $error.addClass('hidden').text('');
                        $this.removeClass('border-red-600');
                    } catch (error) {
                        const $error = $(`#${fieldName}-error`);
                        $error.text('Contact info must be valid JSON').removeClass('hidden');
                        $this.addClass('border-red-600');
                    }
                }
            }
        }, 300);
    });
});