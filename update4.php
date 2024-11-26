<?php
include('koneksi.php');

// Ambil data dari form
$id_pembayaran = $_POST['id_pembayaran'];
$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$jumlah_pembayaran = $_POST['jumlah_pembayaran'];

// Update data ke database
$query = "UPDATE pembayaran SET 
    id_pembayaran= '$id_pembayaran', 
    tanggal_pembayaran = '$tanggal_pembayaran', 
    metode_pembayaran = '$metode_pembayaran', 
    jumlah_pembayaran = '$jumlah_pembayaran' 
WHERE id_pembayaran = '$id_pembayaran'";

if ($koneksi->query($query)) {
    header("location: pembayaran.php");
} else {
    echo "Data Gagal Diupdate!";
}
?>
