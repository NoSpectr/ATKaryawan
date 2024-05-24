<?php
session_start();
if ($_SESSION['username'] == null) {
  header('location:../login.php');
}
include '../koneksi.php';
$sql = "SELECT * FROM tb_karyawan";
$result = mysqli_query($koneksi, $sql);
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
      <h3>Data Karyawan</h3>
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
            <th scope="col" style="width: 10%">Alamat</th>
            <th scope="col" style="width: 20%">TTL</th>
            <th scope="col" style="width: 10%">Status Karyawan</th>
            <th scope="col" style="width: 30%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Perulangan untuk menampilkan data karyawan
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><img src="../img_employee/<?php echo $row['photo']; ?>" width="80pt" alt="" /></td>
              <td><?php echo $row['nama_karyawan']; ?></td>
              <td><?php echo $row['jabatan']; ?></td>
              <td><?php echo $row['jk']; ?></td>
              <td><?php echo $row['no_telp']; ?></td>
              <td><?php echo $row['alamat']; ?></td>
              <td><?php echo $row['ttl']; ?></td>
              <td><?php echo $row['status_karyawan']; ?></td>
              <td>
                <button type="button" class="btn btn-edit">
                  <a href="employee-edit.php?id=<?php echo $row['id_karyawan']; ?>">Edit</a>
                </button>
                <button type="button" class="btn btn-delete">
                  <a href="employee-proses.php?action=delete&id_karyawan=<?php echo $row['id_karyawan']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data karyawan ini?')">Hapus</a>
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
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