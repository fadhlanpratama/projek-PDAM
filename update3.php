<?php
include('koneksi.php');

// Ambil data dari form
$id_tagihan = $_POST['id_tagihan'];
$jumlah_tagihan = $_POST['jumlah_tagihan'];
$periode = $_POST['periode'];
$status_pembayaran = $_POST['status_pembayaran'];

// Update data ke database
$query = "UPDATE tagihan SET 
    jumlah_tagihan = '$jumlah_tagihan', 
    periode = '$periode', 
    status_pembayaran = '$status_pembayaran' 
WHERE id_tagihan = '$id_tagihan'";


if ($koneksi->query($query)) {
    header("location: tagihan.php");
} else {
    echo "Data Gagal Diupdate!";
}
?>

