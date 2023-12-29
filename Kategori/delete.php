<?php
include 'koneksi.php';

// Validate and sanitize input
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sql = "DELETE FROM kategori WHERE kategori_id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php"); // Redirect to the Read page after successful deletion
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Redirect back to read.php if the ID is not valid
    header("Location: read.php");
    exit;
}

$conn->close();
?>
