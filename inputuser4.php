<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_pelanggan = $_POST['id_pelanggan'];
$id_tagihan = $_POST['id_tagihan'];
$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$jumlah_pembayaran =$_POST['jumlah_pembayaran'];

// menginput data ke database
mysqli_query($koneksi,"insert into pembayaran (id_pelanggan, id_tagihan, tanggal_pembayaran, metode_pembayaran, jumlah_pembayaran) values('$id_pelanggan','$id_tagihan','$tanggal_pembayaran','$metode_pembayaran','$jumlah_pembayaran')");
 
// mengalihkan halaman kembali ke index.php
header("location:pembayaran.php");
 
?>