<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Barang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Anton&family=DM+Serif+Display&family=Fredoka+One&family=Kanit:wght@500&display=swap" rel="stylesheet">
	<style type="text/css">
		.containerku {
			width: 100%;
			height: 649px;
			padding: 20px;
		}
		.history {
			width: 600px;
			height: 608px;
			background-color: white;
			float: left;
			padding: 10px;
			border-radius: 5px;
			font-size: 14px;
		}
		.list_history {
			width: 579px;
			height: 460px;
		}
		.lihat {
			width: 705px;
			height: 608px;
			float: right;
			padding: 10px;
			border-radius: 5px;
			background-color: white;
		}
		.lihat_sebelum {
			margin-bottom: 10px;
			width: 660px;
			height: 50px;
			color: white;
			text-align: center;
			padding-top: 5px;
			border-radius: 3px;
		}
		.lihat_sebelum2 {
			position: absolute;
			bottom: 33px;
			width: 660px;
			margin: 10px;
			height: 40px;
			color: white;
		}
		.lihat_sebelum2 img {
			width: 25px;
			margin-top: 9px;
			margin-left: 10px;
			float: left;
		}
		.lihat_sebelum2 p {
			margin-left: 50px;
			margin-top: 7px;
		}
		.scroll {
			width: 660px;
			height: 80%;
			overflow: auto;
			margin-left: 10px;
		}
		.paginationku {
			margin-top: 10px;
			margin-left: 5px;
			float: left;
		}
		.searching {
			margin-bottom: 15px;
		}
	</style>
