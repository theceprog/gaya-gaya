<?php
// Handle form submission
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // In a real application, you would update the database here
    // For this example, we'll just show a success message
    
    $fullName = htmlspecialchars($_POST['full_name'] ?? '');
    $gender = htmlspecialchars($_POST['gender'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $mobile = htmlspecialchars($_POST['mobile'] ?? '');
    
    // Basic validation
    if (empty($fullName) || empty($email) || empty($mobile)) {
        $message = 'Please fill in all required fields.';
        $messageType = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
        $messageType = 'error';
    } else {
        // Here you would typically update the database
        // UPDATE users SET full_name = ?, gender = ?, email = ?, mobile = ? WHERE id = ?
        
        $message = 'Profile updated successfully!';
        $messageType = 'success';
        
        // Update the user array with new values
        $user = [
            'full_name' => $fullName,
            'gender' => $gender,
            'role' => 'Admin', // Role typically shouldn't be editable by user
            'email' => $email,
            'mobile' => $mobile
        ];
    }
} else {
    // Default user data (normally fetched from database)
    $user = [
        'full_name' => 'Mikaela Somera',
        'gender' => 'Female',
        'role' => 'Admin',
        'email' => 'mikaelasomera13@gmail.com',
        'mobile' => '09123456789'
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-wrapper">
        <div class="header">
            <a href="dashboard.php" class="back-arrow">←</a>
            <div class="header-title">Profile</div>
        </div>

        <div class="profile-container">
            <?php if ($message): ?>
                <div class="message <?php echo $messageType; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form id="profileForm" method="POST" action="">
                <!-- Full Name + Gender Row -->
                <div class="field-row">
                    <div class="field">
                        <label class="field-label">Full Name:</label>
                        <div class="input-container">
                            <div class="field-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                            <input type="text" name="full_name" class="field-input" value="<?php echo htmlspecialchars($user['full_name']); ?>" readonly required minlength="2" maxlength="100" title="Full name must be between 2-100 characters">
                        </div>
                        <div class="field-error" id="fullname-error" style="display: none;"></div>
                    </div>
                    <div class="field">
                        <label class="field-label">Gender:</label>
                        <div class="input-container">
                            <div class="field-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4a4 4 0 0 1 4 4 4 4 0 0 1-4 4 4 4 0 0 1-4-4 4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2 2 2 0 0 0 2 2 2 2 0 0 0 2-2 2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4z"/>
                                </svg>
                            </div>
                            <select name="gender" class="field-input" disabled required>
                                <option value="">Select Gender</option>
                                <option value="Male" <?php echo $user['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo $user['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                                <option value="Other" <?php echo $user['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>
                        <div class="field-error" id="gender-error" style="display: none;"></div>
                    </div>
                </div>

                <!-- Role -->
                <div class="field-row single">
                    <div class="field">
                        <label class="field-label">Role:</label>
                        <div class="input-container">
                            <div class="field-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10z"/>
                                </svg>
                            </div>
                            <input type="text" class="field-input" value="<?php echo htmlspecialchars($user['role']); ?>" readonly>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="field-row single">
                    <div class="field">
                        <label class="field-label">Email Address:</label>
                        <div class="input-container">
                            <div class="field-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" class="field-input" value="<?php echo htmlspecialchars($user['email']); ?>" readonly required maxlength="255" title="Please enter a valid email address">
                            <div class="edit-icon" onclick="enableEdit('email')">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="field-error" id="email-error" style="display: none;"></div>
                    </div>
                </div>

                <!-- Mobile Number -->
                <div class="field-row single">
                    <div class="field">
                        <label class="field-label">Mobile Number:</label>
                        <div class="input-container">
                            <div class="field-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                </svg>
                            </div>
                            <input type="text" name="mobile" class="field-input" value="<?php echo htmlspecialchars($user['mobile']); ?>" readonly required pattern="^09[0-9]{9}$" title="Please enter a valid Philippine mobile number (09XXXXXXXXX)">
                            <div class="edit-icon" onclick="enableEdit('mobile')">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="field-error" id="mobile-error" style="display: none;"></div>
                    </div>
                </div>

                <!-- Edit Profile Button -->
                <div class="button-container">
                    <button type="button" id="editBtn" class="btn edit-password-btn" onclick="enableEditMode()">Edit Profile</button>
                    <button type="submit" id="saveBtn" class="btn save-btn" style="display: none;">Save Changes</button>
                    <button type="button" id="cancelBtn" class="btn cancel-btn" style="display: none;" onclick="cancelEdit()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Store original values for cancel functionality
        let originalValues = {};
        let isEditMode = false;
        let hasUnsavedChanges = false;

        // Real-time validation functions
        function validateField(field, showError = true) {
            const value = field.value.trim();
            const fieldName = field.name;
            let isValid = true;
            let errorMessage = '';

            // Remove previous validation classes
            field.classList.remove('valid', 'invalid');

            switch(fieldName) {
                case 'full_name':
                    if (value.length < 2) {
                        isValid = false;
                        errorMessage = 'Full name must be at least 2 characters long';
                    } else if (value.length > 100) {
                        isValid = false;
                        errorMessage = 'Full name must not exceed 100 characters';
                    } else if (!/^[a-zA-Z\s.-]+$/.test(value)) {
                        isValid = false;
                        errorMessage = 'Full name can only contain letters, spaces, dots, and hyphens';
                    }
                    break;

                case 'email':
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        isValid = false;
                        errorMessage = 'Please enter a valid email address';
                    }
                    break;

                case 'mobile':
                    const mobileRegex = /^09[0-9]{9}$/;
                    if (!mobileRegex.test(value)) {
                        isValid = false;
                        errorMessage = 'Mobile number must be in format: 09XXXXXXXXX';
                    }
                    break;

                case 'gender':
                    if (!value) {
                        isValid = false;
                        errorMessage = 'Please select a gender';
                    }
                    break;
            }

            // Show/hide error message
            const errorElement = document.getElementById(fieldName.replace('_', '') + '-error');
            if (errorElement) {
                if (!isValid && showError) {
                    errorElement.textContent = errorMessage;
                    errorElement.style.display = 'block';
                    field.classList.add('invalid');
                } else {
                    errorElement.style.display = 'none';
                    if (value && isValid) {
                        field.classList.add('valid');
                    }
                }
            }

            return isValid;
        }

        function checkForChanges() {
            const currentValues = {
                full_name: document.querySelector('input[name="full_name"]').value,
                gender: document.querySelector('select[name="gender"]').value,
                email: document.querySelector('input[name="email"]').value,
                mobile: document.querySelector('input[name="mobile"]').value
            };

            hasUnsavedChanges = JSON.stringify(currentValues) !== JSON.stringify(originalValues);
            
            // Update save button state
            const saveBtn = document.getElementById('saveBtn');
            if (saveBtn.style.display !== 'none') {
                saveBtn.disabled = !hasUnsavedChanges || !validateAllFields(false);
                saveBtn.style.opacity = saveBtn.disabled ? '0.6' : '1';
            }
        }

        function validateAllFields(showErrors = true) {
            const fields = ['full_name', 'gender', 'email', 'mobile'];
            let allValid = true;

            fields.forEach(fieldName => {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field && !field.hasAttribute('readonly') && !field.hasAttribute('disabled')) {
                    if (!validateField(field, showErrors)) {
                        allValid = false;
                    }
                }
            });

            return allValid;
        }

        function enableEditMode() {
            isEditMode = true;
            
            // Store original values
            originalValues = {
                full_name: document.querySelector('input[name="full_name"]').value,
                gender: document.querySelector('select[name="gender"]').value,
                email: document.querySelector('input[name="email"]').value,
                mobile: document.querySelector('input[name="mobile"]').value
            };
            
            // Enable all editable fields
            const fullNameField = document.querySelector('input[name="full_name"]');
            const genderField = document.querySelector('select[name="gender"]');
            const emailField = document.querySelector('input[name="email"]');
            const mobileField = document.querySelector('input[name="mobile"]');

            fullNameField.removeAttribute('readonly');
            genderField.removeAttribute('disabled');
            emailField.removeAttribute('readonly');
            mobileField.removeAttribute('readonly');
            
            // Add event listeners for real-time validation
            [fullNameField, genderField, emailField, mobileField].forEach(field => {
                field.addEventListener('input', () => {
                    validateField(field);
                    checkForChanges();
                });
                field.addEventListener('blur', () => validateField(field, true));
            });
            
            // Show/hide buttons
            document.getElementById('editBtn').style.display = 'none';
            document.getElementById('saveBtn').style.display = 'inline-block';
            document.getElementById('cancelBtn').style.display = 'inline-block';
            
            // Hide individual edit icons
            document.querySelectorAll('.edit-icon').forEach(icon => {
                icon.style.display = 'none';
            });

            // Focus on first field
            fullNameField.focus();
        }

        function enableEdit(fieldName) {
            if (!isEditMode) {
                // Store original value for this field only
                originalValues[fieldName] = document.querySelector(`[name="${fieldName}"]`).value;
                
                // Enable the specific field
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field.tagName === 'SELECT') {
                    field.removeAttribute('disabled');
                } else {
                    field.removeAttribute('readonly');
                }
                
                // Add event listeners
                field.addEventListener('input', () => {
                    validateField(field);
                    checkForChanges();
                });
                field.addEventListener('blur', () => validateField(field, true));
                
                field.focus();
            }
        }

        function cancelEdit() {
            // Show confirmation if there are unsaved changes
            if (hasUnsavedChanges && !confirm('You have unsaved changes. Are you sure you want to cancel?')) {
                return;
            }

            // Restore original values
            Object.keys(originalValues).forEach(fieldName => {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    field.value = originalValues[fieldName];
                    
                    // Disable field
                    if (field.tagName === 'SELECT') {
                        field.setAttribute('disabled', '');
                    } else {
                        field.setAttribute('readonly', '');
                    }
                    
                    // Clear validation states
                    field.classList.remove('valid', 'invalid');
                    const errorElement = document.getElementById(fieldName.replace('_', '') + '-error');
                    if (errorElement) {
                        errorElement.style.display = 'none';
                    }
                }
            });
            
            // Reset states
            isEditMode = false;
            hasUnsavedChanges = false;
            originalValues = {};
            
            // Show/hide buttons
            document.getElementById('editBtn').style.display = 'inline-block';
            document.getElementById('saveBtn').style.display = 'none';
            document.getElementById('cancelBtn').style.display = 'none';
            
            // Show individual edit icons
            document.querySelectorAll('.edit-icon').forEach(icon => {
                icon.style.display = 'flex';
            });
        }

        // Enhanced form validation
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            if (!validateAllFields(true)) {
                e.preventDefault();
                
                // Scroll to first error
                const firstError = document.querySelector('.field-input.invalid');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstError.focus();
                }
                
                return false;
            }
            
            // Show loading state
            const saveBtn = document.getElementById('saveBtn');
            const originalText = saveBtn.textContent;
            saveBtn.textContent = 'Saving...';
            saveBtn.disabled = true;
            
            return true;
        });

        // Prevent leaving page with unsaved changes
        window.addEventListener('beforeunload', function(e) {
            if (hasUnsavedChanges) {
                e.preventDefault();
                e.returnValue = '';
                return '';
            }
        });

        // Auto-hide success/error messages
        document.addEventListener('DOMContentLoaded', function() {
            const message = document.querySelector('.message');
            if (message) {
                setTimeout(function() {
                    message.style.transition = 'opacity 0.3s ease';
                    message.style.opacity = '0';
                    setTimeout(function() {
                        message.style.display = 'none';
                    }, 300);
                }, 5000);
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch(e.key) {
                    case 's':
                        e.preventDefault();
                        if (isEditMode && hasUnsavedChanges) {
                            document.getElementById('profileForm').dispatchEvent(new Event('submit'));
                        }
                        break;
                    case 'Escape':
                        if (isEditMode) {
                            cancelEdit();
                        }
                        break;
                }
            }
        });
    </script>
</body>
</html>