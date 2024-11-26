<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .back-link {
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .back-link a {
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
            background-color: #f4f4f4;
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .back-link a:hover {
            background-color: #eaeaea;
        }

        table {
            width: 100%;
            border-spacing: 10px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Data</h2>
        
        <h3>Data User</h3>
        <?php
        include 'koneksi.php';
        $meter_air = $_GET['id'];
        $data = mysqli_query($koneksi,"select * from meter_air where id_meter_air='$meter_air'");
        while($d = mysqli_fetch_array($data)){
        ?>
        <form method="post" action="update1.php">
            <table>
                <tr>            
                    <td>Nomor Meter</td>
                    <td>
                        <input type="hidden" name="id_meter_air" value="<?php echo $d['id_meter_air']; ?>">
                        <input type="text" name="nomor_meter" value="<?php echo $d['nomor_meter']; ?>">
                    </td>
                </tr>
                <tr>            
                    <td>Lokasi Pemasangan</td>
                    <td>
                        <input type="text" name="lokasi_pemasangan" value="<?php echo $d['lokasi_pemasangan']; ?>">
                    </td>
                </tr>
                <tr>            
                    <td>Status</td>
                    <td>
                        <input type="text" name="status" value="<?php echo $d['status']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>        
            </table>
        </form>
        <?php 
        }
        ?>
    </div>

    <div class="back-link">
        <a href="meter_air.php">KEMBALI</a>
    </div>
</body>
</html>
