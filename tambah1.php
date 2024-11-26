<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-success {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
</head>
<body>

    <!-- Tombol Kembali -->
    <form method="POST" action="meter_air.php">
        <button type="input" class="btn btn-success">Kembali</button>
    </form>

    <div class="container">
        <h3>Tambah Data Pengguna</h3>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="inputuser1.php">
                    <table class="table table-bordered bg-white">
                        <tr>
                            <td>ID Pelanggan</td>
                            <td><input class="form-control" type="text" name="id_pelanggan" required></td>
                        </tr>
                        <tr>
                            <td>Nomor Meter</td>
                            <td><input class="form-control" type="text" name="nomor_meter" required></td>
                        </tr>
                        <tr>
                            <td>Lokasi Pemasangan</td>
                            <td><input class="form-control" type="text" name="lokasi_pemasangan" required></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><input class="form-control" type="text" name="status" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2F1OShmjWlKT9MLCLmePLOlNk2FkT1mGpDtvF0edxGq0FFoFnQkSYGJg77T" crossorigin="anonymous"></script>
</body>
</html>
