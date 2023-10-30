<?php 

	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
	$kode = $_POST['kode'];
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$stok = $_POST['jumlah'];

	mysqli_query($konek, "INSERT INTO tb_barang VALUES('$kode','$id' ,'$nama' ,'$harga', '$stok')");

	header("location:tambahbarang.php");

 ?>