<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$meter_air = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from meter_air where id_meter_air ='$meter_air'");

 
// mengalihkan halaman kembali ke index.php
header("location:meter_air.php");
 
?>