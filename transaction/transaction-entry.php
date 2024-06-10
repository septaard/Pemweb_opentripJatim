<?php
session_start();
if (!isset($_SESSION['loggedInUsername']) && !isset($_COOKIE['loggedInUsername'])) {
    header("Location: login.php");
    exit();
}
$loggedInUsername = isset($_SESSION['loggedInUsername']) ? $_SESSION['loggedInUsername'] : $_COOKIE['loggedInUsername'];
?>
<!DOCTYPE html>
<html lang="en">	
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="../css/admin.css" />
   <link
	href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>YurioJavaTrip Admin | Transaction Entry</title>
</head>
<body>
   <div class="sidebar">
	<div class="logo-details">
	   <i class="bx bx-category"></i>
	   <span class="logo_name">YurioJavaTrip</span>
	</div>
	<ul class="nav-links">
	   <li>
		<a href="../admin.php" class="active">
		   <i class="bx bx-grid-alt"></i>
		   <span class="links_name">Dashboard</span>
		</a>
	   </li>
	   <li>
		<a href="../categories/categories.php">
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
	   <h3>Input Transaction</h3>
	   <div class="form-login">
		<form action="">
		   <label for="nama">Nama</label>
		   <input class="input" type="text" name="nama"
				id="nama" placeholder="Nama" />
		   <label for="jenis">Jenis</label>
		   <input class="input" type="text" name="Destinasi Wisata"
				id="jenis" placeholder="Destinasi Wisata" />
		   <label for="harga">Harga</label>
		   <input class="input" type="text" name="harga"
				id="harga" placeholder="Harga" />
		   <label for="tgl">Tanggal</label>
		   <input class="input" type="date" name="tgl"
				id="tgl" style="margin-bottom: 20px" />
		   <button type="submit" class="btn btn-simpan" 
                        name="simpan">
			      Simpan
		   </button>
		</form>
	   </div>
	</div>
   </section>
   <script>
	let sidebar = document.querySelector(".sidebar");
	let sidebarBtn = document.querySelector(".sidebarBtn");
	sidebarBtn.onclick = function () {
		sidebar.classList.toggle("active");
	 	  if (sidebar.classList.contains("active")) {
			sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
		  } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		};
   </script>
</body>
</html>
