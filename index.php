<?php
session_start();
include 'koneksi.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy(); // Hapus semua data sesi
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan Anda */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #003399;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #003399;
            color: black;
        }

        .logout {
            float: right;
            padding: 14px 16px;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php">Beranda</a>
    <a href="buku/read.php">Daftar Buku</a>
    <a href="anggota/read.php">Daftar Anggota</a>
    <a href="peminjaman/read.php">Peminjaman</a>
    <a href="kategori/read.php">Kategori</a>
    <a href="?logout" class="logout">Logout</a>
</nav>

<?php
include 'dasboard.php';
?>
</body>
</html>
