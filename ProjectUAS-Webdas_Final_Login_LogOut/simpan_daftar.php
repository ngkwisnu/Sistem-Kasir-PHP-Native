<?php 
	include 'database.php';
	session_start();
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tlpn = $_POST['tlpn'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	mysqli_query($konek, "INSERT INTO tb_user VALUES ('', '$nama', '$username', '$password', '$role', '$tlpn', '$alamat')");
	unset($_SESSION['login']);
	header("location:login.php");
?>