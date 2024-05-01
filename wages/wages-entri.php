<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../assets/image/vas.png" />
  <link rel="stylesheet" href="../css/wages.css" />
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
        <a href="../employee/employee.php">
          <i class="fa-solid fa-users"></i>
          <span class="links_name">Employee</span>
        </a>
      </li>
      <li>
        <a href="../wages/wages.php" class="active">
          <i class="fa-solid fa-sack-dollar"></i>
          <span class="links_name">Wages</span>
        </a>
      </li>
      <li>
        <a href="../index.php">
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
    <!-- Isi dari page -->
    <div class="home-content">
      <h3>Input Wages</h3>
      <div class="form-login">
        <form action="">
          <label for="nama">Nama Karyawan</label>
          <input class="input" type="text" name="nama" id="nama" placeholder="Input Nama Karyawan" />
          <label for="jabatan">Jabatan</label>
          <select class="input" name="jabatan" id="jabatan">
            <option value="karyawan">Karyawan</option>
            <option value="kasir">Kasir</option>
            <option value="staff_gudang">Staff Gudang</option>
            <option value="kebersihan">Kebersihan</option>
          </select>
          <label for="tgl">Tanggal Pembayaran</label>
          <input class="input" type="date" name="tgl" id="tgl" style="margin-bottom: 20px" />
          <label for="harga">Gaji Pokok</label>
          <input class="input" type="text" name="gapok" id="gapok" placeholder="Input Gaji Pokok" />
          <label for="harga">Nomor Rekening Bank</label>
          <input class="input" type="text" name="norek" id="norek" placeholder="Input Nomor Rekening Bank" />
          <label for="status">Status Pembayaran</label>
          <select class="input" name="status" id="status">
            <option value="sukses">Sukses</option>
            <option value="belum_sukses">Belum Sukses</option>
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