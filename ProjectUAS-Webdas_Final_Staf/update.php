<?php 
include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
$kode = $_POST['kode'];
$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

//update data ke database
mysqli_query($konek, "update tb_barang set nama_barang = '$nama', id_kategori = '$id', harga_barang = '$harga', stok_barang = '$stok' where kode_barang = '$kode'");
//mengalihkan halaman kembali ke index.php
header("location:LIst_barang.php");
 ?>