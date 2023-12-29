<?php
include 'koneksi.php';

// Validate and sanitize input
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sql = "DELETE FROM buku WHERE anggota_id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php"); 
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    
    header("Location: read.php");
    exit;
}

$conn->close();
?>
