<?php
session_start();
if ($_SESSION['username'] == null) {
  header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../assets/image/vas.png" />
  <link rel="stylesheet" href="../css/employee.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/387774990c.js" crossorigin="anonymous"></script>
  <title>ATKaryawan</title>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="../assets/image/vas.png" alt="" width="30" />
      <span class="logo_name">ATKaryawan</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="../admin.php">
          <i class="fa-solid fa-border-all"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="../employee/employee.php" class="active">
          <i class="fa-solid fa-users"></i>
          <span class="links_name">Karyawan</span>
        </a>
      </li>
      <li>
        <a href="../wages/wages.php">
          <i class="fa-solid fa-sack-dollar"></i>
          <span class="links_name">Gaji</span>
        </a>
      </li>
      <li>
        <a href="../logout.php">
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

    <!-- Isi dari halaman -->
    <div class="home-content">
      <h3>Input Data Karyawan</h3>
      <div class="form-login">
        <form action="employee-proses.php" method="POST" enctype="multipart/form-data">
          <label for="photo">Upload Foto Karyawan</label>
          <input type="file" name="photo" id="photo" style="margin-bottom: 20px" /><br />

          <label for="name">Nama Lengkap</label>
          <input class="input" type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap Karyawan" />

          <label for="jabatan">Pilih Jabatan</label>
          <select class="input" name="jabatan" id="jabatan">
            <option value="Karyawan">Karyawan</option>
            <option value="Kasir">Kasir</option>
            <option value="Staff Gudang">Staff Gudang</option>
            <option value="Kebersihan">Kebersihan</option>
          </select>

          <label for="jk">Pilih Jenis Kelamin</label>
          <select class="input" name="jenis_kelamin" id="jk">
            <option value="Laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
          </select>

          <label for="noTelp">Nomor Telepon</label>
          <input class="input" type="text" name="noTelp" id="noTelp" placeholder="Masukkan Nomor Telepon Karyawan" />

          <label for="alamat">Alamat</label>
          <input class="input" type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat Karyawan" />

          <label for="ttl">Tempat Tanggal Lahir</label>
          <input class="input" type="text" name="ttl" id="ttl" placeholder="Masukkan Tempat Tanggal Lahir, contoh: Jakarta, 01 Januari 1990" />

          <label for="status_karyawan">Pilih Status Karyawan</label>
          <select class="input" name="status_karyawan" id="status">
            <option value="Karyawan Tetap">Karyawan Tetap</option>
            <option value="Karyawan Kontrak">Karyawan Kontrak</option>
            <option value="Karyawan Magang">Karyawan Magang</option>
          </select>

          <button type="submit" class="btn btn-simpan" name="simpan">Simpan Data</button>
        </form>
      </div>
    </div>
    <!-- end -->

  </section>
  <script>
    //Sidebar
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