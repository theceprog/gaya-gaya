<?php
// Example notifications (later connect with DB/Firebase)
$notifications = [
  [
    "title" => "Sensor Offline",
    "message" => "The monitoring sensor is not responding. Please check the device.",
    "time" => "August 17. 2025 10:15 PM"
  ],
  [
    "title" => "Manual Alert Triggered",
    "message" => 'Admin issued an evacuation alert: <b>“Please evacuate immediately.”</b>',
    "time" => "August 17. 2025 8:45 AM"
  ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TubiAlert Dashboard</title>
  <link rel="stylesheet" href="notif.css">
</head>
<body>

  <!-- Navbar -->
<div class="navbar-icons">
  <i class="fa fa-bell" id="notifBtn"></i>
  <i class="fa fa-user-circle"></i>
  <i class="fa fa-cog"></i>
</div>

<!-- Notification Dropdown -->
<div class="notification-box" id="notifBox">
  <div class="notif-header">
    <h4>Notification</h4>
    <a href="#" id="markAll">Mark all as read</a>
  </div>

  <div class="notif-item red">
    <p><strong>🔴 Flood Alert – Evacuate Level</strong><br>
      Critical flood level detected at Post 3. Evacuation recommended immediately.<br>
      <span class="time">August 16, 2025 08:42 PM</span>
    </p>
  </div>

  <div class="notif-item orange">
    <p><strong>🟠 Flood Alert – Alert Level</strong><br>
      Water level at Post 1 reached 70% of danger threshold.<br>
      <span class="time">August 15, 2025 02:30 PM</span>
    </p>
  </div>

  <div class="notif-item green">
    <p><strong>🟢 Sensor Online</strong><br>
      The monitoring sensor is now connected and reporting data.<br>
      <span class="time">August 15, 2025 05:30 PM</span>
    </p>
  </div>

  <div class="notif-item yellow">
    <p><strong>🟡 Flood Alert – Monitoring Level</strong><br>
      Rainfall intensity at 45mm/hr. Monitoring advised.<br>
      <span class="time">August 15, 2025 02:30 PM</span>
    </p>
  </div>
</div>


  <script src="notif.js"></script>
</body>
</html>
