<?php
include '../koneksi.php';

function upload()
{
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];
    if ($error === 4) {
        echo "
            <script>
                alert('Gambar harus diisi');
                window.location = 'categories-entry.php';
            </script>
        ";
        return false;
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('File harus berupa gambar (JPG, JPEG, PNG, GIF)');
                window.location = 'categories-entry.php';
            </script>
        ";
        return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    $targetFile = '../img_categories/' . $namaFileBaru;
    if (move_uploaded_file($tmpName, $targetFile)) {
        return $namaFileBaru;
    } else {
        echo "
            <script>
                alert('Maaf, terjadi kesalahan saat mengupload file.');
                window.location = 'categories-entry.php';
            </script>
        ";
        return false;
    }
}
if (isset($_POST['simpan'])) {
    $destinasi = $_POST['destinasi'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = upload();

    if (!$gambar) {
        exit;
    }
    $sql = "INSERT INTO categories (gambar, destinasi, harga, deskripsi) 
            VALUES ('$gambar', '$destinasi', '$harga', '$deskripsi')";
    if (empty($destinasi) || empty($harga) || empty($deskripsi)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'categories-entry.php';
            </script>
        ";
    } elseif (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Categories Berhasil Ditambahkan');
                window.location = 'categories.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'categories-entry.php';
            </script>
        ";
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $destinasi = $_POST['destinasi'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    if ($_FILES['photo']['name']) {
        $fileName = $_FILES['photo']['name'];
        $fileTmpName = $_FILES['photo']['tmp_name'];
        $fileSize = $_FILES['photo']['size'];
        $fileError = $_FILES['photo']['error'];
        $fileType = $_FILES['photo']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../img_categories/' . $fileNameNew;
                    $sql = "SELECT gambar FROM categories WHERE id_categories = $id";
                    $result = mysqli_query($koneksi, $sql);
                    $data = mysqli_fetch_assoc($result);
                    unlink('../img_categories/' . $data['gambar']);
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "UPDATE categories SET destinasi='$destinasi', deskripsi='$deskripsi', harga='$harga', gambar='$fileNameNew' WHERE id_categories=$id";
                } else {
                    echo "
                        <script>
                            alert('File gambar terlalu besar!');
                            window.location = 'categories-edit.php?id=$id';
                        </script>
                    ";
                    exit;
                }
            } else {
                echo "
                    <script>
                        alert('Terjadi kesalahan saat mengupload file!');
                        window.location = 'categories-edit.php?id=$id';
                    </script>
                ";
                exit;
            }
        } else {
            echo "
                <script>
                    alert('Anda tidak dapat mengupload file jenis ini!');
                    window.location = 'categories-edit.php?id=$id';
                </script>
            ";
            exit;
        }
    } else {
        $sql = "UPDATE categories SET destinasi='$destinasi', deskripsi='$deskripsi', harga='$harga' WHERE id_categories=$id";
    }
    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Categories Berhasil Diedit');
                window.location = 'categories.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi kesalahan saat mengedit data!');
                window.location = 'categories-edit.php?id=$id';
            </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM categories WHERE id_categories = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $gambar = $row['gambar'];
    unlink('../img_categories/' . $gambar);
    $sql = "DELETE FROM categories WHERE id_categories = $id";
    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Categories Berhasil Dihapus');
                window.location = 'categories.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Categories Gagal Dihapus');
                window.location = 'categories.php';
            </script>
        ";
    }
} else {
    header('location: categories.php');
}
