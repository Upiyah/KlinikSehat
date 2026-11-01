<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */


// Mengambil data hasil pemeriksaan dari form edit
$id_hasil = $_POST['id_hasil'];
$id_jadwal = $_POST['id_jadwal'];
$diagnosa = $_POST['diagnosa'];
$tindakan = $_POST['tindakan'];
$resep = $_POST['resep'];



// Memperbarui data hasil pemeriksaan berdasarkan ID
$query = mysqli_query($koneksi, "

UPDATE hasil_pemeriksaan SET

id_jadwal='$id_jadwal',

diagnosa='$diagnosa',

tindakan='$tindakan',

resep='$resep'

WHERE id_hasil='$id_hasil'

");



// Mengecek apakah proses update berhasil
if($query){

    // Pesan berhasil dan kembali ke halaman data
    echo "
    <script>
        alert('Data hasil pemeriksaan berhasil diperbarui');
        window.location='index.php';
    </script>
    ";

}else{

    // Pesan gagal dan kembali ke halaman sebelumnya
    echo "
    <script>
        alert('Data gagal diperbarui');
        window.history.back();
    </script>
    ";

}

?>