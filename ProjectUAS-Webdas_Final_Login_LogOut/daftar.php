<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Anton&family=DM+Serif+Display&family=Fredoka+One&family=Kanit:wght@500&family=Rowdies:wght@700&display=swap" rel="stylesheet">
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Anton&family=DM+Serif+Display&family=Fredoka+One&display=swap');
		body {
			background-color: lightgrey;
		}
		.salam {
			background-color: green;
			width: 300px;
			height: 548px;
			float: left;
			margin-left: 135px;
			border-top-left-radius: 10px;
		    border-bottom-left-radius: 10px;
		    box-shadow: -3px 3px 6px rgb(0 0 0 / 60%);
		    padding: 20px;
		    margin-top: 15px;
		}
		.kotak {
			padding: 20px;
			padding-bottom: 50px;
			width: 800px;
			margin-left: 435px;
		    background: white;
		    border-top-right-radius: 10px;
		    border-bottom-right-radius: 10px;
		    box-shadow: 3px 3px 6px rgb(0 0 0 / 60%);
		    margin-top: 31px;
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
		}
		.btn {
			margin-left: 30px;
		}
	</style>
</head>
<body>
	<hr>
	<div class="salam bg-success">
		<h1 style="font-family: 'Rowdies'; font-size: 50px; color: white;">Pastikan Data Anda Benar Ya!</h1>
		<p style="margin-top: 20px; color: white;">Sudah Punya Akun?</p>
		<a href="login.php"><button type="submit" class="btn btn btn-warning" style="text-align: center; width: 100px; margin-top: 140px; margin-left: 73px; color: white;">Kembali</button></a>
	</div>
	 <div class="kotak">
		<form action="simpan_daftar.php" method="POST">
			<h2 class="login text-success" style="font-family: 'Rowdies';">Daftar!</h2>
			<div class="container-xl">
				<div class="mb-3">
				    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" autocomplete="off" required>
				</div>
				<div class="mb-3">
				    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" autocomplete="off" required>
				</div>
				<div class="mb-3">
				    <input type="number" name="tlpn" class="form-control" id="tlpn" placeholder="Nomor Telepon" autocomplete="off" required>
				</div>
				<div class="mb-3">
				    <input type="text" name="username" class="form-control" id="username" placeholder="Username" autocomplete="off" required>
				</div>
				<div class="mb-3">
				    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off" required>
				</div>
				<div class="mb-3">
					<select name="role" id="tugas" class="form-select" aria-label="Default select example" required>
						<option>Pilih Tugas</option>
						<option value="kasir">Kasir</option>
						<option value="staf_gudang">Staf Gudang</option>
						<option value="admin">Admin</option>
					</select>
				</div>
				<button type="submit" class="btn btn btn-success" style="text-align: center; width: 676px; margin-top: 20px;">Daftar</button>
			</div>
		</form>
	</div>
</body>
</html>