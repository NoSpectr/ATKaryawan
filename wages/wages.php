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
      <h3>Wages</h3>
      <button type="button" class="btn btn-tambah">
        <a href="wages-entri.php">Tambah Data</a>
      </button>
      <table class="table-data">
        <thead>
          <tr>
            <th style="width: 15%">Nama Karyawan</th>
            <th>Jabatan</th>
            <th style="width: 20%">Tanggal Pembayaran</th>
            <th style="width: 20%">Gaji Pokok</th>
            <th style="width: 20%">Nomor Rekening Bank</th>
            <th style="width: 10%">Status Pembayaran</th>
            <th style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Yuliana</td>
            <td>Karyawan</td>
            <td>17-03-2023</td>
            <td>Rp. 2.500.000</td>
            <td>0055-0112-8798-1245</td>
            <td>Sukses</td>
            <td>
              <button type="button" class="btn btn-edit">
                <a href="#">Edit</a>
              </button>
              <button type="button" class="btn btn-delete" onclick="hapusData()">
                <a href="#">Hapus</a>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
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

    //pupop boxes pada konfirmasi tombol hapus
    function hapusData() {
      let konfirmasi = confirm(
        "Apakah Anda yakin ingin menghapus data karyawan ini?"
      );
      if (konfirmasi == true) {
        // Tempatkan kode penghapusan data di sini
        console.log("Data berhasil dihapus."); // contoh: hanya mencetak pesan ke konsol
      } else {
        console.log("Penghapusan data dibatalkan."); // contoh: hanya mencetak pesan ke konsol
      }
    }
  </script>
</body>

</html>