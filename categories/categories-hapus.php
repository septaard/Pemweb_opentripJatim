<?php
include '../koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE id_categories = $id";
$result = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
} else {
    header('Location: categories.php');
    exit;
}
$gambar = $data['gambar'];
$path_gambar = '../img_categories/' . $gambar;
if (file_exists($path_gambar)) {
    unlink($path_gambar);
}
$sql_delete = "DELETE FROM categories WHERE id_categories = $id";
if (mysqli_query($koneksi, $sql_delete)) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href = 'categories.php';
        </script>
    ";
    exit;
} else {
    echo "
        <script>
            alert('Gagal menghapus data');
            window.location.href = 'categories.php';
        </script>
    ";
}
?>