<?php

session_start(); // Memulai session untuk menyimpan data login pengguna.

include "config/koneksi.php"; // Menghubungkan program ke database.

$username = $_POST['username']; // Mengambil username dari form login.
$password = $_POST['password']; // Mengambil password dari form login.

// Mengecek apakah username dan password sesuai dengan data pada tabel admin.
$query = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password'");

$data = mysqli_fetch_array($query);

// Jika data ditemukan, simpan informasi admin ke session lalu masuk ke dashboard.
if(mysqli_num_rows($query)>0){

    $_SESSION['username']=$data['username'];
    $_SESSION['nama_admin']=$data['nama_admin'];

    header("Location: dashboard.php");

}else{

    // Jika login gagal, tampilkan pesan kesalahan dan kembali ke halaman login.
    echo "<script>
    alert('Username atau Password Salah');
    window.location='login.php';
    </script>";

}
?>