<?php
include '../koneksi.php';

function upload()
{
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // apakah tidak ada gambar yang diunggah
    if ($error === 4) {
        echo "
            <script>
                alert('Gambar harus diunggah');
                window.location = 'employee-entri.php';
            </script>
        ";
        return false;
    }

    // apakah yang diunggah bukan gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('File harus berupa gambar');
                window.location = 'employee-entri.php';
            </script>
        ";
        return false;
    }

    // jika lolos pengecekan, gambar siap diunggah
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    if (move_uploaded_file($tmpName, '../img_employee/' . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        echo "
            <script>
                alert('Gagal mengunggah gambar');
                window.location = 'employee-entri.php';
            </script>
        ";
        return false;
    }
}
// menyimpan data yang dikirim dari form
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $noTelp = $_POST['noTelp'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $status = $_POST['status_karyawan'];

    if (empty($name) || empty($jabatan) || empty($jenis_kelamin) || empty($noTelp) || empty($alamat) || empty($ttl) || empty($status)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'employee-entri.php';
            </script>
        ";
        return;
    }
    // upload foto
    $photo = upload();
    if (!$photo) {
        return;
    }
    // menyimpan data ke database
    $sql = "INSERT INTO tb_karyawan (photo, nama_karyawan, jabatan, jk, no_telp, alamat, ttl, status_karyawan) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssss', $photo, $name, $jabatan, $jenis_kelamin, $noTelp, $alamat, $ttl, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo "
            <script>
                alert('Data Karyawan Berhasil Ditambahkan');
                window.location = 'employee.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'employee-entri.php';
            </script>
        ";
    }

    mysqli_stmt_close($stmt);
} elseif (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id_karyawan'])) { // hapus data karyawan
    $id_karyawan = $_GET['id_karyawan'];
    // menghapus data karyawan dari database
    $sql_delete = "DELETE FROM tb_karyawan WHERE id_karyawan = ?";
    // menghapus file foto dari server 
    $sql_select_photo = "SELECT photo FROM tb_karyawan WHERE id_karyawan = ?";
    $stmt_select_photo = mysqli_prepare($koneksi, $sql_select_photo);
    mysqli_stmt_bind_param($stmt_select_photo, 'i', $id_karyawan);
    mysqli_stmt_execute($stmt_select_photo);
    mysqli_stmt_store_result($stmt_select_photo);
    // cek apakah ada foto yang dihapus
    if (mysqli_stmt_num_rows($stmt_select_photo) > 0) {
        mysqli_stmt_bind_result($stmt_select_photo, $photo);
        mysqli_stmt_fetch($stmt_select_photo);
        // Hapus file foto dari server
        $photo_path = "../img_employee/" . $photo;
        if (file_exists($photo_path)) {
            unlink($photo_path);
        }
    }

    // Hapus data karyawan dari database
    $stmt_delete = mysqli_prepare($koneksi, $sql_delete);
    mysqli_stmt_bind_param($stmt_delete, 'i', $id_karyawan);
    mysqli_stmt_execute($stmt_delete);

    // jika data berhasil dihapus, kembalikan ke halaman employee.php
    header('location: employee.php');
    exit;
} elseif (isset($_POST['edit'])) { // edit data karyawan
    $id_karyawan = $_POST['id'];
    $name = $_POST['name'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $noTelp = $_POST['noTelp'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $status = $_POST['status_karyawan'];

    // Periksa apakah ada file foto baru yang diunggah
    if (!empty($_FILES['photo']['name'])) {
        // Jika ada, upload foto baru
        $photo = upload();
        if (!$photo) {
            // Jika gagal mengunggah, kembalikan ke halaman edit
            header("Location: employee-edit.php?id=$id_karyawan");
            exit;
        }
        // Jika berhasil, perbarui kolom photo dalam database
        $sql = "UPDATE tb_karyawan SET photo = ?, nama_karyawan = ?, jabatan = ?, jk = ?, no_telp = ?, alamat = ?, ttl = ?, status_karyawan = ? WHERE id_karyawan = ?";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssssi", $photo, $name, $jabatan, $jenis_kelamin, $noTelp, $alamat, $ttl, $status, $id_karyawan);
    } else {
        // Jika tidak ada file foto baru, pertahankan foto yang sudah ada
        $sql = "UPDATE tb_karyawan SET nama_karyawan = ?, jabatan = ?, jk = ?, no_telp = ?, alamat = ?, ttl = ?, status_karyawan = ? WHERE id_karyawan = ?";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssi", $name, $jabatan, $jenis_kelamin, $noTelp, $alamat, $ttl, $status, $id_karyawan);
    }
    mysqli_stmt_execute($stmt);
    // cek apakah data berhasil diubah
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "
            <script>
                alert('Data Karyawan Berhasil Diubah');
                window.location = 'employee.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal mengubah data karyawan');
                window.location = 'employee-edit.php?id=$id_karyawan';
            </script>
        ";
    }

    mysqli_stmt_close($stmt);
} else {
    header('location: employee.php');
    exit;
}
