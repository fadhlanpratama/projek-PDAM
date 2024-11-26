<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_pelanggan = $_POST['id_pelanggan'];
$nomor_meter = $_POST['nomor_meter'];
$lokasi_pemasangan =$_POST['lokasi_pemasangan'];
$status = $_POST['status'];

// menginput data ke database
mysqli_query($koneksi,"insert into meter_air (id_pelanggan, nomor_meter, lokasi_pemasangan, status) values('$id_pelanggan','$nomor_meter','$lokasi_pemasangan','$status')");
 
// mengalihkan halaman kembali ke index.php
header("location:meter_air.php");
 
?>