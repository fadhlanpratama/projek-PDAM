<?php 
session_start(); 
$nama_pelanggan = isset($_SESSION['nama_pelanggan']) ? $_SESSION['nama_pelanggan'] : "Guest";

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "tugas_pdam");

// Periksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mendapatkan jumlah pengguna
$result_pengguna = mysqli_query($conn, "SELECT COUNT(*) FROM pelanggan");
if (!$result_pengguna) {
    die('Query Error: ' . mysqli_error($conn));
}
$jumlah_pengguna = mysqli_fetch_array($result_pengguna)[0];

// Query untuk mendapatkan jumlah meter air
$result_meter_air = mysqli_query($conn, "SELECT COUNT(*) FROM meter_air");
if (!$result_meter_air) {
    die('Query Error: ' . mysqli_error($conn));
}
$jumlah_meter_air = mysqli_fetch_array($result_meter_air)[0];

// Query untuk mendapatkan jumlah pembacaan meter
$result_pembacaan_meter = mysqli_query($conn, "SELECT COUNT(*) FROM pembacaan_meter");
if (!$result_pembacaan_meter) {
    die('Query Error: ' . mysqli_error($conn));
}
$jumlah_pembacaan_meter = mysqli_fetch_array($result_pembacaan_meter)[0];

// Query untuk mendapatkan jumlah tagihan
$result_tagihan = mysqli_query($conn, "SELECT COUNT(*) FROM tagihan");
if (!$result_tagihan) {
    die('Query Error: ' . mysqli_error($conn));
}
$jumlah_tagihan = mysqli_fetch_array($result_tagihan)[0];

// Query untuk mendapatkan jumlah pembayaran
$result_pembayaran = mysqli_query($conn, "SELECT COUNT(*) FROM pembayaran");
if (!$result_pembayaran) {
    die('Query Error: ' . mysqli_error($conn));
}
$jumlah_pembayaran = mysqli_fetch_array($result_pembayaran)[0];

// Query untuk mendapatkan jumlah pelanggan aktif berdasarkan status meter air
$result_aktif = mysqli_query($conn, "
    SELECT COUNT(*) 
    FROM pelanggan p
    INNER JOIN meter_air ma ON p.id_pelanggan = ma.id_pelanggan
    WHERE ma.status = 1
");
if (!$result_aktif) {
    die('Query Error: ' . mysqli_error($conn));
}
$jumlah_aktif = mysqli_fetch_array($result_aktif)[0];

// Query untuk mendapatkan jumlah pelanggan tidak aktif berdasarkan status meter air
$result_tidak_aktif = mysqli_query($conn, "
    SELECT COUNT(*) 
    FROM pelanggan p
    LEFT JOIN meter_air ma ON p.id_pelanggan = ma.id_pelanggan
    WHERE COALESCE(ma.status, 0) = 0
");

if (!$result_tidak_aktif) {
    die('Query Error: ' . mysqli_error($conn));
}
$jumlah_tidak_aktif = mysqli_fetch_array($result_tidak_aktif)[0];

// Query untuk mendapatkan data pelanggan dan status berdasarkan meter_air dan status pembayaran
$result_pelanggan = mysqli_query($conn, "
    SELECT p.id_pelanggan, p.nama_pelanggan, 
        IF(ma.id_pelanggan IS NOT NULL, 
           IF(ma.status = 1, 'Aktif', 'Tidak Aktif'), 
           'Tidak Aktif') AS status,
        IF(t.status_pembayaran = 1, 'Lunas', 'Belum Lunas') AS status_pembayaran
    FROM pelanggan p
    LEFT JOIN meter_air ma ON p.id_pelanggan = ma.id_pelanggan
    LEFT JOIN tagihan t ON p.id_pelanggan = t.id_pelanggan
");
if (!$result_pelanggan) {
    die('Query Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; padding: 20px; font-family: 'Arial', sans-serif; }
    .container { background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
    .table-container { margin-top: 20px; }
    h1 { text-align: center; margin-bottom: 30px; font-size: 2.5rem; font-weight: bold; }
    .card { border-radius: 15px; }
    .card-body { padding: 20px; }
    .card-title { font-size: 1.5rem; font-weight: bold; }
    .card h2 { font-size: 2.5rem; font-weight: bold; margin-top: 10px; }
    .card-footer { font-size: 0.9rem; color: #fff; font-weight: bold; }

    .gradient-1 { background: linear-gradient(45deg, #6a11cb, #2575fc); }
    .gradient-2 { background: linear-gradient(45deg, #ff6a00, #ee0979); }
    .gradient-3 { background: linear-gradient(45deg, #06beb6, #48b1bf); }
    .gradient-4 { background: linear-gradient(45deg, #f7971e, #ffd200); }
    .gradient-5 { background: linear-gradient(45deg, #667eea, #764ba2); }

    .table { margin-top: 30px; }
    .table th, .table td { text-align: center; padding: 15px; }
    .table th { background-color: #343a40; color: #fff; }
    .table tr:nth-child(even) { background-color: #f2f2f2; }
    .table tr:hover { background-color: #d3d3d3; }
  </style>
</head>
<body>  

  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Welcome, <?php echo $nama_pelanggan; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="dashbord.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengguna.php">Pengguna</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pembacaan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="meter_air.php">Meter Air</a></li>
            <li><a class="dropdown-item" href="pembacaan.php">Pembacaan Meter</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tagihan Dan Pembayaran
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tagihan.php">Tagihan</a></li>
            <li><a class="dropdown-item" href="pembayaran.php">Pembayaran</a></li>
          </ul>
        </li>
        <!-- Tombol Logout dengan konfirmasi -->
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="confirmLogout()">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  function confirmLogout() {
    // Menampilkan kotak dialog konfirmasi
    const result = confirm("Apakah Anda yakin ingin logout?");
    if (result) {
      // Jika pengguna mengklik 'OK', arahkan ke logout.php
      window.location.href = "logout.php";
    }
  }
</script>



  <!-- Main Container -->
  <div class="container">
    <h1>DASHBOARD</h1>
    
    <!-- Kotak untuk Menampilkan Angka -->
    <div class="row">
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card gradient-1 text-white">
          <div class="card-body">
            <h5 class="card-title">Semua Pelanggan</h5>
            <h2><?php echo $jumlah_pengguna; ?></h2>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card gradient-2 text-white">
          <div class="card-body">
            <h5 class="card-title">Pelanggan Aktif</h5>
            <h2><?php echo $jumlah_aktif; ?></h2>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card gradient-3 text-white">
          <div class="card-body">
            <h5 class="card-title">Pelanggan Tidak Aktif</h5>
            <h2><?php echo $jumlah_tidak_aktif; ?></h2>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabel Data Pelanggan -->
    <div class="table-container mt-4">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Status</th>
            <th>Status Pembayaran</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($result_pelanggan)): ?>
            <tr>
              <td><?php echo $row['id_pelanggan']; ?></td>
              <td><?php echo $row['nama_pelanggan']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td><?php echo $row['status_pembayaran']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
