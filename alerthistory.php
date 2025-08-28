<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TubiAlert - Alert History</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Montserrat font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="alerthistory.css">
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <img src="tubialertlogo.png" alt="TUBIALERT Logo" class="navbar-logo" style="border-radius:50%;">
    <div class="navbar-title">TUBIALERT</div>
    <div class="navbar-links">
      <a href="dashboard.php">Dashboard</a>
      <a href="alerthistory.php" class="active">Alert History Log</a>
      <a href="emergency.php">Emergency Hotline</a>
      <a href="maps.php">Maps</a>
    </div>
    <div class="navbar-icons">
      <i class="fa fa-bell"></i>
      <a href="profile.php"><i  class="fa fa-user-circle"></i></a>
      <a href="settings.php"><i class="fa-solid fa-gear"></i></a>
    </div>
  </div>

  <!-- Status Bar -->
  <div class="status-bar">ALERT HISTORY</div>

  <!-- Container -->
  <div class="dashboard-container">
    <h1 class="dashboard-title">Flood Alert History</h1>
    <div class="dashboard-row">

      <!-- Timeline Card -->
      <div class="dashboard-card alert-history-log">
        <ul id="timeline" class="timeline"></ul>
        <!-- Legend -->
        <div class="legend">
          <span><span class="dot safe"></span> SAFE</span>
          <span><span class="dot monitor"></span> MONITOR</span>
          <span><span class="dot alert"></span> ALERT</span>
          <span><span class="dot evacuate"></span> EVACUATE</span>
        </div>
      </div>

      <!-- Actions Card -->
      <div class="dashboard-card actions">
        <div class="status-message">Waiting for action...</div>
        <div class="action-buttons">
          <button id="btnNormal" class="btn btn-normal">Send Normal</button>
          <button id="btnMonitoring" class="btn btn-monitoring">Send Monitoring</button>
          <button id="btnAlert" class="btn btn-alert">Send Alert</button>
          <button id="btnEvacuate" class="btn btn-evacuate">Send Evacuate</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Firebase + Custom JS -->
  <script type="module" src="alerthistory.js"></script>
</body>
</html>
