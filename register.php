<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - YurioJavaTrip</title>
    <link rel="stylesheet" type="text/css" href="css/Logstyle.css">
</head>

<body>
    <h1>Daftar di YurioJavaTrip</h1>
    <div class="header-background">
        <img src="https://mediaim.expedia.com/destination/1/66d99acd4458975fd20093b957605830.jpg" class="active">
        <img src="https://blog-images.reddoorz.com/uploads/image/file/6663/header-wisata-jawa-timur.jpg">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Camping_on_Ranu_Kumbolo.jpg/1280px-Camping_on_Ranu_Kumbolo.jpg">
    </div>
    <nav>
        <ul>
            <li><a href="index.php" class="btn_home">Home</a></li>
        </ul>
    </nav>
    <div class="center">
        <form action="register-proses.php" method="post">

            <label for="username">Nama Lengkap:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Kata Sandi:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="no_telp">No. Telp:</label><br>
            <input type="text" id="no_telp" name="no_telp" required><br><br>

            <input type="submit" name="register" value="Daftar">
        </form>
    </div>
    <p>Sudah punya akun? <a style="text-decoration: none;" href="login.php">Masuk di sini</a>.</p>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
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