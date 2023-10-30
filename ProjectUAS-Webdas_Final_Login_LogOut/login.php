<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Anton&family=DM+Serif+Display&family=Fredoka+One&family=Kanit:wght@500&family=Rowdies:wght@700&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			background-color: whitesmoke;
		}
		.container {
			justify-content: center;
		}
		.kotak {
		    width: 500px;
		    height: 400px;
		    background-color: white;
		    float: left;
		    margin-left: 59px;
		    margin-top: 100px;
		    border-width: 1px;
		    box-shadow: 6px 4px 30px rgb(0 0 0 / 40%);
		    border-top-left-radius: 10px;
		    border-bottom-left-radius: 10px;
		}
		.kotak2 {
		    width: 500px;
		    height: 430px;
		    background-color: white;
		    float: left;
		    margin-left: 59px;
		    margin-top: 100px;
		    border-width: 1px;
		    box-shadow: 6px 4px 30px rgb(0 0 0 / 40%);
		    border-top-left-radius: 10px;
		    border-bottom-left-radius: 10px;
		}
		.daftar {
			width: 500px;
		    height: 400px;
		    position: absolute;
		    top: 100px;
		    right: 182px;
		    border-width: 1px;
		    box-shadow: 6px 4px 30px rgb(0 0 0 / 40%);
		    border-top-right-radius: 10px;
		    border-bottom-right-radius: 10px;
		}
		.daftar2 {
			width: 500px;
		    height: 430px;
		    position: absolute;
		    top: 100px;
		    right: 182px;
		    border-width: 1px;
		    box-shadow: 6px 4px 30px rgb(0 0 0 / 40%);
		    border-top-right-radius: 10px;
		    border-bottom-right-radius: 10px;
		}
		.login {
			padding-top: 10px;
			padding-bottom: 30px;
			text-align: center;
			font-size: 40px;
		}
		.mb-3 {
			outline-color: blue;
			margin-right: 30px;
			margin-left: 30px;
			margin-bottom: 50px;
			padding-bottom: 10px;
		}
		.btn {
			margin-left: 30px;
		}
	</style>
</head>
<body>
	<?php include 'database.php'; session_start(); ?>
	<?php if (isset($_SESSION['login'])): ?>
		<div class="container">
			<div class="kotak2">
				<form action="cek_login.php" method="POST" class="form-floating">
					<h2 class="login text-primary" style="font-family: 'Rowdies'; margin-top: 10px;">Login!</h2>
					<div class="container-xl">
						<div class="mb-3">
						    <input type="text" name="username" class="form-control is-invalid" id="username" placeholder="Username" autocomplete="off" required>
						    <label for="username"><i style="font-size: 13px;">Mohon Periksa Kembali Username!</i></label>
						</div>
						<div class="mb-3">
						    <input type="password" name="password" class="form-control is-invalid" id="username" placeholder="Password" autocomplete="off" required>
						    <label for="password"><i style="font-size: 13px;">Mohon Periksa Kembali Password!</i></label>
						</div>
						<button type="submit" class="btn btn btn-primary" style="width: 415px;">Masuk</button>
					</div>
				</form>
			</div>
			<div class="daftar2 bg bg-success">
				<h1 style="font-family: 'Rowdies'; font-size: 50px; color: white; text-align: center; margin-top: 50px; margin-bottom: 20px;">Belum Punya Akun?</h1>
				<p style="color: white; text-align: center;">Segera daftarkan diri anda menjadi bagian dari kami!</p>
				<a href="daftar.php"><button class="btn btn-warning" style="width: 200px; margin-top: 20px; margin-left: 145px; border-radius: 20px; color: white;">Daftar</button></a>
			</div>
		</div>
	<?php else: ?>
		<div class="container">
			<div class="kotak">
				<form action="cek_login.php" method="POST">
					<h2 class="login text-primary" style="font-family: 'Rowdies'; margin-top: 10px;">Login!</h2>
					<div class="container-xl">
						<div class="mb-3">
						    <input type="text" name="username" class="form-control" id="username" placeholder="Username" autocomplete="off" required>
						</div>
						<div class="mb-3">
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off" required>
						</div>
						<button type="submit" class="btn btn btn-primary" style="width: 415px;">Masuk</button>
					</div>
				</form>
			</div>
			<div class="daftar bg bg-success">
				<h1 style="font-family: 'Rowdies'; font-size: 50px; color: white; text-align: center; margin-top: 50px; margin-bottom: 20px;">Belum Punya Akun?</h1>
				<p style="color: white; text-align: center;">Segera daftarkan diri anda menjadi bagian dari kami!</p>
				<a href="daftar.php"><button class="btn btn-warning" style="width: 200px; margin-top: 20px; margin-left: 145px; border-radius: 20px; color: white;">Daftar</button></a>
			</div>
		</div>
	<?php endif; ?>
</body>
</html>