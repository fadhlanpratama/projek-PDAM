<?php 
    session_start();
    include 'koneksi.php';
 
    // menangkap data yang dikirim dari form login
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $password = $_POST['password'];
 
    // menyeleksi data pada tabel admin dengan username dan password yang sesuai
    $data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan' and password='$password'");
 
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
 
    if($cek > 0){
        $_SESSION['nama_pelanggan'] = $nama_pelanggan;
        $_SESSION['status'] = "login";
        header("location:dashbord.php");
    }
    else{
        
        echo "<script> alert ('login gagal ! id_pelanggan dan password tidak benar ');</script>";
        echo "<script> window.location ='formlogin.php';</script>";
    }
?>