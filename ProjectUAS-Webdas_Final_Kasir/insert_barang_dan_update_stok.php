<?php 

include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
session_start();

$kode = $_POST['kode'];
$jumlah = $_POST['jumlah_barang'];

$query1 = mysqli_query($konek, "SELECT * from tb_transaksi ORDER BY id_transaksi DESC");
$data_transaksi = mysqli_fetch_assoc($query1);
$id_transaksi = $data_transaksi['id_transaksi'];

$query2 = mysqli_query($konek, "SELECT * from tb_barang where kode_barang = '$kode'");
$data_barang = mysqli_fetch_assoc($query2);
$harga = $data_barang['harga_barang'];

$cekstok = mysqli_query($konek, "SELECT * FROM tb_barang WHERE kode_barang = '$kode'");
$stok = mysqli_fetch_assoc($cekstok);
$sisa_stok = $stok['stok_barang'];

if ($sisa_stok >= $jumlah) {
    unset($_SESSION['jumlah']);
    $cekbarang = mysqli_query($konek, "SELECT * FROM transaksi_detail WHERE kode_barang = '$kode' AND id_transaksi = '$id_transaksi'");
    $barang = mysqli_fetch_assoc($cekbarang);
    if (!isset($barang['kode_barang'])) {
        $subtotal = $harga * $jumlah;
        $insert = mysqli_query($konek, "INSERT INTO transaksi_detail VALUES ('$id_transaksi', '$kode', '$jumlah', '$subtotal')");
    }
    else {
        $cekjumlah = mysqli_query($konek, "SELECT jumlah_barang FROM transaksi_detail WHERE kode_barang = '$kode' AND id_transaksi = $id_transaksi");
        $lama = mysqli_fetch_assoc($cekjumlah);
        $oldjumlah = $lama['jumlah_barang'];
        $newjumlah = $oldjumlah + $jumlah;
        $tambah = mysqli_query($konek, "UPDATE transaksi_detail SET jumlah_barang = $newjumlah WHERE kode_barang = '$kode' AND id_transaksi = $id_transaksi");
        $subtotal = mysqli_query($konek, "UPDATE transaksi_detail SET total_harga = $newjumlah * $harga WHERE kode_barang = '$kode' AND id_transaksi = $id_transaksi");
    }
    $update_stok = mysqli_query($konek, "UPDATE tb_barang SET stok_barang = stok_barang - $jumlah WHERE kode_barang = '$kode'");

    header("location:input_transaksi_dan_tampilkan_bayar.php");
}
else {
    $_SESSION['jumlah'] = 1;
    header("location:input_transaksi_dan_tampilkan_bayar.php");
}

 ?>