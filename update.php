<?php
include('koneksi.php');

// Ambil data dari form
$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$gmail = $_POST['gmail'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];
$no_telepon = $_POST['no_telepon'];
$password = $_POST['password'];

// Update data ke database
$query = "UPDATE pelanggan SET 
    nama_pelanggan = '$nama_pelanggan', 
    gmail = '$gmail', 
    alamat_pelanggan = '$alamat_pelanggan', 
    no_telepon = '$no_telepon', 
    password = '$password' 
WHERE id_pelanggan = '$id_pelanggan'";

if ($koneksi->query($query)) {
    header("location: pengguna.php");
} else {
    echo "Data Gagal Diupdate!";
}
?>