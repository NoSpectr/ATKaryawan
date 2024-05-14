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
          <span class="links_name">Employee</span>
        </a>
      </li>
      <li>
        <a href="../wages/wages.php">
          <i class="fa-solid fa-sack-dollar"></i>
          <span class="links_name">Wages</span>
        </a>
      </li>
      <li>
        <a href="/index.php">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span class="links_name">Logout</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
      </div>
      <div class="profile-details">
        <span class="admin_name">ATK Admin</span>
      </div>
    </nav>

    <!-- Isi dari halaman -->
    <div class="home-content">
      <h3>Input Employee</h3>
      <div class="form-login">
        <form action="">
          <label for="photo">Upload Your Photo</label>
          <input type="file" name="photo" id="photo" style="margin-bottom: 20px" />
          <br />
          <label for="employee">Nama Karyawan</label>
          <input class="input" type="text" name="name" id="name" placeholder="Input Nama Karyawan" />
          <label for="jabatan">Jabatan</label>
          <select class="input" name="jabatan" id="jabatan">
            <option value="karyawan">Karyawan</option>
            <option value="kasir">Kasir</option>
            <option value="staff_gudang">Staff Gudang</option>
            <option value="kebersihan">Kebersihan</option>
          </select>
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <select class="input" name="jenis_kelamin" id="jenis_kelamin">
            <option value="laki_laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
          </select>
          <label for="employee">No Telepon</label>
          <input class="input" type="text" name="noTelp" id="noTelp" placeholder="Input No Telepon" />
          <label for="employee">Alamat</label>
          <input class="input" type="text" name="alamat" id="alamat" placeholder="Input Alamat" />
          <label for="employee">Tempat Tanggal Lahir</label>
          <input class="input" type="text" name="ttl" id="ttl" placeholder="Input Tempat Tanggal Lahir" />
          <label for="status">Status Karyawan</label>
          <select class="input" name="status" id="status">
            <option value="karyawan_tetap">Karyawan Tetap</option>
            <option value="karyawan_kontrak">Karyawan Kontrak</option>
            <option value="karyawan_magang">Karyawan Magang</option>
          </select>
          <button type="submit" class="btn btn-simpan" name="simpan">
            Simpan
          </button>
        </form>
      </div>
    </div>
  </section>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
  </script>
</body>

</html>