<!-- PHP -->
	<?php 
	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
	session_start();
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	mysqli_query($konek, "INSERT INTO kategori_barang VALUES('$id', '$nama')");
	header("location:tambahkategori.php");
?>