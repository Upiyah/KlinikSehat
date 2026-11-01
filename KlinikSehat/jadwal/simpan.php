<?php

// Menghubungkan database
include "../config/koneksi.php";

/** @var mysqli $koneksi */


// Mengambil data jadwal dari form
$id_pasien = $_POST['id_pasien'];
$id_dokter = $_POST['id_dokter'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$status = $_POST['status'];



// Menyimpan data jadwal pemeriksaan ke database
$query = mysqli_query($koneksi, "

INSERT INTO jadwal_pemeriksaan
(
    id_pasien,
    id_dokter,
    tanggal,
    jam,
    status
)

VALUES
(
    '$id_pasien',
    '$id_dokter',
    '$tanggal',
    '$jam',
    '$status'
)

");



// Mengecek apakah data berhasil ditambahkan
if($query){

    // Pesan berhasil dan kembali ke halaman jadwal
    echo "
    <script>
        alert('Jadwal pemeriksaan berhasil ditambahkan.');
        window.location='index.php';
    </script>
    ";

}else{

    // Pesan gagal dan menampilkan error database
    echo "
    <script>
        alert('Jadwal pemeriksaan gagal ditambahkan.');
    </script>
    ";

    echo "<br><b>Error MySQL :</b> ".mysqli_error($koneksi);

}

?>