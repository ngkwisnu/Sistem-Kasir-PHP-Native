<?php 

	//koneksi ke database
	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';

	//menangkap data id yang dikirim dari url
	$id = $_GET['id_transaksi'];

	//menghapus data dari database
	mysqli_query($konek, "delete from tb_transaksi where id_transaksi = '$id'");

	//mengalihkan halaman kembali ke index.php
	header("location:admin.php");


 ?>