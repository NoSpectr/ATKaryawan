<?php
include '../koneksi.php';
$id = $_GET['id'];
if (!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'wages.php';
      </script>
    ";
}
// Data gaji berdasarkan id
$sql = "SELECT * FROM tb_gaji WHERE id_gaji = '$id'";
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
                        echo $_SESSION['username'];
                    }
                    ?>
                </span>
            </div>
        </nav>

        <!-- Isi dari halaman -->
        <div class="home-content">
            <h3>Edit Data Gaji</h3>
            <div class="form-login">
                <form action="wages-proses.php" method="POST">
                    <input type="hidden" name="id_gaji" value="<?php echo $data['id_gaji']; ?>">
                    <label for="nama">Nama Karyawan</label>
                    <input class="input" type="text" name="nama_karyawan" id="nama" value="<?php echo $data['nama_karyawan']; ?>" readonly />
                    <label for="jabatan">Jabatan</label>
                    <input class="input" type="text" name="jabatan" id="jabatan" value="<?php echo $data['jabatan']; ?>" readonly />
                    <label for="tgl_pembayaran">Tanggal Pembayaran</label>
                    <input class="input" type="date" name="tgl_pembayaran" id="tgl_pembayaran" value="<?php echo $data['tgl_pembayaran']; ?>" />
                    <label for="gaji_pokok">Gaji Pokok</label>
                    <input class="input" type="text" name="gaji_pokok" id="gaji_pokok" value="<?php echo $data['gaji_pokok']; ?>" />
                    <label for="status_pembayaran">Status Pembayaran</label>
                    <select class="input" name="status_pembayaran" id="status_pembayaran">
                        <option value="sukses" <?php if ($data['status_pembayaran'] == 'sukses') echo 'selected'; ?>>Sukses</option>
                        <option value="belum_sukses" <?php if ($data['status_pembayaran'] == 'belum_sukses') echo 'selected'; ?>>Belum Sukses</option>
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
