<?php
include('koneksi.php');

// Ambil data dari form
$id_pembacaan_meter = $_POST['id_pembacaan_meter'];
$tanggal_pembacaan = $_POST['tanggal_pembacaan'];

// Update data ke database
$query = "UPDATE pembacaan_meter SET 
    tanggal_pembacaan = '$tanggal_pembacaan' 
WHERE id_pembacaan_meter = '$id_pembacaan_meter'";

if ($koneksi->query($query)) {
    header("location: pembacaan.php");
} else {
    echo "Data Gagal Diupdate!";
}
?>

