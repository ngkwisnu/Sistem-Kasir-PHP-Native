<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaksi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Anton&family=DM+Serif+Display&family=Fredoka+One&family=Kanit:wght@500&display=swap" rel="stylesheet">
	<style type="text/css">
		.containerku {
			width: 1290px;
			height: 649px;
			padding: 0;
			margin: 0;
			background-color: white;
		}
		.bio {
			width: 400px;
			height: 649px;
			float: left;
		}
		.foto {
			margin-top: 30px;
			padding-top: 100px;
			width: 360px;
			height: 550px;
			background-color: white;
			border-radius: 5px;
		}
		.mb-3 {
			padding: 20px;
		}
		.tgl {
			width: 800px;
			height: 180px;
			margin: 10px;
			padding: 10px;
		}
		.transaksi {
			margin-top: 20px;
			margin-left: 20px;
			max-width: 800px;
			height: 350px;
			padding: 10px;
		}
		.scroll {
			height: 86%;
			overflow: auto;
		}
	</style>
</head>
<body class="bg bg-success">
	<?php 
	session_start();
	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
	if (!isset($_SESSION['username'])) {
		header("location:../ProjectUAS-Webdas_Final_Login_LogOut/login.php");
	}
	$username = $_SESSION['username'];
	unset($_SESSION['dibayar']);
	$query = mysqli_query($konek, 
		"SELECT * FROM tb_user 
		WHERE username = '$username'");
	$data = mysqli_fetch_assoc($query);
	$id_user = $data['id_user'];

	 ?>
	<div class="containerku">
		<div class="bio text-bg-success p-3">
			<div class="foto">
				<img src="img/user.png" style="display:block; margin:auto;">
				<br>
				<h2 class="text-success p-3" style="text-align: center; font-family: 'Kanit';"><?php echo $username ?></h2>
				<br>
				<br>
				<br>
				<a href="../ProjectUAS-Webdas_Final_Login_LogOut/logout.php"><button type="submit" class="btn btn-danger" style="position: relative; bottom: 10px; left: 140px;">Keluar</button></a>
			</div>
		</div>
		<div class="mb-3 row">
			<div class="tgl">
				<form method="post" action="insert_tgl_transaksi.php">
					<table class="table table-borderless">
						<tr>
							<td>Tanggal Transaksi</td>
						</tr>
						<tr>
							<td><input class="form-control" type="datetime-local" name="tgl_transaksi" required></td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-success" style="margin-top: 20px;">Transaksi Baru</button></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="transaksi">
				<div class="scroll">
					<form>
						<table border="1px" class="table table-bordered">
							<tr>
								<th>Id Transaksi</th>
								<th>Tanggal & Waktu Transaksi</th>
								<th>Total Transaksi</th>
							</tr>
							<?php 
							$cekdata = mysqli_query($konek, "SELECT * FROM tb_transaksi");
							$data = mysqli_fetch_assoc($cekdata);
							 ?>
							<?php if (isset($data['id_transaksi'])): ?>
								<?php 
								$query7 = mysqli_query($konek, "SELECT * FROM tb_transaksi");
								while ($data_transaksi = mysqli_fetch_assoc($query7)) { ?>
									<tr>
										<td><?php echo $data_transaksi['id_transaksi']; ?></td>
										<td><?php echo $data_transaksi['tgl_transaksi']; ?></td>
										<?php 
										$id = $data_transaksi['id_transaksi'];
										$query8 = mysqli_query($konek, "SELECT SUM(jumlah_barang) AS total_barang FROM transaksi_detail WHERE id_transaksi = '$id'");
										$jumlah_barang = mysqli_fetch_assoc($query8);
										?>
										<td><?php echo $jumlah_barang['total_barang']; ?></td>
									</tr>
								<?php } ?>
							<?php endif ?>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>