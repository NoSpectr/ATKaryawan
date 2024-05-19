<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
    $requestUsername = $_POST['username'];
    $requestPassword = $_POST['password'];

    $sql = "SELECT id, email, password, username FROM tb_admin WHERE username = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $requestUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($requestPassword, $row['password'])) {
            session_start();
            $_SESSION['username'] = $row['username'];
            header('Location: admin.php');
            exit();
        } else {
            echo "
            <script>
                alert('Username atau password anda salah, Silahkan coba lagi');
                window.location = 'login.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Username atau password anda salah, Silahkan coba lagi');
            window.location = 'login.php';
        </script>
        ";
    }

    $stmt->close();
}

$koneksi->close();
?>
