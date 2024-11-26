<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$pelanggan = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pelanggan where id_pelanggan ='$pelanggan'");

 
// mengalihkan halaman kembali ke index.php
header("location:pengguna.php");
 
?>