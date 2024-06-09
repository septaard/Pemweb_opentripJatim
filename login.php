<?php
session_start();

$cookieUsername = isset($_COOKIE['loggedInUsername']) ? $_COOKIE['loggedInUsername'] : '';
$cookiePassword = isset($_COOKIE['loggedInPassword']) ? $_COOKIE['loggedInPassword'] : '';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-YurioJavaTrip</title>
    <link rel="stylesheet" href="css/Logstyle.css">
</head>

<body>
    <h1>Masuk ke YurioJavaTrip</h1>
    <div class="header-background">
        <img src="https://mediaim.expedia.com/destination/1/66d99acd4458975fd20093b957605830.jpg" class="active">
        <img src="https://blog-images.reddoorz.com/uploads/image/file/6663/header-wisata-jawa-timur.jpg">
        <img
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Camping_on_Ranu_Kumbolo.jpg/1280px-Camping_on_Ranu_Kumbolo.jpg">
    </div>
    <nav>
        <ul>
            <li><a href="index.php" class="btn_home">Home</a></li>
        </ul>
    </nav>
    <div class="center">
        <form action="login-proses.php" method="post">
            <label for="username">Nama:</label>
            <input type="text" id="username" name="username" class="input"
                value="<?php echo htmlspecialchars($cookieUsername); ?>" required>

            <label for="password">Kata Sandi:</label>
            <input type="password" id="password" name="password" class="input"
                value="<?php echo htmlspecialchars($cookiePassword); ?>" required>

            <label for="remember">
                <input type="checkbox" id="remember" name="remember" <?php if ($cookieUsername && $cookiePassword) echo 'checked'; ?>> Ingat Saya
            </label>

            <input type="submit" value="Masuk" class="btn_login">
        </form>
    </div>
    <p>Belum punya akun? <a style="text-decoration: none;" href="register.php">Daftar di sini</a>.</p>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const images = document.querySelectorAll('.header-background img');
            let currentIndex = 0;
            const changeImage = () => {
                images[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].classList.add('active');
            };
            setInterval(changeImage, 5000); // Change image every 5 seconds
        });
    </script>
</body>

</html>
