<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */


// Mengambil data input dari form tambah dokter
$nama_dokter = $_POST['nama_dokter'];
$spesialis = $_POST['spesialis'];
$no_hp = $_POST['no_hp'];



// Menyimpan data dokter ke dalam tabel dokter
$query = mysqli_query($koneksi, "

INSERT INTO dokter
(
    nama_dokter,
    spesialis,
    no_hp
)

VALUES
(
    '$nama_dokter',
    '$spesialis',
    '$no_hp'
)

");



// Mengecek apakah proses penyimpanan berhasil
if($query){


// Jika berhasil, tampilkan pesan dan kembali ke halaman data dokter
echo "

<script>

alert('Data dokter berhasil disimpan');

window.location='index.php';

</script>

";


}else{


// Jika gagal, tampilkan pesan error dan kembali ke form
echo "

<script>

alert('Data dokter gagal disimpan: ".mysqli_error($koneksi)."');

window.history.back();

</script>

";


}


?>