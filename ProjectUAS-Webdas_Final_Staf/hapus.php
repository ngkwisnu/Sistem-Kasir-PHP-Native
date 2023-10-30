<?php 

	//koneksi ke database
	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';

	//menangkap data id yang dikirim dari url
	$kode = $_GET['kode_barang'];

	//menghapus data dari database
	mysqli_query($konek, "delete from tb_barang where kode_barang = '$kode'");

	//mengalihkan halaman kembali ke index.php
	header("location:LIst_barang.php");


 ?>