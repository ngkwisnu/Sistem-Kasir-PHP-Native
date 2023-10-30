<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Barang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Anton&family=DM+Serif+Display&family=Fredoka+One&family=Kanit:wght@500&display=swap" rel="stylesheet">
	<style type="text/css">
		.containerku3 {
			width: 100%;
			height: 649px;
			padding: 10px;
			letter-spacing: 1px;
		}
		.tambahkategori {
			width: 450px;
			height: 610px;
			background-color: white;
			margin: 10px;
			padding: 20px;
			float: left;
			border-radius: 5px;
		}
		.list_kategori {
			width: 845px;
			height: 610px;
			margin: 10px 10px 10px 0px;
			padding: 20px;
			background-color: white;
			float: right;
			text-align: center;
			border-radius: 5px;
		}
		.scroll2 {
			height: 75%;
			overflow: auto;
		}
		.text {
			width: 410px;
			height: 40px;
			text-align: center;
			color: white;
			padding-top: 5px;
			border-radius: 5px;
		}
		.text2 {
			width: 100%;
			height: 40px;
			border-top-right-radius: 10px;
			border-top-left-radius: 10px;
			text-align: center;
			color: white;
			padding-top: 6px;
		}
		.text3 {
			width: 100%;
			height: 40px;
			border-bottom-right-radius: 10px;
			border-bottom-left-radius: 10px;
			text-align: center;
			color: white;
		}

		.searching {
			margin-bottom: 15px;
			margin-right: 2px;
		}
	</style>
</head>
<body class="bg-success">
<div class="containerku3 bg-secondary">

	<!-- Tambah -->
	<div class="tambahkategori mb-3">
		<div class=" text bg-primary">
			<h5>Input Kategori Baru</h5>
		</div>
		<form method="post" action="tambah_aksi_kategori.php">
			<table class="table-borderless">
				<tr>
					<td><input id="kode" class="form-control" style="width: 407px; height: 50px; margin-top: 10px;" type="text" name="id" placeholder="Masukkan Id Kategori" autocomplete="off"></td>
				</tr>
				<tr>
					<td><input id="id" class="form-control" style="width: 407px; height: 50px; margin-top: 10px;" type="text" name="nama" placeholder="Masukkan Nama Kategori" autocomplete="off"></td>
				</tr>
			</table>
			<button type="submit" class="btn btn-success" style="margin-top: 310px; width: 407px; color: white;">Simpan</button>
		</form>
		<a href="LIst_barang.php"><button class="btn btn-warning" style="margin-top: 17px; width: 407px; color: white;">Kembali</button></a>
	</div>


	<!-- List Kategori --> 
	<div class="list_kategori">
		<form action="" method="post">
			<div class="searching input-group">
			  <input type="text" class="form-control" name="cari" placeholder="Cari Kategori.." style="font-style: italic; border-top-left-radius: 20px; border-bottom-left-radius: 20px;" autocomplete="off">
			  <button class="btn btn-secondary" type="submit" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;"><img src="../IKONS/search-3-512.png" style="width: 15px;"></button>
			</div>
		</form>
		<div class="text2 bg-success">
			<h5>LIST KATEGORI</h5>
		</div>
		<div class="scroll2">
			<table border="1" class="table table-bordered">
				<tr>
					<th>No</th>
					<th>Id Kategori</th>
					<th>Nama Kategori</th>
					<th>OPSI</th>
				</tr>
				<?php if (isset($_POST['cari'])): ?>
					<?php
						$key = $_POST['cari'];
						$no = 1;
						include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
						$query = "SELECT * FROM kategori_barang WHERE id_kategori LIKE ('%$key%') OR nama_kategori LIKE ('%$key%')";
						$data = mysqli_query($konek, $query);
						while ($result = mysqli_fetch_array($data)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td align="middle"><?php echo $result['id_kategori']; ?></td>
						<td align="middle"><?php echo $result['nama_kategori']; ?></td>
						<td>
							<a href="edit_kategori.php?id_kategori=<?php echo $result['id_kategori']; ?>"><button type="submit" class="btn btn-success">Edit</button></a>
							<a href="hapus_kategori.php?id_kategori=<?php echo $result['id_kategori']; ?>"><button type="submit" class="btn btn-danger">Hapus</button></a>
						</td>
					</tr>
					<?php 
						}
					 ?>
				<?php else: ?>
					<?php
						$no = 1;
						include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
						$query = "SELECT * FROM kategori_barang";
						$data = mysqli_query($konek, $query);
						while ($result = mysqli_fetch_array($data)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td align="middle"><?php echo $result['id_kategori']; ?></td>
						<td align="middle"><?php echo $result['nama_kategori']; ?></td>
						<td>
							<a href="edit_kategori.php?id_kategori=<?php echo $result['id_kategori']; ?>"><button type="submit" class="btn btn-primary">Edit</button></a>
							<a href="hapus_kategori.php?id_kategori=<?php echo $result['id_kategori']; ?>"><button type="submit" class="btn btn-danger">Hapus</button></a>
						</td>
					</tr>
					<?php 
						}
					 ?>
				<?php endif; ?>
			</table>
		</div>
		<?php if (isset($_POST['cari'])) : ?>
			<div class="text3 bg-success">
				<a href="tambahkategori.php">
					<button class="btn btn-success" style="float: left; margin-left: 3px;">Kembali</button>
				</a>
			</div>
		<?php else: ?>
			<div class="text3 bg-success"></div>
		<?php endif; ?>
	</div>
</div>
</body>
</html>