<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */


// Mengambil data hasil pemeriksaan dari form
$id_jadwal = $_POST['id_jadwal'];
$diagnosa = $_POST['diagnosa'];
$tindakan = $_POST['tindakan'];
$resep = $_POST['resep'];



// Menyimpan data hasil pemeriksaan ke database
$query = mysqli_query($koneksi, "

INSERT INTO hasil_pemeriksaan

(id_jadwal, diagnosa, tindakan, resep)

VALUES

('$id_jadwal',
'$diagnosa',
'$tindakan',
'$resep')

");



// Mengecek apakah data berhasil disimpan
if($query){

    // Pesan berhasil dan kembali ke halaman data
    echo "
    <script>
        alert('Data hasil pemeriksaan berhasil disimpan');
        window.location='index.php';
    </script>
    ";

}else{

    // Pesan gagal dan kembali ke halaman sebelumnya
    echo "
    <script>
        alert('Data gagal disimpan');
        window.history.back();
    </script>
    ";

}

?>