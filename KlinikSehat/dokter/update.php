<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";
/** @var mysqli $koneksi */


// Mengambil data yang dikirim dari form edit
$id_dokter = $_POST['id_dokter'];
$nama_dokter = $_POST['nama_dokter'];
$spesialis = $_POST['spesialis'];
$no_hp = $_POST['no_hp'];


// Memperbarui data dokter berdasarkan ID
$query = mysqli_query($koneksi, "

UPDATE dokter SET

nama_dokter='$nama_dokter',

spesialis='$spesialis',

no_hp='$no_hp'

WHERE id_dokter='$id_dokter'

");


// Mengecek apakah proses update berhasil
if($query){

    // Menampilkan pesan berhasil dan kembali ke halaman data dokter
    echo "

    <script>

    alert('Data dokter berhasil diperbarui');

    window.location='index.php';

    </script>

    ";

}else{

    // Menampilkan pesan gagal dan kembali ke halaman sebelumnya
    echo "

    <script>

    alert('Data dokter gagal diperbarui');

    window.history.back();

    </script>

    ";

}

?>