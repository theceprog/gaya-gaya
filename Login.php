<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TubiAlert - Login</title>
  <link rel="stylesheet" href="Login.css">
</head>
<body>
  <div class="container">

    <!-- Login Card (centered left) -->
    <div class="left-side">
      <div class="login-card">
        <img src="tubialertlogo.png" alt="TubiAlert Logo" class="logo">
        <h2>TubiAlert</h2>
        <p>Login to your account</p>
        
        <form id="loginForm">
            <label>Email</label>
            <input type="text" id="email" required>

            <label>Password</label>
            <input type="password" id="password" required>

          <!-- Remember Me + Forgot -->
          <div class="form-options">
            <label class="remember">
              <input type="checkbox"> Remember Me
            </label>
            <a href="forgot password.php" class="forgot">Forgot Password?</a>
          </div>

          <!-- Login Button -->
          <button type="submit">Login</button>

        
        </form>
      </div>
    </div>

      <!-- Fixed Corner Logos -->
      <div class="corner-logos">
        <img src="barangay_logo.png" alt="Bagong Pilipinas Logo">
        <img src="pilipinas.png" alt="Bagong Pilipinas Logo">
      </div>
    </div>
  </div>
  <script type="module" src="login.js"></script>
</body>
</html>
