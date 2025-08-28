<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password - TubiAlert</title>
  <link rel="stylesheet" href="reset.css">
</head>
<body>
  <div class="container">
    <div class="reset-card">
      <h2>Forgot Password</h2>
      <p>Enter a New Password.</p>

      <form id="resetForm">
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" placeholder="Enter New Password" required>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" placeholder="Re-type your Password" required>

        <button type="submit">Confirm</button>
      </form>
    </div>
  </div>
    <script type="module" src="reset.js"></script>
</body>
</html>
