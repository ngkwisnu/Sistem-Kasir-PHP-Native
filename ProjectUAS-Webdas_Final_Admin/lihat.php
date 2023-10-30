<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Page</title>
</head>
<body>
	<h1>WISMART JAYA</h1>
	<?php
	session_start();
	include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
	$id = $_GET['id_transaksi'];
	$query88 = "SELECT tgl_transaksi FROM tb_transaksi WHERE id_transaksi = '$id'";
	$data = mysqli_query($konek, $query88);
	while ($tgl = mysqli_fetch_array($data)) {
		$tgltransaksi = $tgl['tgl_transaksi'];
	} ?>
	<h3>History Transaksi : <?php echo $tgltransaksi; ?></h3>
	<br>
	<hr>
	<br>
	<form action="admin.php">
		<table border="1" cellpadding="20">

			<tr>
				<th align="middle">Nama Barang</th>
				<th align="middle">Kategori</th>
				<th align="middle">Harga Barang</th>
				<th align="middle">Jumlah Pembelian</th>
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
						<td colspan="3" align="left">Total</td>
						<td align="middle"><?php echo $result['total_harga']; ?></td>
					</tr>
					<tr>
						<td colspan="3" align="left">Dibayar</td>
						<td align="middle"><?php echo $result['uang_masuk']; ?></td>
					</tr>
					<tr>
						<td colspan="3" align="left">Kembali</td>
						<td align="middle"><?php echo $result['kembalian']; ?></td>
					</tr>
		</table>
		<br>
		<br>
		<table cellpadding="5">
				<tr>
					<td><input type="submit" name="Log Out" value="Kembali"></td>
				</tr>
		</table>
	</form>
</body>
</html>