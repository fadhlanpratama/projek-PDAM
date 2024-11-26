<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_pelanggan = $_POST['id_pelanggan'];
$id_meter_air = $_POST['id_meter_air'];
$tanggal_pembacaan =$_POST['tanggal_pembacaan'];

// menginput data ke database
mysqli_query($koneksi,"insert into pembacaan_meter (id_pelanggan, id_meter_air, tanggal_pembacaan) values('$id_pelanggan','$id_meter_air','$tanggal_pembacaan')");
 
// mengalihkan halaman kembali ke index.php
header("location:pembacaan.php");
 
?>