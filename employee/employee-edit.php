<?php
include '../koneksi.php';
$id = $_GET['id'];
if (!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'employee.php';
      </script>
    ";
}
//data karyawan berdasarkan id
$sql = "SELECT * FROM tb_karyawan WHERE id_karyawan = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

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
            <h3>Edit Data Karyawan</h3>
            <div class="form-login">
                <form action="employee-proses.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id_karyawan']; ?>">
                    <label for="photo">Upload Foto Karyawan</label>
                    <input type="file" name="photo" id="photo" style="margin-bottom: 20px" /><br />
                    <img src="../img_employee/<?php echo $data['photo']; ?>" alt="Foto Karyawan" width="100" /><br />
                    <label for="name">Nama Lengkap</label>
                    <input class="input" type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap Karyawan" value="<?php echo $data['nama_karyawan']; ?>" />
                    <label for="jabatan">Pilih Jabatan</label>
                    <select class="input" name="jabatan" id="jabatan">
                        <option value="Karyawan" <?php if ($data['jabatan'] == 'Karyawan') echo 'selected'; ?>>Karyawan</option>
                        <option value="Kasir" <?php if ($data['jabatan'] == 'Kasir') echo 'selected'; ?>>Kasir</option>
                        <option value="Staff Gudang" <?php if ($data['jabatan'] == 'Staff Gudang') echo 'selected'; ?>>Staff Gudang</option>
                        <option value="Kebersihan" <?php if ($data['jabatan'] == 'Kebersihan') echo 'selected'; ?>>Kebersihan</option>
                    </select>
                    <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                    <select class="input" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="Laki-laki" <?php if ($data['jk'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                    <label for="noTelp">Nomor Telepon</label>
                    <input class="input" type="text" name="noTelp" id="noTelp" placeholder="Masukkan Nomor Telepon Karyawan" value="<?php echo $data['no_telp']; ?>" />
                    <label for="alamat">Alamat</label>
                    <input class="input" type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat Karyawan" value="<?php echo $data['alamat']; ?>" />
                    <label for="ttl">Tempat Tanggal Lahir</label>
                    <input class="input" type="text" name="ttl" id="ttl" placeholder="Masukkan Tempat Tanggal Lahir, contoh: Jakarta, 01 Januari 1990" value="<?php echo $data['ttl']; ?>" />
                    <label for="status_karyawan">Pilih Status Karyawan</label>
                    <select class="input" name="status_karyawan" id="status_karyawan">
                        <option value="Karyawan Tetap" <?php if ($data['status_karyawan'] == 'Karyawan Tetap') echo 'selected'; ?>>Karyawan Tetap</option>
                        <option value="Karyawan Kontrak" <?php if ($data['status_karyawan'] == 'Karyawan Kontrak') echo 'selected'; ?>>Karyawan Kontrak</option>
                        <option value="Karyawan Magang" <?php if ($data['status_karyawan'] == 'Karyawan Magang') echo 'selected'; ?>>Karyawan Magang</option>
                    </select>
                    <button type="submit" class="btn btn-simpan" name="edit">Simpan Perubahan</button>
                </form>
            </div>
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