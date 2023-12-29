<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM kategori WHERE kategori_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <form action="update_process.php" method="POST">
        ID Kategori: <input type="text" name="kategori_id" value="<?php echo $row['kategori_id']; ?>"><br>
        Nama Kategori: <input type="text" name="nama_kategori" value="<?php echo $row['nama_kategori']; ?>"><br>
        <input type="hidden" name="id" value="<?php echo $row['kategori_id']; ?>">
        <input type="submit" value="Update">
    </form>
<?php
} else {
    echo "Data tidak ditemukan.";
}

$conn->close();
?>
