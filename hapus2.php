<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$pembacaan_meter = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pembacaan_meter where id_pembacaan_meter ='$pembacaan_meter'");

 
// mengalihkan halaman kembali ke index.php
header("location:pembacaan.php");
 
?>