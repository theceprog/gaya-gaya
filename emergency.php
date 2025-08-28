<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TubiAlert Emergency Hotlines</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="emergency.css">
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <img src="tubialertlogo.png" alt="TUBIALERT Logo" class="navbar-logo" style="border-radius:50%;">
    <span class="navbar-title">TUBIALERT</span>
    <div class="navbar-links">
      <a href="dashboard.php">Dashboard</a>
      <a href="alerthistory.php">Alert History Log</a>
      <a href="emergency.php" class="active">Emergency Hotline</a>
      <a href="maps.php" >Maps</a>
    </div>
    <div class="navbar-icons">
      <i class="fa fa-bell"></i>
      <a href="profile.php"><i  class="fa fa-user-circle"></i></a>
      <a href="settings.php"><i class="fa-solid fa-gear"></i></a>
    </div>
  </div>

  <!-- Status Bar -->
  <div class="status-bar">EMERGENCY HOTLINES</div>

  <!-- Main Container -->
  <div class="dashboard-container">
    <h1 class="dashboard-title">Barangay Emergency Hotlines</h1>

    <div class="dashboard-row">
      <!-- Hotline Info -->
      <div class="dashboard-card hotline-info">
        <p>
          This section contains the important contact numbers of the barangay and other agencies for the residents of Brgy. Gaya-Gaya, especially those in the Happy Valley area. Its purpose is to make it quick and easy for everyone to reach officials and emergency services, especially during floods, disasters, or urgent situations.
        </p>
        <p>
          In case of flooding, medical emergencies, or other urgent situations, please use the contact numbers below:
        </p>

        <div class="hotlines-box">
          <h3>Emergency Hotlines</h3>

          <div class="hotline-entry">
            <h4>Ambulance (Brgy.)</h4>
            <div class="hotline-number">
              <i class="fa-solid fa-phone"></i>
              <a href="tel:09488602256">0948-860-2256</a>
            </div>
            <div class="hotline-number">
              <i class="fa-solid fa-phone"></i>
              <a href="tel:09851803158">0985-180-3158</a>
            </div>
          </div>

          <div class="hotline-entry">
            <h4>New Hotline - Main</h4>
            <div class="hotline-number">
              <i class="fa-solid fa-phone"></i>
              <a href="tel:09633504051">0963-350-4051</a>
            </div>
          </div>

          <div class="hotline-entry">
            <h4>New Hotline - Annex</h4>
            <div class="hotline-number">
              <i class="fa-solid fa-phone"></i>
              <a href="tel:09463177391">0946-317-7391</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column Image -->
      <div class="dashboard-card hotline-image">
        <img src="barangay-main.jpg" alt="Pamahalaang Brgy. Gaya-Gaya Building" style="width:100%; border-radius:12px;">
      </div>
    </div>
  </div>

</body>
</html>
