<?php
include './koneksi.php';

if (isset($_GET['id'])) {  // Use 'id' instead of 'id_categories' as per your JavaScript request
    $categoryId = $_GET['id'];

    $sql = "SELECT destinasi AS categories, harga AS price FROM categories WHERE id_categories = $categoryId";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Failed to retrieve category data.']);
    }
} else {
    echo json_encode(['error' => 'Category ID not provided.']);
}
?>
