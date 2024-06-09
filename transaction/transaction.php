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
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>YurioJavaTrip Admin | Transaction</title>
</head>

<body>
   <div class="sidebar">
      <div class="logo-details">
         <i class="bx bx-category"></i>
         <span class="logo_name">Yurio JavaTrip</span>
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
            <a href="transaction.php">
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
         <h3>Transaction</h3>
         <button type="button" class="btn btn-tambah" id="btnTambahData">
            Tambah Data
         </button>
         <table class="table-data">
            <thead>
               <tr>
                  <th>Nama</th>
                  <th>Destinasi</th>
                  <th>Harga</th>
                  <th>Tanggal</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>Septa</td>
                  <td>bromo-tengger-semeru</td>
                  <td>35000</td>
                  <td>24-03-2024</td>
                  <td><a href="">Edit</a> | <a href="">Hapus</a></td>
               </tr>
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


      document.getElementById('btnTambahData').addEventListener('click', function() {
         window.location.href = "transaction-entry.php";
      });
   </script>
</body>

</html>