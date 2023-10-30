<?php 

	//koneksi ke database
	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';

	//menangkap data id yang dikirim dari url
	$id = $_GET['id_kategori'];

	//menghapus data dari database
	mysqli_query($konek, "delete from kategori_barang where id_kategori = '$id'");

	//mengalihkan halaman kembali ke index.php
	header("location:tambahkategori.php");


 ?>