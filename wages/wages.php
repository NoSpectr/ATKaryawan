<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit;
}

include '../koneksi.php';

$sql = "SELECT * FROM tb_gaji";
$result = mysqli_query($koneksi, $sql);
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
            <h3>Data Gaji</h3>
            <button type="button" class="btn btn-tambah" onclick="window.location.href='wages-entri.php'">Tambah Data</button>
            <a href="wages-cetak.php"><button type="button" class="btn cetak-pdf">Cetak PDF</button></a>
            <table class="table-data">
                <thead>
                    <tr>
                        <th style="width: 15%">Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th style="width: 20%">Tanggal Pembayaran</th>
                        <th style="width: 20%">Gaji Pokok</th>
                        <th style="width: 20%">Status Pembayaran</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Perulangan untuk menampilkan data gaji karyawan
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['nama_karyawan']); ?></td>
                                <td><?php echo htmlspecialchars($row['jabatan']); ?></td>
                                <td><?php echo htmlspecialchars($row['tgl_pembayaran']); ?></td>
                                <td><?php echo htmlspecialchars($row['gaji_pokok']); ?></td>
                                <td><?php echo htmlspecialchars($row['status_pembayaran']); ?></td>
                                <td>
                                    <button type="button" class="btn btn-edit">
                                        <a href="wages-edit.php?id=<?php echo $row['id_gaji']; ?>">Edit</a>
                                    </button>
                                    <button type="button" class="btn btn-delete">
                                        <a href="wages-proses.php?hapus&id_gaji=<?php echo $row['id_gaji']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data gaji ini?')">Hapus</a>
                                    </button>

                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
                    }
                    $koneksi->close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
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