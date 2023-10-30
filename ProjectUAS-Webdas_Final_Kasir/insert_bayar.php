<?php 

	session_start();
	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';

	$query1 = mysqli_query($konek, "SELECT * from tb_transaksi ORDER BY id_transaksi DESC");
	$data_transaksi = mysqli_fetch_assoc($query1);
	$id_transaksi = $data_transaksi['id_transaksi'];
	$dibayar = $_POST['dibayar'];

	$query3 = mysqli_query($konek, "SELECT SUM(total_harga) AS total FROM transaksi_detail WHERE id_transaksi = '$id_transaksi'");
	$cek = mysqli_fetch_assoc($query3);
	$total = $cek['total'];
	if ($dibayar >= $total) {
		$insert = mysqli_query($konek, "INSERT INTO tb_uangmasuk VALUES ('$id_transaksi', '$dibayar')");
		header("location:input_transaksi_dan_tampilkan_bayar.php");
	}
	else {
		$_SESSION['dibayar'] = 1;
		unset($_SESSION['jumlah']);
		header("location:input_transaksi_dan_tampilkan_bayar.php");
	}

 ?>