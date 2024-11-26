<?php
include('koneksi.php');

// Ambil data dari form
$id_meter_air = $_POST['id_meter_air'];
$nomor_meter = $_POST['nomor_meter'];
$lokasi_pemasangan = $_POST['lokasi_pemasangan'];
$status = $_POST['status'];

// Update data ke database
$query = "UPDATE meter_air SET 
    nomor_meter= '$nomor_meter', 
    lokasi_pemasangan = '$lokasi_pemasangan', 
    status = '$status' 
WHERE id_meter_air = '$id_meter_air'";

if ($koneksi->query($query)) {
    header("location: meter_air.php");
} else {
    echo "Data Gagal Diupdate!";
}
?>
