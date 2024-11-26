<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama_pelanggan= $_POST['nama_pelanggan'];
$gmail= $_POST['gmail'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];
$tanggal_bergabung =$_POST['tanggal_bergabung'];
$no_telepon = $_POST['no_telepon'];
$password =$_POST['password'];

// menginput data ke database
mysqli_query($koneksi,"insert into pelanggan (nama_pelanggan, gmail, alamat_pelanggan, tanggal_bergabung, no_telepon, password) values('$nama_pelanggan','$gmail','$alamat_pelanggan','$tanggal_bergabung','$no_telepon','$password')");
 
// mengalihkan halaman kembali ke index.php
header("location:pengguna.php");
 
?>