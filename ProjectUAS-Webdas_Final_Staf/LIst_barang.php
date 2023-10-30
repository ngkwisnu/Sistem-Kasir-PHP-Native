<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Barang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Anton&family=DM+Serif+Display&family=Fredoka+One&family=Kanit:wght@500&display=swap" rel="stylesheet">
	<style type="text/css">
		.containerku2 {
			width: 1330px;
			height: 620px;
			margin: 10px;
			padding: 10px;
		}
		.biodata {
			width: 300px;
			height: 500px;
			margin: 50px 20px 20px 20px;
			padding: 20px;
			background-color: whitesmoke;
			float: left;
			border-radius: 5px;
		}
		.foto {
			width: 250px;
			height: 200px;
			margin-left: 5px;
			padding-top: 20px;
		}
		.list_barang {
			width: 950px;
			height: 560px;
			margin: 20px 20px 20px 0px;
			padding: 20px;
			background-color: white;
			float: right;
			text-align: center;
			border-radius: 5px;
		}
		.tabel {
			width: 910px;
			height: 400px;
		}
		.pagination {
			margin-top: 4px;
			margin-left: 3px;
		}
		.text {
			width: 250px;
			height: 40px;
			border-radius: 20px 20px 0px 0px;
			padding-top: 6px;
			color: white;
			margin-top: 15px;
		}
		.searching {
			width: 400px;
			float: right;
			margin-bottom: 15px;
		}
		.cari {
			width: 300px;
			background-color: blue;
		}
	</style>
