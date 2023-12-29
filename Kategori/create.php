<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kategori = $_POST['nama_kategori'];
    

    // Modify your SQL query to include the 'tanggal_pengembalian' column
    $sql = "INSERT INTO Kategori (nama_kategori)
            VALUES ('$nama_kategori')";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<form action="create.php" method="POST">
    Nama Kategori: <input type="text" name="nama_kategori"><br>
     <input type="submit" value="Tambah">
</form>
