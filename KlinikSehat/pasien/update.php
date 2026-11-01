<?php

// Menghubungkan database
include "../config/koneksi.php";

/** @var mysqli $koneksi */


// Mengambil data dari form edit
$id = $_POST['id'];
$nama_pasien = $_POST['nama_pasien'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];


// Memperbarui data pasien di database
$query = mysqli_query($koneksi, "
    UPDATE pasien SET
    nama_pasien = '$nama_pasien',
    jenis_kelamin = '$jenis_kelamin',
    tanggal_lahir = '$tanggal_lahir',
    alamat = '$alamat',
    no_hp = '$no_hp'
    WHERE id_pasien = '$id'
");


// Mengecek apakah proses update berhasil
if($query){

    // Pesan berhasil dan kembali ke halaman data pasien
    echo "
    <script>
        alert('Data pasien berhasil diupdate');
        window.location='index.php';
    </script>
    ";

}else{

    // Pesan gagal dan kembali ke halaman edit
    echo "
    <script>
        alert('Data pasien gagal diupdate');
        window.location='edit.php?id=$id';
    </script>
    ";

    // Menampilkan error database
    echo mysqli_error($koneksi);

}

?>