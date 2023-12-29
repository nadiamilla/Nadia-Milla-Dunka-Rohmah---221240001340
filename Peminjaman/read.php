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

$sql = "SELECT peminjaman.peminjaman_id, buku.judul, anggota.nama, peminjaman.tanggal_peminjaman, peminjaman.tanggal_kembali, peminjaman.status FROM `peminjaman` INNER JOIN `buku` ON peminjaman.buku_id=buku.buku_id INNER JOIN `anggota` ON peminjaman.anggota_id=anggota.anggota_id";
$result = $conn->query($sql);
echo "<a href='create.php'>Tambah Peminjaman</a>";

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Peminjaman ID</th><th>Judul Buku</th><th>Nama Anggota</th><th>Tanggal Peminjaman</th><th>Tanggal Kembali</th><th>Status</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["peminjaman_id"]."</td>";
        echo "<td>".$row["judul"]."</td>";
        echo "<td>".$row["nama"]."</td>";
        echo "<td>".$row["tanggal_peminjaman"]."</td>";
        echo "<td>".$row["tanggal_kembali"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "<td><a href='update.php?id=".$row["peminjaman_id"]."'>Edit</a> | <a href='delete.php?id=".$row["peminjaman_id"]."'>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data peminjaman.";
}

$conn->close();
?>