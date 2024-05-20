<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - YurioJavaTrip</title>
    <link rel="stylesheet" type="text/css" href="css/Logstyle.css">
</head>
<body>
    <h1>Daftar di YurioJavaTrip</h1>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $user_data = "$name,$email,$password\n";

            if (file_put_contents('users.txt', $user_data, FILE_APPEND)) {
                echo '<script>alert("Registrasi berhasil! Silakan login."); window.location.href="login.php";</script>';
            } else {
                echo '<script>alert("Registrasi gagal. Silakan coba lagi.");</script>';
            }
        }
    ?>
    <form method="POST" action="">
        <label for="name">Nama Lengkap:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Kata Sandi:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Daftar">
    </form>
    <p>Sudah punya akun? <a style="text-decoration: none;" href="login.php">Masuk di sini</a>.</p>
</body>
</html>
