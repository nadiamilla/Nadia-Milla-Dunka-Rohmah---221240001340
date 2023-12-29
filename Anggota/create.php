<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

$sql = "INSERT INTO anggota ( nama, alamat, email, telepon) VALUES ('$nama',
    '$alamat', '$email', '$telepon')";

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
    Nama: <input type="text" name="nama"><br>
    Alamat: <input type="text" name="alamat"><br>
    Email: <input type="text" name="email"><br>
    Telepon: <input type="text" name="telepon"><br>
    <input type="submit" value="Tambah">
</form>