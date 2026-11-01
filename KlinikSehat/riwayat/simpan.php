<?php

include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */

// Mengambil data dari form
$id_pasien = mysqli_real_escape_string($koneksi, $_POST['id_pasien']);
$id_dokter = mysqli_real_escape_string($koneksi, $_POST['id_dokter']);
$tanggal_berobat = mysqli_real_escape_string($koneksi, $_POST['tanggal_berobat']);
$jam_berobat = mysqli_real_escape_string($koneksi, $_POST['jam_berobat']);
$obat = mysqli_real_escape_string($koneksi, $_POST['obat']);

// Simpan ke database
$query = mysqli_query($koneksi, "
INSERT INTO riwayat_berobat
(
    id_pasien,
    id_dokter,
    tanggal_berobat,
    jam_berobat,
    obat
)
VALUES
(
    '$id_pasien',
    '$id_dokter',
    '$tanggal_berobat',
    '$jam_berobat',
    '$obat'
)
");

if($query){

    echo "
    <script>
        alert('Data riwayat berobat berhasil disimpan');
        window.location='index.php';
    </script>
    ";

}else{

    echo "
    <script>
        alert('Data gagal disimpan!');
    </script>";

    die(mysqli_error($koneksi));

}
?>