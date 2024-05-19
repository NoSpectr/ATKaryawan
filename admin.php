<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="assets/image/vas.png" />
  <link rel="stylesheet" href="css/admin.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/387774990c.js" crossorigin="anonymous"></script>
  <title>ATKaryawan</title>
</head>

<body onload="displayDate()">
  <!-- sidebar -->
  <div class="sidebar">
    <div class="logo-details">
      <img src="assets/image/vas.png" alt="" width="30" />
      <span class="logo_name">ATKaryawan</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="admin.php" class="active">
          <i class="fa-solid fa-border-all"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="employee/employee.php">
          <i class="fa-solid fa-users"></i>
          <span class="links_name">Karyawan</span>
        </a>
      </li>
      <li>
        <a href="wages/wages.php">
          <i class="fa-solid fa-sack-dollar"></i>
          <span class="links_name">Gaji</span>
        </a>
      </li>
      <li>
        <a href="logout.php">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <!-- navigation -->
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
      </div>
      <div class="profile-details">
        <span class="admin_name">
          <?php
          if (isset($_SESSION['username'])) {
            echo $_SESSION['username'];
          }
          ?>
        </span>
      </div>
    </nav>
    <!-- dashboard -->
    <div class="home-content">
      <h2 id="text">
        <?php
        if (isset($_SESSION['username'])) {
          echo 'Selamat Datang, ' . $_SESSION['username'] . '!';
        } else {
          echo 'Selamat Datang!';
        }
        ?>
      </h2>
      <h3 id="date"></h3>
    </div>
  </section>

  <script>
    function displayDate() {
      const months = ["Januari", "Februari", "Maret", "April", "Mei",
        "Juni", "Juli", "Agustus", "September",
        "Oktober", "November", "Desember"
      ];
      const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis",
        "Jumat", "Sabtu"
      ];
      let date = new Date();
      let tanggal = date.getDate();
      let hari = days[date.getDay()];
      let bulan = months[date.getMonth()];
      let tahun = date.getFullYear();
      document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}`;
    }

    // Sidebar onclick
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
  </script>
</body>

</html>