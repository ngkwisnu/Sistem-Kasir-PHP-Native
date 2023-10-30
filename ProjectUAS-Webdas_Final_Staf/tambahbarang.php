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
			width: 1344px;
			height: 627px;
			margin: 10px;
			padding: 10px;
		}
		.tambahbarang {
			width: 450px;
			height: 565px;
			background-color: white;
			margin: 20px;
			padding: 20px;
			float: left;
		}
		.list_barang {
			width: 800px;
			height: 565px;
			margin: 20px 20px 20px 0px;
			padding: 20px;
			background-color: white;
			float: right;
			text-align: center;
		}
		.scroll2 {
			height: 80%;
			overflow: auto;
		}
		.text {
			height: 3rem;
			text-align: center;
			color: white;
			padding-top: 9px;
			border-radius: 7px;
		}
		.text2 {
			width: 100%;
			height: 3rem;
			text-align: center;
			color: white;
			padding-top: 9px;
			border-top-right-radius: 7px;
			border-top-left-radius: 7px;
		}
	</style>
</head>
<body>
<div class="containerku3 bg-success">
	<div class="tambahbarang mb-3">
		<div class="text bg-success">
			<h4>Input Barang</h4>
		</div>
		<form action="tambah_aksi.php" method="post">
			<table class="table-borderless">
				<tr>
					<td><input id="id" class="form-control" style="width: 407px; height: 50px; margin-top: 10px;" type="text" name="id" placeholder="Masukkan Id Kategori" autocomplete="off"></td>
				</tr>
				<tr>
					<td><input id="kode" class="form-control" style="width: 407px; height: 50px; margin-top: 10px;" type="text" name="kode" placeholder="Masukkan Kode Barang" autocomplete="off"></td>
				</tr>
				<tr>
					<td><input id="nama" class="form-control" style="width: 407px; height: 50px; margin-top: 10px;" type="text" name="nama" placeholder="Masukkan Nama Barang" autocomplete="off"></td>
				</tr>
				<tr>
					<td><input id="harga" class="form-control" style="width: 407px; height: 50px; margin-top: 10px;" type="text" name="harga" placeholder="Masukkan Harga Barang" autocomplete="off"></td>
				</tr>
				<tr>
					<td><input id="jumlah" class="form-control" style="width: 407px; height: 50px; margin-top: 10px;" type="text" name="jumlah" placeholder="Masukkan Jumlah Barang" autocomplete="off"></td>
				</tr>
			</table>
			<button class="btn btn-outline-success" style="margin-top: 17px; width: 407px">Simpan</button>
		</form>
		<a href="LIst_barang.php"><button type="button" class="btn btn-outline-success" style="margin-top: 17px; width: 407px">Kembali</button></a>
	</div>
	<div class="list_barang">
		<div class="text2 bg-warning">
			<h4>Data Barang</h4>
		</div>
		<div class="scroll2">
			<table border="1" class="table table-bordered">
				<tr>
					<th>No</th>
					<th>Id Kategori</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Harga Barang</th> 
					<th>Stok</th>
				</tr>
				<?php
					$no = 1;
					include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
					$query = "SELECT * FROM tb_barang";
					$data = mysqli_query($konek, $query);
					while ($result = mysqli_fetch_array($data)) {
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td align="middle"><?php echo $result['id_kategori']; ?></td>
					<td align="middle"><?php echo $result['kode_barang']; ?></td>
					<td align="middle"><?php echo $result['nama_barang']; ?></td>
					<td align="middle"><?php echo $result['harga_barang']; ?></td>
					<td align="middle"><?php echo $result['stok_barang']; ?></td>
				</tr>
				<?php 
					}
				 ?>
			</table>
		</div>
	</div>
</div>
</body>
</html>