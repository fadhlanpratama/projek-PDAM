<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$tagihan = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from tagihan where id_tagihan ='$tagihan'");

 
// mengalihkan halaman kembali ke index.php
header("location:tagihan.php");
 
?>