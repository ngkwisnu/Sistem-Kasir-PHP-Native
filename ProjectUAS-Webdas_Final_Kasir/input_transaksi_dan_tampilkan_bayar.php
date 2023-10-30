<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaksi Total</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<style type="text/css">
		body {
			font-size: 15px;
			background-color: #ebe6e6;
			padding: 0;
			margin: 0;
		}
		.containerku {
			background-color: white;
			margin: 20px 0px 20px 40px;
			padding: 10px;
			width: 1200px;
			height: 607px;
			float: left;
		}
		.tgl {
			width: 1250px;
			height: 50px;
			padding: 10px;
			margin: 10px;
		}
		.cekbarang {
			background-color: white;
			border: 2px solid grey;
			width: 400px;
			height: 490px;
			padding: 10px;
			margin: 10px;
			float: left;
		}
		.tampilkan {
			width: 730px;
			max-width: 730px;
			height: 400px;
			float: left;
			margin: 10px;
			padding: 10px;
		}
		.scroll {
			height: 100%;
			overflow: auto;
		}
		.tepi {
			width: 100px;
			height: 607px;
			position: absolute;
			right: 45px;
			top: 20px;
		}
	</style>
</head>
<body>
	<div class="containerku">
		<div class="tgl text-bg-success p-3">
			<?php
				include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
				session_start(); 
				if (!isset($_SESSION['username'])) {
					header("location:../ProjectUAS-Webdas_Final_Login_LogOut/login.php");
				}
				$query6 = mysqli_query($konek, "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC");
				$data_transaksi = mysqli_fetch_assoc($query6);
				$tgl = $data_transaksi['tgl_transaksi'];
				$id = $data_transaksi['id_transaksi'];
			?>
			<h6>Transaksi Tanggal : <?php echo $tgl; ?></h6>
		</div>
		<div class="cekbarang">
			<div class="mb-3 row">
				<?php 
					$cek = mysqli_query($konek, "SELECT uang_masuk FROM tb_uangmasuk WHERE id_transaksi = '$id'");
					$data = mysqli_fetch_assoc($cek);
				?>

				<?php if (isset($data['uang_masuk'])): ?>
					<form method="post" action="insert_barang_dan_update_stok.php">
							<table class="table table-borderless">
								<tr>
									<td>Kode Barang</td>
								</tr>
								<tr>
									<td><input class="form-control" type="text" name="kode" disabled></td>
								</tr>
								<tr>
									<td>Jumlah Barang</td>
								</tr>
								<tr>
									<td><input type="number" class="form-control" name="jumlah_barang" disabled></td>
								</tr>
								<tr>
									<td><button type="submit" class="btn btn-success" disabled>Masukkan</button></td>
								</tr>
							</table>
					</form>
					<form style="margin-top: 50px;" method="post" action="insert_bayar.php">
						<table class="table table-borderless">
							<tr>
								<td>Dibayar</td>
							</tr>
							<tr>
								<td><input type="number" class="form-control" name="dibayar" disabled></td>
							</tr>
							<tr>
								<td><button type="submit" class="btn btn-success" disabled>Bayar</button></td>
							</tr>
						</table>
					</form>
				<?php else : ?>
					<?php if (!isset($_SESSION['jumlah'])): ?>
						<form method="post" action="insert_barang_dan_update_stok.php">
							<table class="table table-borderless">
								<tr>
									<td>Kode Barang</td>
								</tr>
								<tr>
									<td><input class="form-control" type="text" name="kode" autocomplete="off" autofocus></td>
								</tr>
								<tr>
									<td>Jumlah Barang</td>
								</tr>
								<tr>
									<td><input type="number" class="form-control" name="jumlah_barang"></td>
								</tr>
								<tr>
									<td><button type="submit" class="btn btn-success">Masukkan</button></td>
								</tr>
							</table>
						</form>
					<?php else: ?>
						<form method="post" action="insert_barang_dan_update_stok.php">
							<table class="table table-borderless">
								<tr>
									<td>Kode Barang</td>
								</tr>
								<tr>
									<td><input class="form-control" type="text" name="kode" autocomplete="off" autofocus></td>
								</tr>
								<tr>
									<td>Jumlah Barang</td>
								</tr>
								<tr>
									<td><input type="number" class="form-control is-invalid" name="jumlah_barang"><i style="font-size: 13px;">Maaf, Stok Barang Tidak Cukup!</i></td>
								</tr>
								<tr>
									<td><button type="submit" class="btn btn-success">Masukkan</button></td>
								</tr>
							</table>
						</form>
					<?php endif; ?>
					<form style="margin-top: 50px;" method="post" action="insert_bayar.php">
						<?php if (isset($_SESSION['dibayar'])): ?>
							<table class="table table-borderless">
								<tr>
									<td>Dibayar</td>
								</tr>
								<tr>
									<td><input id="dibayar" type="number" class="form-control is-invalid" name="dibayar"><i style="font-size: 13px;">Maaf Uang Anda Tidak Cukup!</i></td>
								</tr>
								<tr>
									<td><button type="submit" class="btn btn-success">Bayar</button></td>
								</tr>
							</table>
						<?php else: ?>
							<table class="table table-borderless">
								<tr>
									<td>Dibayar</td>
								</tr>
								<tr>
									<td><input type="number" class="form-control" name="dibayar"></td>
								</tr>
								<tr>
									<td><button type="submit" class="btn btn-success">Bayar</button></td>
								</tr>
							</table>
						<?php endif; ?>
					</form>
				<?php endif; ?>
			</div>
		</div>

		<!-- Tabel Pembayaran -->
		<div class="tampilkan">
			<div class="scroll">
				<form>
					<table border="1px" class="table table-bordered">
						<tr>
							<th>Nama Barang</th>
							<th>Kategori</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Sub Total</th>
						</tr>
						<?php
						
						$query1 = mysqli_query($konek, "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC");
						$data_transaksi = mysqli_fetch_assoc($query1);
						$id_transaksi = $data_transaksi['id_transaksi'];

						$query = mysqli_query($konek, "
							SELECT nama_barang, nama_kategori, harga_barang, jumlah_barang, total_harga FROM transaksi_detail
							INNER JOIN tb_barang
							ON transaksi_detail.kode_barang = tb_barang.kode_barang
							INNER JOIN kategori_barang
							ON tb_barang.id_kategori = kategori_barang.id_kategori
							INNER JOIN tb_transaksi
							ON transaksi_detail.id_transaksi = tb_transaksi.id_transaksi
							WHERE tb_transaksi.id_transaksi = '$id_transaksi'");
						while ($result = mysqli_fetch_assoc($query)) { ?>
							<tr>
								<td><?php echo $result['nama_barang']; ?></td>
								<td><?php echo $result['nama_kategori']; ?></td>
								<td><?php echo $result['harga_barang']; ?></td>
								<td><?php echo $result['jumlah_barang']; ?></td>
								<td><?php echo $result['total_harga']; ?></td>
							</tr>
						<?php } ?>
						<?php 
						$query3 = mysqli_query($konek, "SELECT SUM(total_harga) AS total FROM transaksi_detail WHERE id_transaksi = '$id_transaksi'");
						$total = mysqli_fetch_assoc($query3); ?>
						<tr>
							<th colspan="4" align="left">TOTAL</th>
							<td><?php echo $total['total']; ?></td>
						</tr>
						<tr>
							<th colspan="4" align="left">Dibayar</th>
							<?php 
							$query4 = mysqli_query($konek, "SELECT uang_masuk AS um FROM tb_uangmasuk 
								WHERE id_transaksi = '$id_transaksi'");
							while ($uangmasuk = mysqli_fetch_assoc($query4)) { ?>
								<td><?php echo $uangmasuk['um']; ?></td> 
							<?php } ?>
						</tr>
						<tr>
							<th colspan="4" align="left">Kembali</th>
							<?php 
							$query5 = mysqli_query($konek, "SELECT uang_masuk - SUM(total_harga) AS kembali from tb_uangmasuk 
								INNER JOIN transaksi_detail 
								ON tb_uangmasuk.id_transaksi = transaksi_detail.id_transaksi
								WHERE tb_uangmasuk.id_transaksi = '$id_transaksi'");
							while ($kembali = mysqli_fetch_assoc($query5)) { ?>
								<td><?php echo $kembali['kembali']; ?></td>
							<?php } ?>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<a href="kasir_page.php"><button type="button" class="btn btn-success" style="position: absolute; right: 280px; bottom: 56px;">Transaksi Baru</button></a>
	<a href="../ProjectUAS-Webdas_Final_Login_LogOut/logout.php"><button type="button" class="btn btn-danger" style="position: absolute; right: 188px; bottom: 56px;">Keluar</button></a>
	<div class="tepi bg bg-success">
		<h1 class="text-success">hai</h1>
	</div>
</body>
</html>