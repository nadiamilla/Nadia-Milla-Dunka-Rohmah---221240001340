<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 15px;
        }

        th {
            background-color: #3366ff;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #3366ff;
            color: white;
            border-radius: 3px;
        }
    </style>

<?php
include 'koneksi.php';

$sql = "SELECT buku.*, kategori.* FROM buku LEFT JOIN kategori ON buku.kategori_id=kategori.kategori_id";
$result = $conn->query($sql);
echo "<a href='create.php'>Tambah Buku</a>";
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th>
    <th>Tahun Terbit</th><th>Sinopsis</th><th>Nama Kategori</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["buku_id"]."</td>";
        echo "<td>".$row["judul"]."</td>";
        echo "<td>".$row["pengarang"]."</td>";
        echo "<td>".$row["penerbit"]."</td>";
        echo "<td>".$row["tahun_terbit"]."</td>";
        echo "<td>".$row["sinopsis"]."</td>";
        echo "<td>".$row["nama_kategori"]."</td>";
        echo "<td><a href='update.php?id=".$row["buku_id"]."
        '>Edit</a> | <a href='delete.php?id=".$row["buku_id"]."'>Hapus</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data buku.";
}

$conn->close();
?>