</head>
<body>
	<div class="containerku bg bg-primary">
		<div class="history">
			<form action="" method="post">
				<div class="searching input-group">
				  <input type="date" class="form-control" name="cari" placeholder="Cari Transaksi.." autocomplete="off">
				  <button class="btn btn-secondary" type="submit"><img src="../IKONS/search-3-512.png" style="width: 15px"></button>
				</div>
			</form>
			<div class="list_history"> 
				<?php 
					session_start();
					if (!isset($_SESSION['username'])) {
						header("location:../ProjectUAS-Webdas_Final_Login_LogOut/login.php");
					}
					$username = $_SESSION['username'];
					$status = $_SESSION['login'];
				?>
				<table border="1" class="table table-striped table-hover">
					<tr>
						<th style="text-align: center;">Id Transaksi</th>
						<th style="text-align: center;">Tanggal Transaksi</th>
						<th style="text-align: center;">Id User</th>
						<th style="text-align: center;">Total Transaksi</th>
						<th style="text-align: center;">OPSI</th> 
					</tr>
					<?php if (isset($_POST['cari'])): ?>
						<?php
							$no = 1;
							$key = $_POST['cari'];
							include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
							//Menentukan Jumlah Data Pada Sebuah Halaman
							$JumlahDataPerHalaman = 7;

							//Menghitung total data
							$query2 = mysqli_query($konek, "SELECT * FROM tb_transaksi WHERE tgl_transaksi = $key");
							$jmldata = mysqli_num_rows($query2);

							//Menghitung total halaman
							$jmlhalaman = ceil($jmldata/$JumlahDataPerHalaman);

							//mengambil nilai halaman
							$halamanSekarang = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : $halamanSekarang = 1;

							//menentukan data akan dimulai dari index ke berapa?
							$index = ($JumlahDataPerHalaman * $halamanSekarang) - $JumlahDataPerHalaman;

							//menyesuaikan query dengan posisi dan batas
							$query = "select * from tb_transaksi where tgl_transaksi like ('%$key%') LIMIT $index, $JumlahDataPerHalaman";
							$data = mysqli_query($konek, $query);
							while ($result = mysqli_fetch_array($data)) {
						?>
						<tr>
							<td align="middle"><?php echo $result['id_transaksi']; ?></td>
							<td align="middle"><?php echo $result['tgl_transaksi']; ?></td>
							<td align="middle"><?php echo $result['id_user']; ?></td>
							<?php 
							$id = $result['id_transaksi'];
							$query8 = mysqli_query($konek, "SELECT SUM(jumlah_barang) AS total_barang FROM transaksi_detail WHERE id_transaksi = '$id'");
							$jumlah_barang = mysqli_fetch_assoc($query8);
							?>
							<td align="middle"><?php echo $jumlah_barang['total_barang']; ?></td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic example">
								  <a href="?id_transaksi=<?php echo $result['id_transaksi']; ?>">
								  	<button type="button" class="btn btn-success" style="border-bottom-right-radius: 0px; border-top-right-radius: 0px;">Lihat</button>
								  </a>
								  <a href="hapus.php?id_transaksi=<?php echo $result['id_transaksi']; ?>">
								  	<button type="button" class="btn btn-danger" style="border-bottom-left-radius: 0px; border-top-left-radius: 0px;">Hapus</button>
								  </a>
								</div>
							</td>
						</tr>
						<?php 
							}
						 ?>
					<?php else: ?>
						<?php
							$no = 1;
							include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
							//Menentukan Jumlah Data Pada Sebuah Halaman
							$JumlahDataPerHalaman = 7;

							//Menghitung total data
							$query2 = mysqli_query($konek, "SELECT * FROM tb_transaksi");
							$jmldata = mysqli_num_rows($query2);

							//Menghitung total halaman
							$jmlhalaman = ceil($jmldata/$JumlahDataPerHalaman);

							//mengambil nilai halaman
							$halamanSekarang = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : $halamanSekarang = 1;

							//menentukan data akan dimulai dari index ke berapa?
							$index = ($JumlahDataPerHalaman * $halamanSekarang) - $JumlahDataPerHalaman;

							//menyesuaikan query dengan posisi dan batas
							$query = "select * from tb_transaksi LIMIT $index, $JumlahDataPerHalaman";
							$data = mysqli_query($konek, $query);
							while ($result = mysqli_fetch_assoc($data)) {
						?>
						<tr>
							<td align="middle"><?php echo $result['id_transaksi']; ?></td>
							<td align="middle"><?php echo $result['tgl_transaksi']; ?></td>
							<td align="middle"><?php echo $result['id_user']; ?></td>
							<?php 
							$id = $result['id_transaksi'];
							$cekid = mysqli_query($konek, "SELECT SUM(jumlah_barang) AS total_barang FROM transaksi_detail WHERE id_transaksi = '$id'");
							$jumlah_barang = mysqli_fetch_assoc($cekid);
							?>
							<td align="middle"><?php echo $jumlah_barang['total_barang']; ?></td>
							<td align="middle">
								<div class="btn-group" role="group" aria-label="Basic example">
								  <a href="?id_transaksi=<?php echo $result['id_transaksi']; ?>">
								  	<button type="button" class="btn btn-success" style="border-bottom-right-radius: 0px; border-top-right-radius: 0px;">Lihat</button>
								  </a>
								  <a href="hapus.php?id_transaksi=<?php echo $result['id_transaksi']; ?>">
								  	<button type="button" class="btn btn-danger" style="border-bottom-left-radius: 0px; border-top-left-radius: 0px;">Hapus</button>
								  </a>
								</div>
							</td>
						</tr>
						<?php 
							}
						 ?>
					<?php endif ?>
				</table>
			</div>
			<div class="paginationku">
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
			<?php if (isset($key)): ?>
				<a href="admin.php"><button class="btn btn-warning" style="float: right; margin-top: 20px; margin-right: 10px;">Kembali</button></a>
			<?php else: ?>
				<a href="../ProjectUAS-Webdas_Final_Login_LogOut/logout.php"><button class="btn btn-warning" style="float: right; margin-top: 20px; margin-right: 10px; color: white;">Keluar</button></a>
			<?php endif; ?>
		</div>

		<!-- LIHAT -->
		<div class="lihat">
			<div class="scroll">
				<?php if (isset($_GET['id_transaksi'])): ?>
					<div class="lihat_sebelum bg-success">
						<h4 style="margin-top: 5px;">Lihat Detail Transaksi</h4>
					</div>
					<table border="1" cellpadding="20" class="table table-bordered bg-warning">
						<tr>
							<th style="text-align: center;">Nama Barang</th>
							<th style="text-align: center;">Kategori</th>
							<th style="text-align: center;">Harga Barang</th>
							<th style="text-align: center;">Jumlah Pembelian</th>
							<th style="text-align: center;">Sub Total</th>
						</tr>

						<?php 
							$id = $_GET['id_transaksi'];
							$query = "SELECT nama_barang, nama_kategori, harga_barang, jumlah_barang, total_harga, uang_masuk, (uang_masuk - total_harga) AS kembalian FROM transaksi_detail
							INNER JOIN tb_barang
							ON transaksi_detail.kode_barang = tb_barang.kode_barang
							INNER JOIN kategori_barang
							ON tb_barang.id_kategori = kategori_barang.id_kategori
							INNER JOIN tb_transaksi
							ON transaksi_detail.id_transaksi = tb_transaksi.id_transaksi
							INNER JOIN tb_uangmasuk
							ON tb_transaksi.id_transaksi = tb_uangmasuk.id_transaksi
							WHERE tb_transaksi.id_transaksi = '$id'";
							$data = mysqli_query($konek, $query);
							while ($result = mysqli_fetch_array($data)) { ?>
								<tr>
									<td align="middle"><?php echo $result['nama_barang']; ?></td>
									<td align="middle"><?php echo $result['nama_kategori']; ?></td>
									<td align="middle"><?php echo $result['harga_barang']; ?></td>
									<td align="middle"><?php echo $result['jumlah_barang']; ?></td>
									<td align="middle"><?php echo $result['jumlah_barang'] * $result['harga_barang'] ?></td>
								</tr>
						<?php } 
						$id = $_GET['id_transaksi'];
						$query = "SELECT sum(total_harga) as total_harga, uang_masuk, uang_masuk - sum(total_harga) AS kembalian FROM transaksi_detail
						INNER JOIN tb_transaksi
						ON transaksi_detail.id_transaksi = tb_transaksi.id_transaksi
						INNER JOIN tb_uangmasuk
						ON tb_transaksi.id_transaksi = tb_uangmasuk.id_transaksi
						WHERE tb_transaksi.id_transaksi = '$id'";
						$data = mysqli_query($konek, $query);
						$result = mysqli_fetch_assoc($data);
						?>
								<tr>
									<td colspan="4" align="left">Total</td>
									<td align="middle"><?php echo $result['total_harga']; ?></td>
								</tr>
								<tr>
									<td colspan="4" align="left">Dibayar</td>
									<td align="middle"><?php echo $result['uang_masuk']; ?></td>
								</tr>
								<tr>
									<td colspan="4" align="left">Kembali</td>
									<td align="middle"><?php echo $result['kembalian']; ?></td>
								</tr>
					</table>
				<?php else : ?>
					<div class="lihat_sebelum bg-warning">
						<h4 style="margin-top: 5px;">Lihat Detail Transaksi</h4>
					</div>
					<div class="lihat_sebelum2 bg-danger">
						<img src="../IKONS/toppng.com-384x384-warning-icon-png-white-353x305.png">
						<p><i>Belum ada yang dipilih</i></p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</body>
</html>
