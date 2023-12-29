<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $peminjaman_id = $_POST['peminjaman_id'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];
    $status_pengembalian = $_POST['status_pengembalian'];

    // Check if the connection is established
    if ($conn) {
        // Perbaiki query
        $sql = "UPDATE pengembalian SET peminjaman_id = '$peminjaman_id', 
        tanggal_pengembalian = '$tanggal_pengembalian', denda = '$denda', 
        status_pengembalian = '$status_pengembalian' WHERE pengembalian_id = '$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: read.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Connection failed.";
    }
}
?>
