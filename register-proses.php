<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    if (empty($username) || empty($password) || empty($email) || empty($no_telp)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'register.php';
            </script>
        ";
    } else {
        $checkUsernameQuery = "SELECT * FROM user WHERE username = ?";
        $stmt = $koneksi->prepare($checkUsernameQuery);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "
                <script>
                    alert('Username sudah ada di database. Silakan coba lagi.');
                    window.location = 'register.php';
                </script>
            ";
            $stmt->close();
            exit();
        }
        $checkEmailQuery = "SELECT * FROM user WHERE email = ?";
        $stmt = $koneksi->prepare($checkEmailQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "
                <script>
                    alert('Email sudah ada di database. Silakan coba lagi.');
                    window.location = 'register.php';
                </script>
            ";
            $stmt->close();
            exit();
        }
        $checkPhoneQuery = "SELECT * FROM user WHERE no_telp = ?";
        $stmt = $koneksi->prepare($checkPhoneQuery);
        $stmt->bind_param("s", $no_telp);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "
                <script>
                    alert('Nomor telepon sudah ada di database. Silakan coba lagi.');
                    window.location = 'register.php';
                </script>
            ";
            $stmt->close();
            exit();
        }
        $stmt = $koneksi->prepare("INSERT INTO user (username, password, email, no_telp) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $email, $no_telp);
        if ($stmt->execute()) {
            echo "
                <script>
                    alert('Registrasi Berhasil Silahkan login');
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
        $stmt->close();
    }
    $koneksi->close();
}
