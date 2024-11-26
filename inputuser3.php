<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_pelanggan = $_POST['id_pelanggan'];
$id_meter_air = $_POST['id_meter_air'];
$id_pembacaan_meter = $_POST['id_pembacaan_meter'];
$jumlah_tagihan =$_POST['jumlah_tagihan'];
$periode =$_POST['periode'];
$status_pembayaran =$_POST['status_pembayaran'];

// menginput data ke database
mysqli_query($koneksi,"insert into tagihan (id_pelanggan, id_meter_air, id_pembacaan_meter, jumlah_tagihan, periode, status_pembayaran) values('$id_pelanggan','$id_meter_air','$id_pembacaan_meter','$jumlah_tagihan','$periode','$status_pembayaran')");
 
// mengalihkan halaman kembali ke index.php
header("location:tagihan.php");
 
?>