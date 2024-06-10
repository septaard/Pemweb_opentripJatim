<?php
include '../koneksi.php';

// Check if all required data is available
if (isset($_POST['simpan'])) {
    $kategori = $_POST['detail-kategori'];
    $harga = $_POST['detail-harga'];
    $nama = $_POST['detail-nama'];
    $nomor = $_POST['detail-nomor'];
    $alamat = $_POST['detail-alamat'];
    $tanggal = date('Y-m-d');
    $status = 'success'; // Set transaction status

    // SQL query to insert data into the transaction table
    $sql = "INSERT INTO tb_transaction (kategori, nama, alamat, harga, tanggal, nomor) VALUES ('$kategori', '$nama', '$alamat', '$harga', '$status', '$tanggal', '$nomor')";

    // Execute the query and handle the result
    if (empty($nama) || empty($harga) || empty($nomor) || empty($alamat) || empty($kategori)) {
        echo "`
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = '../index.php';
            </script>
        ";
    } elseif (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Transaksi Berhasil');
                window.location = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = '../index.php';
            </script>
        ";
    }
} else {
    header('location: ../index.php');
}

mysqli_close($koneksi);
?>
