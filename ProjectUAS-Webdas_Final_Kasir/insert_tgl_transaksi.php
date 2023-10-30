<?php 

	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
	session_start();
	$username = $_SESSION['username'];

	$query = mysqli_query($konek, 
		"SELECT * FROM tb_user 
		WHERE username = '$username'");
	$data = mysqli_fetch_assoc($query);
	$id_user = $data['id_user'];

	$tgl = $_POST['tgl_transaksi'];

	$data = mysqli_query($konek, "INSERT INTO tb_transaksi VALUES ('', '$tgl', '$id_user')");
	header("location:input_transaksi_dan_tampilkan_bayar.php");
	
 ?>