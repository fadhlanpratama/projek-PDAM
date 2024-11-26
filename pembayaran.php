<?php 
session_start(); 
include 'koneksi.php'; // Make sure the connection file is in the same directory

$nama_pelanggan = isset($_SESSION['nama_pelanggan']) ? $_SESSION['nama_pelanggan'] : "Guest";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: bold;
        }
        .btn-add {
            display: flex;
            justify-content: flex-start;
            margin-top: 20px;
            margin-bottom: 15px;
        }
        .btn-add button {
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            padding: 10px 20px;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-add button:hover {
            background-color: #218838;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            padding: 15px;
        }
        .table th {
            background-color: #343a40;
            color: #fff;
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tr:hover {
            background-color: #d3d3d3;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
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
        <h1>Daftar Pembayaran</h1>
        
        <!-- Button Tambah -->
        <div class="btn-add">
            <form method="POST" action="tambah4.php">
                <button type="input" class="btn btn-success">Tambah Pembayaran</button> 
            </form>
        </div>

        <!-- Tabel Data -->
        <div class="table-container">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID Pembayaran</th>
                        <th>ID Tagihan</th>
                        <th>ID Pelanggan</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Metode Pembayaran</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $data = mysqli_query($koneksi, "SELECT * FROM pembayaran");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?php echo $d['id_pembayaran']; ?></td>
                        <td><?php echo $d['id_tagihan']; ?></td>
                        <td><?php echo $d['id_pelanggan']; ?></td>
                        <td><?php echo $d['tanggal_pembayaran']; ?></td>
                        <td><?php echo $d['metode_pembayaran']; ?></td>
                        <td><?php echo $d['jumlah_pembayaran']; ?></td>
                        <td>
                            <a role="button" class="btn btn-info btn-sm" href="ubah4.php?id=<?php echo $d['id_pembayaran']; ?>">Ubah</a>
                            <a role="button" class="btn btn-danger btn-sm" href="hapus4.php?id=<?php echo $d['id_pembayaran']; ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
