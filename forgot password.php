<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TubiAlert - Forgot Password</title>
  <link rel="stylesheet" href="forgot.css">
</head>
<body>
  <div class="container">
    <div class="forgot-card">
      <h2>Forgot Password</h2>
      <p>Enter your email to receive a reset link</p>

      <form id="forgotForm">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="juandelacruz@gmail.com" required>
        <button type="submit">Send Link</button>
      </form>

      <p id="message" style="color:green; display:none; margin-top:10px;"></p>
      <button id="resendBtn" style="display:none; margin-top:10px;" disabled>Resend Link (30s)</button>

      <a href="Login.php" class="back-btn">Back to Login</a>
    </div>
  </div>

  <!-- ✅ Load Firebase logic from separate JS file -->
  <script type="module" src="forgotpassword.js"></script>
</body>
</html>
