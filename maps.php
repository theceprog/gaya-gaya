<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TubiAlert Maps</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="maps.css">
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <img src="tubialertlogo.png" alt="TUBIALERT Logo" class="navbar-logo" style="border-radius:50%;">
    <span class="navbar-title">TUBIALERT</span>
    <div class="navbar-links">
      <a href="dashboard.php">Dashboard</a>
      <a href="alerthistory.php">Alert History Log</a>
      <a href="emergency.php">Emergency Hotline</a>
      <a href="maps.php" class="active">Maps</a>
    </div>
    <div class="navbar-icons">
      <i class="fa fa-bell"></i>
      <a href="profile.php"><i  class="fa fa-user-circle"></i></a>
      <a href="settings.php"><i class="fa-solid fa-gear"></i></a>
    </div>
  </div>
  <!-- Status Bar -->
  <div class="status-bar">MAPS</div>

  <!-- Page Content -->
  <div class="maps-container">
    <h1 class="maps-title">Barangay Pinned Point Map</h1>

    <!-- Monitoring Station Info -->
    <div class="monitoring-station">
      <div class="station-header">
        <h2 class="station-title">Happy Valley Monitoring Station</h2>
        <p class="station-description">
          Real-time flood monitoring station located in Brgy. Gaya-Gaya, San José del Monte, Bulacan. This strategic location provides critical data for early flood warning systems.
        </p>
      </div>
      
      <div class="station-details">
        <div class="detail-row">
          <span class="detail-label">Coordinates:</span>
          <span class="detail-value coordinates">14.617°N, 121.055°E</span>
        </div>
        
        <div class="detail-row">
          <span class="detail-label">Elevation:</span>
          <span class="detail-value">45 meters</span>
        </div>
        
        <div class="detail-row">
          <span class="detail-label">Alert Level:</span>
          <span class="alert-level normal">Normal</span>
        </div>
        
        <div class="detail-row">
          <span class="detail-label">Last Update:</span>
          <span class="detail-value last-update">Aug 26, 2025 14:30</span>
        </div>
      </div>

      <div class="sensor-readings">
        <div class="sensor-grid">
          <div class="sensor-item">
            <div class="sensor-icon">
              <i class="fas fa-cloud-rain"></i>
            </div>
            <div class="sensor-label">Rainfall</div>
            <div class="sensor-value">12.5 mm</div>
          </div>
          
          <div class="sensor-item">
            <div class="sensor-icon">
              <i class="fas fa-water"></i>
            </div>
            <div class="sensor-label">Water Level</div>
            <div class="sensor-value">2.3 meters</div>
          </div>
          
          <div class="sensor-item">
            <div class="sensor-icon">
              <i class="fas fa-thermometer-half"></i>
            </div>
            <div class="sensor-label">Temperature</div>
            <div class="sensor-value">28°C</div>
          </div>
        </div>
      </div>
    </div>

    <div class="maps-row">
      <!-- Map Section -->
      <div class="map-card">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.6486513501235!2d121.05455331536004!3d14.617228980422939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7d8d1cd8a1b%3A0xf7c5cb30b2e02e49!2sGaya-Gaya%2C%20San%20Jose%20del%20Monte%2C%20Bulacan!5e0!3m2!1sen!2sph!4v1672345678901!5m2!1sen!2sph" 
          width="100%" height="400" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy">
        </iframe>
      </div>

      <!-- Info Section -->
      <div class="map-info-card">
        <h3>Happy Valley</h3>
        <p>
          Happy Valley is part of Brgy. Gaya-Gaya and is one of the main focus areas 
          for TubiAlert flood monitoring. The pinned point highlights the central 
          zone used for water level and rainfall tracking.
        </p>
        <p>
          The monitoring station provides real-time data to help predict potential flooding 
          and alert residents in advance. Data is updated every 30 minutes during normal 
          conditions and every 5 minutes during heavy rainfall events.
        </p>
      </div>
    </div>
  </div>

  <script>
    // Update timestamps and sensor readings periodically
    function updateTimestamp() {
      const now = new Date();
      const options = { 
        month: 'short', 
        day: 'numeric', 
        year: 'numeric', 
        hour: '2-digit', 
        minute: '2-digit' 
      };
      const timestamp = now.toLocaleDateString('en-US', options);
      const timestampElement = document.querySelector('.last-update');
      if (timestampElement) {
        timestampElement.textContent = timestamp;
      }
    }

    // Simulate real-time data updates (in a real app, this would fetch from an API)
    function simulateDataUpdate() {
      const rainfall = document.querySelector('.sensor-grid .sensor-item:nth-child(1) .sensor-value');
      const waterLevel = document.querySelector('.sensor-grid .sensor-item:nth-child(2) .sensor-value');
      const temperature = document.querySelector('.sensor-grid .sensor-item:nth-child(3) .sensor-value');
      
      if (rainfall && waterLevel && temperature) {
        // Simulate small variations in readings
        const currentRainfall = parseFloat(rainfall.textContent);
        const currentWater = parseFloat(waterLevel.textContent);
        const currentTemp = parseInt(temperature.textContent);
        
        const newRainfall = Math.max(0, currentRainfall + (Math.random() - 0.5) * 2);
        const newWater = Math.max(0, currentWater + (Math.random() - 0.5) * 0.2);
        const newTemp = currentTemp + Math.round((Math.random() - 0.5) * 2);
        
        rainfall.textContent = newRainfall.toFixed(1) + ' mm';
        waterLevel.textContent = newWater.toFixed(1) + ' meters';
        temperature.textContent = newTemp + '°C';
      }
      
      updateTimestamp();
    }

    // Update every 30 seconds for demo purposes
    setInterval(simulateDataUpdate, 30000);
    
    // Initial timestamp update
    updateTimestamp();
  </script>
  
</body>
</html>