</head>
<body class="bg-success">
	<?php 
	session_start();
	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
	$username = $_SESSION['username'];

	$query = mysqli_query($konek, 
		"SELECT * FROM tb_user 
		WHERE username = '$username'");
	$data = mysqli_fetch_assoc($query);
	$id_user = $data['id_user'];
	 ?>
	<div class="containerku2 bg-success">
		<div class="biodata">
			<div class="foto">
				<img src="../ProjectUAS-Webdas_Final_Kasir/img/user.png" style="display:block; margin:auto;">
				<br>
				<h2 class="text-success p-3" style="text-align: center; font-family: 'Kanit';"><?php echo $username ?></h2>
				<br>
				<br>
				<br>
				<a href="../ProjectUAS-Webdas_Final_Login_LogOut/logout.php"><button type="submit" class="btn btn-danger" style="position: relative; bottom: 10px; left: 90px;">Keluar</button></a>
			</div>
		</div>
		<div class="list_barang">
			<form action="" method="post">
				<div class="searching input-group">
				  <input type="text" class="form-control" name="cari" placeholder="Cari Barang.." autocomplete="off">
				  <button class="btn btn-secondary" type="submit"><img src="../IKONS/search-3-512.png" style="width: 15px"></button>
				</div>
			</form>
			<div class="text bg-success">
				<h5>Data Barang</h5>
			</div>
			<div class="tabel">
				<table border="1" class="table table-bordered">
					<tr>
						<th>No</th>
						<th>Kode Barang</th>
						<th>Id Kategori</th>
						<th>Nama Barang</th>
						<th>Harga Barang</th> 
						<th>Stok</th>
						<th>OPSI</th> 
					</tr>
					<?php if (isset($_POST['cari'])) : ?>
						<?php
							$no = 1;
							$key = $_POST['cari'];
							//Menentukan Jumlah Data Pada Sebuah Halaman
							$JumlahDataPerHalaman = 6;

							//Menghitung total data
							$query2 = mysqli_query($konek, "SELECT * FROM tb_barang WHERE nama_barang LIKE ('%$key%')");
							$jmldata = mysqli_num_rows($query2);

							//Menghitung total halaman
							$jmlhalaman = ceil($jmldata/$JumlahDataPerHalaman);

							//mengambil nilai halaman
							$halamanSekarang = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : $halamanSekarang = 1;

							//menentukan data akan dimulai dari index ke berapa?
							$index = ($JumlahDataPerHalaman * $halamanSekarang) - $JumlahDataPerHalaman;

							//menyesuaikan query dengan posisi dan batas
							$key = $_POST['cari'];
							$query = "select * from tb_barang where nama_barang like ('%$key%') or kode_barang like ('%$key%') or id_kategori like ('%$key%') or harga_barang like ('%$key%') or stok_barang like ('%$key%') order by stok_barang asc LIMIT $index, $JumlahDataPerHalaman";
							$data = mysqli_query($konek, $query);
							while ($result = mysqli_fetch_array($data)) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td align="middle"><?php echo $result['kode_barang']; ?></td>
							<td align="middle"><?php echo $result['id_kategori']; ?></td>
							<td align="middle"><?php echo $result['nama_barang']; ?></td>
							<td align="middle"><?php echo $result['harga_barang']; ?></td>
							<td align="middle"><?php echo $result['stok_barang']; ?></td>
							<td>
								<a href="edit.php?kode_barang=<?php echo $result['kode_barang']; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
								<a href="hapus.php?kode_barang=<?php echo $result['kode_barang']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
							</td>
						</tr>
						<?php 
							}
						 ?>
					<?php else: ?>
						<?php
							$no = 1;
							//Menentukan Jumlah Data Pada Sebuah Halaman
							$JumlahDataPerHalaman = 6;

							//Menghitung total data
							$query2 = mysqli_query($konek, "SELECT * FROM tb_barang");
							$jmldata = mysqli_num_rows($query2);

							//Menghitung total halaman
							$jmlhalaman = ceil($jmldata/$JumlahDataPerHalaman);

							//mengambil nilai halaman
							$halamanSekarang = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : $halamanSekarang = 1;

							//menentukan data akan dimulai dari index ke berapa?
							$index = ($JumlahDataPerHalaman * $halamanSekarang) - $JumlahDataPerHalaman;

							//menyesuaikan query dengan posisi dan batas
							$query = "select * from tb_barang LIMIT $index, $JumlahDataPerHalaman";
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
							<td>
								<a href="edit.php?kode_barang=<?php echo $result['kode_barang']; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
								<a href="hapus.php?kode_barang=<?php echo $result['kode_barang']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
							</td>
						</tr>
						<?php 
							}
						 ?>
					<?php endif; ?>
				</table>
			</div>
			<div class="pagination">
			<!-- Navigasi Pagination-->
			<?php 
				if ($halamanSekarang > 1) {
					$back = $halamanSekarang - 1;
				}
				else {
					$back = $halamanSekarang;
				}

				if ($halamanSekarang < $jmlhalaman) {
					$next = $halamanSekarang + 1;
				}
				else {
					$next = $halamanSekarang;
				}
			?>
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				  	<?php if ($halamanSekarang > 1): ?>
				  		<li class="page-item">
					      <a class="page-link" href="?halaman=<?php echo $back; ?>" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
				  	<?php endif; ?>

				    <?php 
				    for ($i=1; $i<=$jmlhalaman ; $i++) { 
						if ($i != $halamanSekarang) { ?>
							<li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
							<?php
						}
						else { ?>
							<li class="page-item"><a class="page-link" href="#"><?php echo $i; ?></a></li> <?php
						}
					}
				     ?>

				     <?php if ($halamanSekarang < $jmlhalaman): ?>
				     	<li class="page-item">
					      <a class="page-link" href="?halaman=<?php echo $next ?>" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
				     <?php endif; ?>
				  </ul>
				</nav>
			</div>
			<br><br>
		</div>
		<?php if (isset($key)): ?>
			<a href="LIst_barang.php"><button class="btn btn-success" style="position: absolute; float: right; right: 100px; bottom: 90px;">Kembali</button></a>
		<?php else: ?>
			<a href="tambahkategori.php"><button class="btn btn-primary" style="position: absolute; float: right; right: 250px; bottom: 90px;">Edit Kategori</button></a>
			<a href="tambahbarang.php"><button class="btn btn-success" style="position: absolute; float: right; right: 100px; bottom: 90px;">Tambah Barang</button></a>
		<?php endif; ?>
	</div>
</body>
</html>
