<?php

// Menghubungkan database
include "../config/koneksi.php";

/** @var mysqli $koneksi */


// Mengambil data perubahan jadwal dari form edit
$id = $_POST['id'];
$id_pasien = $_POST['id_pasien'];
$id_dokter = $_POST['id_dokter'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$status = $_POST['status'];



// Memperbarui data jadwal pemeriksaan berdasarkan ID
$query = mysqli_query($koneksi, "

UPDATE jadwal_pemeriksaan SET

id_pasien = '$id_pasien',

id_dokter = '$id_dokter',

tanggal = '$tanggal',

jam = '$jam',

status = '$status'

WHERE id_jadwal = '$id'

");



// Mengecek apakah proses update berhasil
if($query){


    // Pesan berhasil dan kembali ke halaman jadwal
    echo "
    <script>
        alert('Jadwal pemeriksaan berhasil diperbarui.');
        window.location='index.php';
    </script>
    ";


}else{


    // Pesan gagal dan kembali ke halaman edit
    echo "
    <script>
        alert('Jadwal pemeriksaan gagal diperbarui.');
        window.location='edit.php?id=$id';
    </script>
    ";


    // Menampilkan pesan error database
    echo "<br><b>Error MySQL :</b> ".mysqli_error($koneksi);


}

?>