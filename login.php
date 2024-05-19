<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ATKaryawan</title>
  <link rel="stylesheet" href="css/login.css" />
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

  <!-- Form Login -->
  <div class="container">
    <form class="login-form" action="login-proses.php" method="post">
      <h2>Login</h2>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
      </div>
      <button type="submit" name="login">Login</button>
      <p>Don't you have an account? <a href="register.php" style="color:green">Register</a></p>
    </form>
  </div>
  <!-- End Form Login -->

  <!-- Footer -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2024 Copyright ATKaryawan.
  </div>
  <!-- End Footer -->
</body>

</html>