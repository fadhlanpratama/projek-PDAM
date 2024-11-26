<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Login PDAM</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    body {
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-form {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    .login-form h3 {
      text-align: center;
      margin-bottom: 10px;
      font-weight: bold;
      color: #28a745;
    }
    .login-form p {
      text-align: center;
      color: #6c757d;
      font-size: 14px;
      margin-bottom: 20px;
    }
    .btn-custom {
      width: 100%;
    }
    .btn-login {
      background-color: #28a745;
      color: #fff;
      border: none;
    }
    .btn-cancel {
      background-color: #dc3545;
      color: #fff;
      border: none;
    }
    .btn-login:hover, .btn-cancel:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>
  <div class="login-form">
    <h3>Selamat Datang di Sistem PDAM</h3>
    <p>Silakan login untuk mengakses informasi dan layanan pelanggan. Kami siap melayani Anda dengan sepenuh hati!</p>
    <form method="POST" action="ceklogin.php">
      <div class="mb-3">
        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama_pelanggan" placeholder="Masukkan nama anda" name="nama_pelanggan" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Masukkan password anda" name="password" required>
      </div>
      <button type="submit" class="btn btn-login btn-custom">Login</button>
      <button type="button" class="btn btn-cancel btn-custom mt-2">Batal</button>
    </form>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2IuXJN42X8frMRYKRi0q2J1shlfxB4nEY1ZyM2GkNb6wWLTKL8Nf5o6p61d" crossorigin="anonymous"></script>
</body>
</html>
