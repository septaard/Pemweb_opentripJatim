<?php
session_start();
if (!isset($_SESSION['loggedInUsername']) && !isset($_COOKIE['loggedInUsername'])) {
	header("Location: login.php");
	exit();
}
$loggedInUsername = isset($_SESSION['loggedInUsername']) ? $_SESSION['loggedInUsername'] : $_COOKIE['loggedInUsername'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="../assets/icon.png" />
	<link rel="stylesheet" href="../css/admin.css" />
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>YurioJavaTrip | Categories Entry</title>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
			<i class="bx bx-category"></i>
			<span class="logo_name">Yurio JavaTrip</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="../admin.php">
					<i class="bx bx-grid-alt"></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="categories.php" class="active">
					<i class="bx bx-box"></i>
					<span class="links_name">Categories</span>
				</a>
			</li>
			<li>
				<a href="../transaction/transaction.php">
					<i class="bx bx-list-ul"></i>
					<span class="links_name">Transaction</span>
				</a>
			</li>
			<li>
				<a href="../logout.php">
					<i class="bx bx-log-out"></i>
					<span class="links_name">Log out</span>
				</a>
			</li>
		</ul>
	</div>
	<section class="home-section">
		<nav>
			<div class="sidebar-button">
				<i class="bx bx-menu sidebarBtn"></i>
			</div>
			<div class="profile-details">
				<span class="admin_name">
					<?php echo $loggedInUsername; ?>
				</span>
		</nav>
		<div class="home-content">
			<h3>Input Categories</h3>
			<div class="form-login">
				<form action="categories-proses.php" method="POST" enctype="multipart/form-data">
					<label for="destinasi">Destinasi</label>
					<input class="input" type="text" name="destinasi" id="destinasi" placeholder="Destinasi" required />
					<label for="deskripsi">Deskripsi</label>
					<textarea class="input" name="deskripsi" id="deskripsi" rows="4" placeholder="Deskripsi" required></textarea>
					<label for="harga">Harga</label>
					<input class="input" type="text" name="harga" id="harga" placeholder="Harga" required />
					<label for="photo">Gambar</label>
					<input type="file" name="photo" id="photo" required />
					<button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
				</form>
			</div>
		</div>
	</section>
	<script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function() {
			sidebar.classList.toggle("active");
			if (sidebar.classList.contains("active")) {
				sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
			} else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		};
	</script>
</body>

</html>