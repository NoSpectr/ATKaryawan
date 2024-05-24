<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit();
}
include 'koneksi.php';
// Menghitung jumlah data di tb_karyawan
$sql_karyawan = "SELECT COUNT(*) as total_karyawan FROM tb_karyawan";
$result_karyawan = $koneksi->query($sql_karyawan);
$total_karyawan = $result_karyawan->fetch_assoc()['total_karyawan'];
// Menghitung jumlah data di tb_gaji
$sql_gaji = "SELECT COUNT(*) as total_gaji FROM tb_gaji";
$result_gaji = $koneksi->query($sql_gaji);
$total_gaji = $result_gaji->fetch_assoc()['total_gaji'];
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
      <div class="widget">
        <div class="widget-box">
          <img src="assets/image/employee.png" alt="Icon 1" style="max-width: 10%;">
          <h4>Total Data Karyawan</h4>
          <p><?php echo $total_karyawan; ?></p>
        </div>
        <div class="widget-box">
          <img src="assets/image/wages.png" alt="Icon 2 " style="max-width: 10%;">
          <h4>Total Data Gaji</h4>
          <p><?php echo $total_gaji; ?></p>
        </div>
      </div>

      <style>
        .widget {
          display: flex;
          margin: 20px 0;
          padding: 10px;
          border-radius: 8px;
        }

        .widget-box {
          margin: 0 10px;
          padding: 20px;
          background-color: #fff;
          border: 1px solid #ddd;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          text-align: center;
        }

        .widget-box p {
          font-size: 1.2em;
          color: #666;
          margin: 10px 0 0;
        }
      </style>
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