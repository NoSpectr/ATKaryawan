<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../login.php');
  exit;
}

include '../koneksi.php';

// Ambil data dari tabel tb_karyawan
$sql = "SELECT id_karyawan, nama_karyawan, jabatan FROM tb_karyawan";
$result = mysqli_query($koneksi, $sql);
$karyawan_data = [];
while ($row = mysqli_fetch_assoc($result)) {
  $karyawan_data[] = $row;
}
?>
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
          <span class="links_name">Karyawan</span>
        </a>
      </li>
      <li>
        <a href="../wages/wages.php" class="active">
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
            echo htmlspecialchars($_SESSION['username']);
          }
          ?>
        </span>
      </div>
    </nav>
    <!-- Isi dari page -->
    <div class="home-content">
      <h3>Input Data Gaji</h3>
      <div class="form-login">
        <form action="wages-proses.php" method="POST">
          <label for="nama">Nama Karyawan</label>
          <select class="input" name="id_karyawan" id="id_karyawan" onchange="updateJabatan()">
            <option value="">Pilih Nama Karyawan</option>
            <?php foreach ($karyawan_data as $karyawan) { ?>
              <option value="<?php echo $karyawan['id_karyawan']; ?>" data-jabatan="<?php echo htmlspecialchars($karyawan['jabatan']); ?>">
                <?php echo htmlspecialchars($karyawan['nama_karyawan']); ?>
              </option>
            <?php } ?>
          </select>

          <label for="jabatan">Jabatan</label>
          <input class="input" type="text" name="jabatan" id="jabatan" placeholder="Jabatan" readonly />

          <label for="tgl">Tanggal Pembayaran</label>
          <input class="input" type="date" name="tgl_pembayaran" id="tgl" style="margin-bottom: 20px" />

          <label for="gapok">Gaji Pokok</label>
          <input class="input" type="text" name="gaji_pokok" id="gapok" placeholder="Input Gaji Pokok" />

          <label for="status">Status Pembayaran</label>
          <select class="input" name="status_pembayaran" id="status">
            <option value="Sukses">Sukses</option>
            <option value="Proses">Proses</option>
          </select>
          <button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
        </form>
      </div>
    </div>
  </section>

  <script>
    function updateJabatan() {
      const namaSelect = document.getElementById('id_karyawan');
      const jabatanInput = document.getElementById('jabatan');
      const selectedOption = namaSelect.options[namaSelect.selectedIndex];
      const jabatan = selectedOption.getAttribute('data-jabatan');
      jabatanInput.value = jabatan ? jabatan : '';
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };

    function hapusData() {
      let konfirmasi = confirm(
        "Apakah Anda yakin ingin menghapus data karyawan ini?"
      );
      if (konfirmasi == true) {
        console.log("Data berhasil dihapus.");
      } else {
        console.log("Penghapusan data dibatalkan.");
      }
    }
  </script>
</body>

</html>