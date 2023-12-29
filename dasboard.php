<?php 
include 'koneksi.php';


$query_buku = "SELECT COUNT(*) AS total_buku FROM buku";
$query_kategori = "SELECT COUNT(*) AS total_kategori FROM kategori";
$query_peminjaman ="SELECT COUNT(*) AS total_peminjaman FROM peminjaman";
$query_members = "SELECT COUNT(*) AS total_members FROM anggota";


$result_buku = $conn->query($query_buku);
$result_kategori = $conn->query($query_kategori);
$result_peminjaman = $conn->query($query_peminjaman);
$result_members = $conn->query($query_members);

$row_buku = $result_buku->fetch_assoc();
$row_kategori = $result_kategori->fetch_assoc();
$row_peminjaman = $result_peminjaman->fetch_assoc();
$row_members = $result_members->fetch_assoc();


$conn->close();
?>



 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 15px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>Jumlah Buku</th>
        <th>Jumlah Kategori</th>
        <th>Jumlah Peminjaman</th>
        <th>Jumlah Anggota</th>
    </tr>
    <tr>
        <td><?php echo $row_buku['total_buku']; ?></td>
        <td><?php echo $row_kategori['total_kategori']; ?></td>
        <td><?php echo $row_peminjaman['total_peminjaman']; ?></td>
        <td><?php echo $row_members['total_members']; ?></td>
    </tr>
</table>

</body>
</html>
