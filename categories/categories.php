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
	<title>YurioJavaTrip | Categories</title>
	<style>
		.btn-edit {
			color: blue;
			padding: 5px 10px;
			margin-right: 5px;
			cursor: pointer;
		}

		.btn-delete {
			color: red;
			padding: 5px 10px;
			margin-right: 5px;
			cursor: pointer;
		}
	</style>
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
			</div>
		</nav>
		<div class="home-content">
			<h3>Categories</h3>
			<button type="button" class="btn btn-tambah">
				<a href="categories-entry.php">Tambah Data</a>
			</button>
			<table class="table-data">
				<thead>
					<tr>
						<th>Destinasi</th>
						<th>Description</th>
						<th>Price</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include '../koneksi.php';
					if (!$koneksi) {
						die("Koneksi database gagal: " . mysqli_connect_error());
					}
					$sql = "SELECT * FROM categories";
					$result = mysqli_query($koneksi, $sql);
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
                        <tr>
                            <td>{$data['destinasi']}</td>
                            <td>{$data['deskripsi']}</td>
                            <td>{$data['harga']}</td>
                            <td><img src='../img_categories/{$data['gambar']}' alt='{$data['destinasi']}' style='width: 100px; height: auto;'></td>
                            <td>
                                <button class='btn-edit' onclick='editCategory({$data['id_categories']})'>Edit</button>
                                <button class='btn-delete' onclick='deleteCategory({$data['id_categories']})'>Hapus</button>
                            </td>
                        </tr>
                        ";
					}
					?>
				</tbody>
			</table>
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

		function editCategory(id) {
			window.location.href = `categories-edit.php?id=${id}`;
		}

		function deleteCategory(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				window.location.href = `categories-hapus.php?id=${id}`;
			}
		}
	</script>
</body>

</html>