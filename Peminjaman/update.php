<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM peminjaman WHERE peminjaman_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <form action="update_process.php" method="POST">
        Buku ID: <input type="text" name="buku_id" value="<?php echo $row['buku_id']; ?>"><br>
        Anggota ID: <input type="text" name="anggota_id" value="<?php echo $row['anggota_id'];
        ?>"><br>
        Tanggal Peminjaman: <input type="date" name="tanggal_peminjaman" value="<?php echo $row['tanggal_peminjaman']; ?>"><br>
        Tanggal Pengembalian: <input type="date" name="tanggal_kembali" value="<?php echo
    $row['tanggal_kembali']; ?>"><br>
    Status:
    <select name="status">
        <option value="dipinjam">Dipinjam</option>
        <option value="kembali">Kembali</option>
    </select><br>
        <input type="hidden" name="id" value="<?php echo $row['peminjaman_id']; ?>">
        <input type="submit" value="Update">
    </form>
<?php
} else {
    echo "Data tidak ditemukan.";
}

$conn->close();

?>