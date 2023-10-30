<?php 

session_start();
include 'database.php';

$username = $_POST['username'];
$password = $_POST['password'];
$data = mysqli_query($konek, 
		"SELECT role_user FROM tb_user 
		WHERE username = '$username' AND password_user = '$password'");
$cek = mysqli_fetch_assoc($data);
$role = $cek['role_user'];

$data = mysqli_query($konek, 
		"SELECT * FROM tb_user 
		WHERE username = '$username' AND password_user = '$password' AND role_user = '$role'");
$cek = mysqli_num_rows($data);

	if ($cek > 0) {
		$_SESSION['username'] = $username;
		$_SESSION['login'] = $status;
		header("location:login.php?login=berhasil");
		if ($role == "kasir") {
			header("location:../ProjectUAS-Webdas_Final_Kasir/kasir_page.php");
		}
		else {
			if ($role == "staf_gudang") {
				header("location:../ProjectUAS-Webdas_Final_Staf/LIst_barang.php");
			}
			else if($role == "admin") {
				header("location:../ProjectUAS-Webdas_Final_Admin/admin.php");
			}
		}
	} 
	else {
		header("location:login.php");
		$_SESSION['login'] = 1;
	}



 ?>