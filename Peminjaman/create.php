<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buku_id = $_POST['buku_id'];
    $anggota_id = $_POST['anggota_id'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    // Modify your SQL query to include the 'tanggal_pengembalian' column
    $sql = "INSERT INTO Peminjaman (buku_id, anggota_id, tanggal_peminjaman, tanggal_kembali, status)
            VALUES ('$buku_id', '$anggota_id', '$tanggal_peminjaman', '$tanggal_kembali', '$status')";

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
    Buku ID: <input type="text" name="buku_id"><br>
    Anggota ID: <input type="text" name="anggota_id"><br>
    Tanggal Peminjaman: <input type="date" name="tanggal_peminjaman"><br>
    Tanggal Pengembalian: <input type="date" name="tanggal_kembali"><br>
    Status:
    <select name="status">
        <option value="dipinjam">Dipinjam</option>
        <option value="kembali">Kembali</option>
    </select><br>
    <input type="submit" value="Tambah">
</form>
