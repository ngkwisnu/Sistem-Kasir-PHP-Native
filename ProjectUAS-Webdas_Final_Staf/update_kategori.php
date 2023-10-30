<?php 
include '../ProjectUAS-Webdas_Final_Login_LogOut/database.php';
$id = $_POST['id'];
$nama = $_POST['nama'];

//update data ke database
mysqli_query($konek, "update kategori_barang set nama_kategori = '$nama' where id_kategori = '$id'");
//mengalihkan halaman kembali ke index.php
header("location:tambahkategori.php");
 ?>