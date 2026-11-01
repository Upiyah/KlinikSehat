<?php

// Koneksi database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */


// Mengambil ID data hasil pemeriksaan yang akan dihapus
$id = $_GET['id'];


// Menghapus data hasil pemeriksaan berdasarkan ID
$query = mysqli_query($koneksi,"

DELETE FROM hasil_pemeriksaan

WHERE id_hasil='$id'

");


// Mengecek apakah proses hapus berhasil
if($query){

    // Pesan berhasil dan kembali ke halaman data
    echo "
    <script>
        alert('Data hasil pemeriksaan berhasil dihapus');
        window.location='index.php';
    </script>
    ";

}else{

    // Pesan gagal dan kembali ke halaman data
    echo "
    <script>
        alert('Data gagal dihapus');
        window.location='index.php';
    </script>
    ";

}

?>