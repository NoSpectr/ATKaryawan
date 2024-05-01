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

    <!-- Isi dari halaman -->
    <div class="home-content">
      <h3>Employee</h3>
      <button type="button" class="btn btn-tambah">
        <a href="employee-entri.php">Tambah Data</a>
      </button>
      <table class="table-data">
        <thead>
          <tr>
            <th scope="col" style="width: 5%">Photo</th>
            <th>Nama Karyawan</th>
            <th scope="col" style="width: 10%">Jabatan</th>
            <th scope="col" style="width: 5%">Jenis Kelamin</th>
            <th scope="col" style="width: 10%">No Telepon</th>
            <th scope="col" style="width: 20%">Alamat</th>
            <th scope="col" style="width: 20%">TTL</th>
            <th scope="col" style="width: 10%">Status Karyawan</th>
            <th scope="col" style="width: 30%">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="../assets/photo/kar1.jpg" width="80pt" alt="" /></td>
            <td>Yuliana</td>
            <td>Karyawan</td>
            <td>Perempuan</td>
            <td>08456123789</td>
            <td>Jl. Bunga</td>
            <td>Malang, 7 September 1990</td>
            <td>Kontrak</td>
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
    //Sidebar
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
        // penghapusan data
        console.log("Data berhasil dihapus.");
      } else {
        console.log("Penghapusan data dibatalkan.");
      }
    }
  </script>
</body>

</html>