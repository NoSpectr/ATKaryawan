<?php
session_start();
// Cek apakah user sudah login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $validUsername = "admin";
  $validPasswordHash = password_hash("1", PASSWORD_DEFAULT); // Hash password
  if (empty($username) || empty($password)) { // Memeriksa apakah form sudah diisi
    echo "<script>alert('Isi semua data terlebih dahulu.');</script>";
  } elseif ($username === $validUsername && password_verify($password, $validPasswordHash)) { // Memeriksa apakah username dan password cocok
    // Jika cocok, set session dan cookie
    $_SESSION['username'] = $username;
    setcookie('username', $username, time() + (86400 * 30), '/');
    echo "<script>alert('Login berhasil!'); window.location.href = 'admin.php';</script>";
    exit();
  } else {
    echo "<script>alert('Username atau password salah.'); window.location.href = 'login.php';</script>";
    exit();
  }
}
?>
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
    <form class="login-form" method="POST">
      <h2>Login</h2>
      <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
      <?php } ?>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>
      <button type="submit">Login</button>
      <p>Don't you have an account? <a href="register.html">Register</a></p>
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