<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Kategori</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Anton&family=DM+Serif+Display&family=Fredoka+One&family=Kanit:wght@500&display=swap" rel="stylesheet">
	<style type="text/css">
		.containerku4 {
			width: 1330px;
			height: 620px;
			margin: 10px;
			padding: 10px;
		}
		.list_kategori {
			width: 900px;
			height: 560px;
			margin: 20px 20px 20px 20px;
			padding: 20px;
			background-color: white;
			float: left;
			text-align: center;
			border-radius: 5px;
		}
		.text {
			width: 250px;
			height: 40px;
			border-radius: 20px 20px 0px 0px;
			padding-top: 6px;
			color: white;
		}
		.update_kategori {
			width: 325px;
			height: 560px;
			margin: 20px 20px 20px 0px;
			padding: 20px;
			background-color: white;
			float: right;
			border-radius: 5px;
		}
		.form-label {
			margin-top: 10px;
		}
	</style>
</head>
<body class="bg-success">
	<div class="containerku4">
		<div class="list_kategori">
			<div class="text bg-success">
				<h5>Data Barang</h5>
			</div>
			<table border="1" class="table table-bordered">
				<tr>
					<th>No</th>
					<th>Id Kategori</th>
					<th>Nama Kategori</th>
				</tr>
				<?php
					$no = 1;
					include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
					$id = $_GET['id_kategori'];
					$query = "select * from kategori_barang where id_kategori = '$id'";
					$data = mysqli_query($konek, $query);
					while ($result = mysqli_fetch_array($data)) {
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td align="middle"><?php echo $result['id_kategori']; ?></td>
					<td align="middle"><?php echo $result['nama_kategori']; ?></td>
				</tr>
				<?php 
					}
				 ?>
			</table>
		</div>
		<div class="update_kategori">
			<form method="POST" action="update_kategori.php">
				<div class="mb-3">
					<?php 
						include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
						$data = mysqli_query($konek, "select * from kategori_barang where id_kategori = '$id'");
						while ($result = mysqli_fetch_array($data)) {
					?>
  					<label for="id" class="form-label">Id Kategori</label>
  					<input type="text" class="form-control" id="id" name="id" value="<?php echo $result['id_kategori'] ?>" autocomplete="off">
  					<label for="nama" class="form-label">Nama Kategori</label>
  					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $result['nama_kategori'] ?>" autocomplete="off">
  					<?php } ?>
				</div>
				<button type="submit" class="btn btn-success" style="margin-left: 60px; margin-top: 20px;">Simpan Perubahan</button>
			</form>
		</div>
	</div>
</body>
</html>