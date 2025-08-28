<?php
// You can add PHP logic here if needed
// For example, fetching settings data from database
$settings = [
    'sensor_status' => 'OFFLINE',
    'sms_alerts' => false,
    'email_alerts' => true
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="settings.css">
    <title>Settings</title>
</head>
<body>
    <div class="settings-wrapper">
        <div class="header">
            <a href="dashboard.php" class="back-arrow">←</a>
            <div class="header-title">Settings</div>
            <!-- Logout Button -->
            <a href="Login.php" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.59L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                </svg>
                <span>Logout</span>
            </a>
        </div>

        <div class="settings-container">
            <!-- Sensor Status Section -->
            <div class="section">
                <div class="section-title">
                    <svg class="section-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    Sensor Status Monitoring
                </div>
                <div class="status-row clickable" onclick="toggleSensorStatus()" id="sensor-status-row">
                    <div class="status-icons">
                        <div class="status-icon <?php echo $settings['sensor_status'] == 'OFFLINE' ? 'error' : 'success'; ?>" id="status-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="status-svg">
                                <?php if($settings['sensor_status'] == 'OFFLINE'): ?>
                                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                                <?php else: ?>
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                <?php endif; ?>
                            </svg>
                        </div>
                    </div>
                    <div class="status-text">
                        <strong>Status:</strong> <span id="status-text"><?php echo htmlspecialchars($settings['sensor_status']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Notification Preferences Section -->
            <div class="section">
                <div class="section-title">
                    <svg class="section-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                    </svg>
                    Notification Preferences
                </div>
                
                <div class="notification-item">
                    <div class="notification-left">
                        <div class="notification-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57-.35-.11-.74-.03-1.02.24l-2.2 2.2c-2.83-1.44-5.15-3.75-6.59-6.59l2.2-2.2c.27-.27.35-.67.24-1.02C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM19 12h2c0-4.97-4.03-9-9-9v2c3.87 0 7 3.13 7 7zm-4 0h2c0-2.76-2.24-5-5-5v2c1.66 0 3 1.34 3 3z"/>
                            </svg>
                        </div>
                        <div class="notification-content">
                            <span class="notification-text">SMS Alerts</span>
                            <span class="notification-desc">Receive text message notifications</span>
                        </div>
                    </div>
                    <div class="toggle-switch <?php echo $settings['sms_alerts'] ? 'active' : ''; ?>" onclick="toggleSwitch(this, 'sms_alerts')">
                        <div class="toggle-slider"></div>
                    </div>
                </div>

                <div class="notification-item">
                    <div class="notification-left">
                        <div class="notification-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <div class="notification-content">
                            <span class="notification-text">Email Alerts</span>
                            <span class="notification-desc">Receive email notifications</span>
                        </div>
                    </div>
                    <div class="toggle-switch <?php echo $settings['email_alerts'] ? 'active' : ''; ?>" onclick="toggleSwitch(this, 'email_alerts')">
                        <div class="toggle-slider"></div>
                    </div>
                </div>
            </div>

            <!-- Account Section -->
            <div class="section">
                <div class="section-title">
                    <svg class="section-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    Account Management
                </div>
                
                <div class="notification-item">
                    <div class="notification-left">
                        <div class="notification-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <div class="notification-content">
                            <span class="notification-text">Edit Profile</span>
                            <span class="notification-desc">Update your account information</span>
                        </div>
                    </div>
                    <a href="profile.php" class="action-btn">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSwitch(element, settingName) {
            element.classList.toggle('active');
            
            // You can add AJAX call here to save the setting
            const isActive = element.classList.contains('active');
            console.log(`${settingName} is now: ${isActive ? 'ON' : 'OFF'}`);
            
            // Example AJAX call (uncomment and modify as needed):
            // fetch('update_setting.php', {
            //     method: 'POST',
            //     headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            //     body: `setting=${settingName}&value=${isActive ? '1' : '0'}`
            // });
        }

        function toggleSensorStatus() {
            const statusIcon = document.getElementById('status-icon');
            const statusText = document.getElementById('status-text');
            const statusSvg = document.getElementById('status-svg');
            const statusRow = document.getElementById('sensor-status-row');
            
            // Get current status
            const currentStatus = statusText.textContent;
            
            // Toggle status
            if (currentStatus === 'OFFLINE') {
                // Change to ONLINE
                statusText.textContent = 'ONLINE';
                statusIcon.className = 'status-icon success';
                statusSvg.innerHTML = '<path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>';
                
                // Add success flash effect
                statusRow.style.background = 'rgba(25,195,125,0.3)';
                statusRow.style.borderColor = 'rgba(25,195,125,0.5)';
            } else {
                // Change to OFFLINE
                statusText.textContent = 'OFFLINE';
                statusIcon.className = 'status-icon error';
                statusSvg.innerHTML = '<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>';
                
                // Add error flash effect
                statusRow.style.background = 'rgba(249,92,43,0.3)';
                statusRow.style.borderColor = 'rgba(249,92,43,0.5)';
            }
            
            // Reset background after animation
            setTimeout(() => {
                statusRow.style.background = '';
                statusRow.style.borderColor = '';
            }, 2000);
            
            // You can add AJAX call here to save the status change
            console.log(`Sensor status changed to: ${statusText.textContent}`);
            
            // Example AJAX call:
            // fetch('update_sensor_status.php', {
            //     method: 'POST',
            //     headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            //     body: `status=${statusText.textContent}`
            // });
        }
    </script>
</body>
</html>