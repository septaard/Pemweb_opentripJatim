<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    $sql = "SELECT id, username, password FROM user WHERE username = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['loggedInUsername'] = $username;

            if ($remember) {
                setcookie("loggedInUsername", $username, time() + (86400 * 30), "/");
                setcookie("loggedInPassword", $password, time() + (86400 * 30), "/");
            }

            echo "
                <script>
                    alert('Login berhasil!');
                    window.location.href = 'admin.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Nama atau kata sandi tidak valid. Silakan coba lagi.');
                    window.location.href = 'login.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Nama atau kata sandi tidak valid. Silakan coba lagi.');
                window.location.href = 'login.php';
            </script>
        ";
    }
    $stmt->close();
}
$koneksi->close();
?>
