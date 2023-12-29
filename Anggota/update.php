<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM Anggota WHERE anggota_id = $id"; // Corrected query
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();

    if ($row) {
        ?>
        <form action="update_process.php" method="POST">
            Nama Anggota: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
            Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br>
            Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
            Telepon: <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>"><br>
            <input type="hidden" name="id" value="<?php echo $row['anggota_id']; ?>">
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
