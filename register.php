<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ATKaryawan</title>
  <link rel="stylesheet" href="css/register.css" />
  <link rel="icon" href="assets/image/vas.png" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <a href="index.php"><img src="assets/image/icon.png" alt="Logo" /></a>
    </div>
    <div class="menu-toggle">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
    </ul>
  </nav>
  <!-- End Navbar -->

  <!-- Form Register -->
  <form class="register-form" action="register-proses.php" method="post">
    <h2>Register</h2>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required />
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required />
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required />
    </div>
    <div class="form-group">
      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required />
    </div>
    <button type="submit" name="register">Register</button>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </form>
  <!-- End Form Register -->

  <!-- Footer -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2024 Copyright ATKaryawan.
  </div>
  <!-- End Footer -->
</body>
<script>
  document
    .querySelector(".menu-toggle")
    .addEventListener("click", function() {
      document.querySelector(".nav-links").classList.toggle("nav-active");
    });
</script>

</html>