<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TubiAlert Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <img src="tubialertlogo.png" alt="TUBIALERT Logo" class="navbar-logo" style="border-radius:50%;">
    <div class="navbar-title">TUBIALERT</div>
    <div class="navbar-links">
      <a href="dashboard.php" class="active">Dashboard</a>
      <a href="alerthistory.php">Alert History Log</a>
      <a href="emergency.php">Emergency Hotline</a>
      <a href="maps.php">Maps</a>
    </div>

  <div class="navbar-icons">
      <i class="fa fa-bell"></i>
      <a href="profile.php"><i  class="fa fa-user-circle"></i></a>
      <a href="settings.php"><i class="fa-solid fa-gear"></i></a>
    </div>
</div>

  </div>

  <!-- Status Bar -->
  <div class="status-bar" id="status">SAFE</div>

  <!-- Dashboard Container -->
  <div class="dashboard-container">
    <h2 class="dashboard-title">Welcome to TubiAlert Flood Monitoring!</h2>
    <div class="dashboard-row">
      
      <!-- Water Level -->
      <div class="dashboard-card">
        <h3>Water Level</h3>
        <div class="value" id="waterLevel">--%</div>
        <div class="icon"><i class="fas fa-water"></i></div>
      </div>

      <!-- Rain Intensity -->
      <div class="dashboard-card">
        <h3>Rain Intensity</h3>
        <div class="value" id="rainIntensity">-- mm/hr</div>
        <div class="icon"><i class="fas fa-cloud-rain"></i></div>
      </div>

      <!-- Temperature -->
      <div class="dashboard-card">
        <h3>Temperature</h3>
        <div class="value" id="temperature">--°</div>
        <div class="icon"><i class="fas fa-temperature-high"></i></div>
      </div>

      <!-- Weather -->
      <div class="weather-section">
        <div class="weather-time" id="weatherTime">As of --:--</div>
        <div class="weather-icon"><i class="fas fa-cloud-sun"></i></div>
        <div class="weather-desc" id="weatherDesc">Loading...</div>
      </div>
    </div>

    <!-- Legend -->
    <div class="legend">
      <span><span class="dot safe"></span>SAFE</span>
      <span><span class="dot monitor"></span>MONITOR</span>
      <span><span class="dot alert"></span>ALERT</span>
      <span><span class="dot evacuate"></span>EVACUATE</span>
    </div>
  </div>

  <!-- JS -->
  <script type="module" src="dashboard.js"></script>
</body>
</html>
