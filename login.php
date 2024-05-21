<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    $users = file('users.txt');
    $isLoginSuccessful = false;

    foreach ($users as $user) {
        list($name, $email, $hashedPassword) = explode(',', trim($user));

        if ($username === $name && password_verify($password, $hashedPassword)) {
            $_SESSION['loggedInUsername'] = $username;

            if ($remember) {
                setcookie("loggedInUsername", $username, time() + (86400 * 30), "/");
                setcookie("loggedInPassword", $_POST['password'], time() + (86400 * 30), "/"); 
            }
            echo '<script>alert("Login berhasil!"); window.location.href="admin.php";</script>';
            exit();
        }
    }
    echo '<script>alert("Nama atau kata sandi tidak valid. Silakan coba lagi.");</script>';
}

$cookieUsername = isset($_COOKIE['loggedInUsername']) ? $_COOKIE['loggedInUsername'] : '';
$cookiePassword = isset($_COOKIE['loggedInPassword']) ? $_COOKIE['loggedInPassword'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke YurioJavaTrip</title>
    <link rel="stylesheet" href="css/Logstyle.css">
</head>
<body>
    <h1>Masuk ke YurioJavaTrip</h1>
    <?php
    if ($cookieUsername && $cookiePassword) {
        echo '<p>Data login Anda telah disimpan. Silakan login.</p>';
    }
    ?>
    <form method="POST" action="">
        <label for="username">Nama:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($cookieUsername); ?>" required>

        <label for="password">Kata Sandi:</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($cookiePassword); ?>" required>

        <label for="remember">
            <input type="checkbox" id="remember" name="remember" <?php if ($cookieUsername && $cookiePassword) echo 'checked'; ?>> Ingat Saya
        </label>

        <input type="submit" value="Masuk">
    </form>
    <p>Belum punya akun? <a style="text-decoration: none;" href="register.php">Daftar di sini</a>.</p>
</body>
</html>
