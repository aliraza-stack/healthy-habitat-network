$(document).ready(() => {
    // Tab switching
    $('#individualTab').on('click', () => {
        $('#individualTab').addClass('border-blue-600 text-blue-600').removeClass('border-transparent text-gray-500');
        $('#businessTab').addClass('border-transparent text-gray-500').removeClass('border-blue-600 text-blue-600');
        $('#individualForm').removeClass('hidden');
        $('#businessForm').addClass('hidden');
        $('#individualTab').attr('aria-selected', 'true');
        $('#businessTab').attr('aria-selected', 'false');
    });

    $('#businessTab').on('click', () => {
        $('#businessTab').addClass('border-blue-600 text-blue-600').removeClass('border-transparent text-gray-500');
        $('#individualTab').addClass('border-transparent text-gray-500').removeClass('border-blue-600 text-blue-600');
        $('#businessForm').removeClass('hidden');
        $('#individualForm').addClass('hidden');
        $('#businessTab').attr('aria-selected', 'true');
        $('#individualTab').attr('aria-selected', 'false');
    });

    // Password toggle functionality
    window.togglePassword = function (inputId, iconId) {
        const $input = $(`#${inputId}`);
        const $icon = $(`#${iconId}`);
        const isPassword = $input.attr('type') === 'password';

        $input.attr('type', isPassword ? 'text' : 'password');
        $icon.html(isPassword
            ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.977 9.977 0 011.513-3.275m3.262-2.075A10.05 10.05 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.977 9.977 0 01-1.513 3.275m-3.262 2.075A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7m0 0l18 18" />'
            : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />'
        );
    };

    // Validation for Individual Form
    $('#individualForm').on('submit', function (e) {
        let isValid = true;
        const $username = $('#ind-username');
        const $email = $('#ind-email');
        const $password = $('#ind-password');
        const $confirmPassword = $('#ind-confirm-password');

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

        // Username validation
        if ($username.val().length < 3) {
            setError($username, 'Username must be at least 3 characters long');
        } else {
            clearError($username);
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test($email.val())) {
            setError($email, 'Please enter a valid email address');
        } else {
            clearError($email);
        }

        // Password validation
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!passwordRegex.test($password.val())) {
            setError($password, 'Password must be at least 8 characters, include uppercase, lowercase, number, and special character');
        } else {
            clearError($password);
        }

        // Confirm Password validation
        if ($confirmPassword.val() !== $password.val()) {
            setError($confirmPassword, 'Passwords do not match');
        } else {
            clearError($confirmPassword);
        }

        if (!isValid) {
            e.preventDefault();
            $(this).find('.error-message:not(.hidden)').first().prev().prev('input').focus();
        }
    });

    // Validation for Business Form
    $('#businessForm').on('submit', function (e) {
        let isValid = true;
        const $username = $('#bus-username');
        const $email = $('#bus-email');
        const $password = $('#bus-password');
        const $confirmPassword = $('#bus-confirm-password');
        const $location = $('#bus-location');
        const $ageGroup = $('#bus-age_group');
        const $gender = $('#bus-gender');
        const $interests = $('input[name="interests[]"]:checked');

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

        // Username validation
        if ($username.val().length < 3) {
            setError($username, 'Username must be at least 3 characters long');
        } else {
            clearError($username);
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test($email.val())) {
            setError($email, 'Please enter a valid email address');
        } else {
            clearError($email);
        }

        // Password validation
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!passwordRegex.test($password.val())) {
            setError($password, 'Password must be at least 8 characters, include uppercase, lowercase, number, and special character');
        } else {
            clearError($password);
        }

        // Confirm Password validation
        if ($confirmPassword.val() !== $password.val()) {
            setError($confirmPassword, 'Passwords do not match');
        } else {
            clearError($confirmPassword);
        }

        // Location validation
        if ($location.val() === '') {
            setError($location, 'Please select a location');
        } else {
            clearError($location);
        }

        // Age Group validation
        if ($ageGroup.val() === '') {
            setError($ageGroup, 'Please select an age group');
        } else {
            clearError($ageGroup);
        }

        // Gender validation
        if ($gender.val() === '') {
            setError($gender, 'Please select a gender');
        } else {
            clearError($gender);
        }

        // Interests validation
        if ($interests.length === 0) {
            $('#bus-interests-error').text('Please select at least one interest').removeClass('hidden');
            isValid = false;
        } else {
            $('#bus-interests-error').addClass('hidden').text('');
        }

        if (!isValid) {
            e.preventDefault();
            $(this).find('.error-message:not(.hidden)').first().prev().prev('input, select').focus();
        }
    });

    // Real-time input validation with debounce for both forms
    let timeout;
    $('#ind-username, #ind-email, #ind-password, #ind-confirm-password, #bus-username, #bus-email, #bus-password, #bus-confirm-password, #bus-location, #bus-age_group, #bus-gender').on('input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const $this = $(this);
            const fieldName = $this.attr('id');

            if (fieldName === 'ind-username' || fieldName === 'bus-username') {
                if ($this.val().length >= 3) {
                    const $error = $(`#${fieldName}-error`);
                    $error.addClass('hidden').text('');
                    $this.removeClass('border-red-600');
                }
            }

            if (fieldName === 'ind-email' || fieldName === 'bus-email') {
                if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($this.val())) {
                    const $error = $(`#${fieldName}-error`);
                    $error.addClass('hidden').text('');
                    $this.removeClass('border-red-600');
                }
            }

            if (fieldName === 'ind-password' || fieldName === 'bus-password') {
                if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test($this.val())) {
                    const $error = $(`#${fieldName}-error`);
                    $error.addClass('hidden').text('');
                    $this.removeClass('border-red-600');
                }
            }

            if (fieldName === 'ind-confirm-password') {
                if ($this.val() === $('#ind-password').val()) {
                    const $error = $(`#${fieldName}-error`);
                    $error.addClass('hidden').text('');
                    $this.removeClass('border-red-600');
                }
            }

            if (fieldName === 'bus-confirm-password') {
                if ($this.val() === $('#bus-password').val()) {
                    const $error = $(`#${fieldName}-error`);
                    $error.addClass('hidden').text('');
                    $this.removeClass('border-red-600');
                }
            }

            if (fieldName === 'bus-location' || fieldName === 'bus-age_group' || fieldName === 'bus-gender') {
                if ($this.val() !== '') {
                    const $error = $(`#${fieldName}-error`);
                    $error.addClass('hidden').text('');
                    $this.removeClass('border-red-600');
                }
            }
        }, 300);
    });

    // Real-time interests validation and color toggle
    $('input[name="interests[]"]').on('change', function () {
        const $checkbox = $(this);
        const $container = $checkbox.closest('.interest-container');

        // Toggle background color based on checkbox state
        if ($checkbox.is(':checked')) {
            $container.addClass('bg-blue-50');
        } else {
            $container.removeClass('bg-blue-50');
        }

        // Interests validation
        if ($('input[name="interests[]"]:checked').length > 0) {
            $('#bus-interests-error').addClass('hidden').text('');
        }
    });
});
$(document).ready(() => {
    // Password toggle function
    window.togglePassword = function (inputId, eyeIconId) {
        const $passwordInput = $(`#${inputId}`);
        const $eyeIcon = $(`#${eyeIconId}`);

        if ($passwordInput.attr('type') === 'password') {
            $passwordInput.attr('type', 'text');
            $eyeIcon.html(`
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.96 9.96 0 012.227-3.592M6.228 6.228A9.961 9.961 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.96 9.96 0 01-4.148 5.077M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 3l18 18" />
      `);
        } else {
            $passwordInput.attr('type', 'password');
            $eyeIcon.html(`
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
      `);
        }
    };

    // Validation function
    function validateForm() {
        let isValid = true;
        const $email = $('#email');
        const $password = $('#password');

        const setError = ($input, errorId, message) => {
            $(`#${errorId}`).text(message).show();
            $input.addClass('input-error');
            isValid = false;
        };

        const clearError = ($input, errorId) => {
            $(`#${errorId}`).hide();
            $input.removeClass('input-error');
        };

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test($email.val())) {
            setError($email, 'email-error', 'Please enter a valid email address');
        } else {
            clearError($email, 'email-error');
        }

        // Password validation
        if ($password.val().length < 8) {
            setError($password, 'password-error', 'Password must be at least 8 characters');
        } else {
            clearError($password, 'password-error');
        }

        return isValid;
    }

    // Form submission handler
    $('#loginForm').on('submit', function (e) {
        if (!validateForm()) {
            e.preventDefault();
            $(this).find('.error-message:visible').first().prev('input').focus();
        }
    });

    // Real-time input validation with debounce
    let timeout;
    $('#email, #password').on('input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const $this = $(this);
            const fieldName = $this.attr('name');

            if (fieldName === 'email' && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($this.val())) {
                $('#email-error').hide();
                $this.removeClass('input-error');
            }

            if (fieldName === 'password' && $this.val().length >= 8) {
                $('#password-error').hide();
                $this.removeClass('input-error');
            }
        }, 300);
    });
});