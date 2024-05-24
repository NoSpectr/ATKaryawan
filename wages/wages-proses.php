<?php
include '../koneksi.php';

// Proses tambah data gaji
if (isset($_POST['simpan'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $tgl_pembayaran = $_POST['tgl_pembayaran'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $status_pembayaran = $_POST['status_pembayaran'];

    // Validasi apakah semua input telah diisi
    if (empty($id_karyawan) || empty($tgl_pembayaran) || empty($gaji_pokok) || empty($status_pembayaran)) {
        echo "<script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'wages-entri.php';
              </script>";
        return;
    }

    // Fetch nama_karyawan dan jabatan dari tb_karyawan
    $sql_karyawan = "SELECT nama_karyawan, jabatan FROM tb_karyawan WHERE id_karyawan = ?";
    $stmt_karyawan = mysqli_prepare($koneksi, $sql_karyawan);
    mysqli_stmt_bind_param($stmt_karyawan, 'i', $id_karyawan);
    mysqli_stmt_execute($stmt_karyawan);
    mysqli_stmt_bind_result($stmt_karyawan, $nama_karyawan, $jabatan);
    mysqli_stmt_fetch($stmt_karyawan);
    mysqli_stmt_close($stmt_karyawan);

    // Insert data ke tb_gaji
    $sql = "INSERT INTO tb_gaji (id_karyawan, nama_karyawan, jabatan, tgl_pembayaran, gaji_pokok, status_pembayaran) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'isssss', $id_karyawan, $nama_karyawan, $jabatan, $tgl_pembayaran, $gaji_pokok, $status_pembayaran);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data Gaji Berhasil Ditambahkan');
                window.location = 'wages.php';
              </script>";
    } else {
        echo "<script>
                alert('Terjadi Kesalahan');
                window.location = 'wages-entri.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
}

// Proses edit data gaji
elseif (isset($_POST['edit'])) {
    $id_gaji = $_POST['id_gaji'];
    $id_karyawan = $_POST['id_karyawan']; // Tambahkan baris ini untuk mendapatkan ID karyawan yang baru
    $tgl_pembayaran = $_POST['tgl_pembayaran'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $status_pembayaran = $_POST['status_pembayaran'];

    // Validasi apakah semua input telah diisi
    if (empty($id_gaji) || empty($id_karyawan) || empty($tgl_pembayaran) || empty($gaji_pokok) || empty($status_pembayaran)) {
        echo "<script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'wages-entri.php';
              </script>";
        return;
    }

    // Ambil nama karyawan dan jabatan baru dari tabel karyawan
    $sql_karyawan = "SELECT nama_karyawan, jabatan FROM tb_karyawan WHERE id_karyawan = ?";
    $stmt_karyawan = mysqli_prepare($koneksi, $sql_karyawan);
    mysqli_stmt_bind_param($stmt_karyawan, 'i', $id_karyawan);
    mysqli_stmt_execute($stmt_karyawan);
    mysqli_stmt_bind_result($stmt_karyawan, $nama_karyawan, $jabatan);
    mysqli_stmt_fetch($stmt_karyawan);
    mysqli_stmt_close($stmt_karyawan);

    // Update data di tb_gaji
    $sql = "UPDATE tb_gaji SET id_karyawan = ?, nama_karyawan = ?, jabatan = ?, tgl_pembayaran = ?, gaji_pokok = ?, status_pembayaran = ? WHERE id_gaji = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'isssssi', $id_karyawan, $nama_karyawan, $jabatan, $tgl_pembayaran, $gaji_pokok, $status_pembayaran, $id_gaji);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data Gaji Berhasil Diperbarui');
                window.location = 'wages.php';
              </script>";
    } else {
        echo "<script>
                alert('Terjadi Kesalahan');
                window.location = 'wages-entri.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
}
// Proses hapus data gaji
elseif (isset($_GET['hapus']) && isset($_GET['id_gaji'])) {
    $id_gaji = $_GET['id_gaji'];

    // Validasi apakah id_gaji telah diisi
    if (empty($id_gaji)) {
        echo "<script>
                alert('Pilih Data Gaji yang Ingin Dihapus');
                window.location = 'wages.php';
              </script>";
        return;
    }

    // Delete data dari tb_gaji
    $sql = "DELETE FROM tb_gaji WHERE id_gaji = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id_gaji);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data Gaji Berhasil Dihapus');
                window.location = 'wages.php';
              </script>";
    } else {
        echo "<script>
                alert('Terjadi Kesalahan');
                window.location = 'wages.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
} else {
    header('location: wages-entri.php');
    exit;
}
