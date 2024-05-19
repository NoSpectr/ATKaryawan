<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if (empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'register.php';
            </script>
        ";
    } elseif ($password !== $confirmPassword) {
        echo "
            <script>
                alert('Password dan Konfirmasi Password tidak cocok');
                window.location = 'register.php';
            </script>
        ";
    } else {
        // Cek apakah username sudah terdaftar
        $usernameCheckSql = "SELECT * FROM tb_admin WHERE username = ?";
        $stmt = $koneksi->prepare($usernameCheckSql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Username sudah terdaftar
            echo "
                <script>
                    alert('Username sudah terdaftar. Silahkan gunakan username yang lain!');
                    window.location = 'register.php';
                </script>
            ";
        } else {
            // Username tersedia, lakukan registrasi
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO tb_admin (email, password, username) VALUES (?, ?, ?)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("sss", $email, $hashedPassword, $username);

            if ($stmt->execute()) {
                echo "
                    <script>
                        alert('Registrasi Berhasil. Silahkan login');
                        window.location = 'login.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Terjadi Kesalahan');
                        window.location = 'register.php';
                    </script>
                ";
            }
        }

        $stmt->close();
    }
}

$koneksi->close();
