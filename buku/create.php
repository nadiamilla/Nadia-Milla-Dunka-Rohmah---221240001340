<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 	$judul = $_POST['judul'];
 	$pengarang = $_POST['pengarang'];
 	$penerbit = $_POST['penerbit'];
 	$tahun_terbit = $_POST['tahun_terbit'];
 	$sinopsis = $_POST['sinopsis'];
 	$kategori_id = $_POST['kategori_id'];


 	$sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, sinopsis, kategori_id) 
 	VALUES ('$judul','$pengarang', '$penerbit', '$tahun_terbit''$sinopsis','$kategori_id',)";
 
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
 	Judul: <input type="text" name="judul"><br>
 	Pengarang: <input type="text" name="pengarang"><br>
 	Penerbit: <input type="text" name="penerbit"><br>
	Tahun Terbit: <input type="text" name="tahun_terbit"><br>
	Sinopsis: <input type="text" name="sinopsis"><br>
	ID Kategori: <input type="text" name="kategori_id"><br>
 	<input type="submit" value="Tambah">
</form>
