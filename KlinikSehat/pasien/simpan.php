<?php

// Menghubungkan database
include "../config/koneksi.php";

/** @var mysqli $koneksi */


// Mengambil data pasien dari form
$nama            = $_POST['nama_pasien'];
$jenis_kelamin   = $_POST['jenis_kelamin'];
$tanggal_lahir   = $_POST['tanggal_lahir'];
$alamat          = $_POST['alamat'];
$no_hp           = $_POST['no_hp'];


// Menyimpan data pasien ke database
$query = mysqli_query($koneksi, "
INSERT INTO pasien
(nama_pasien, jenis_kelamin, tanggal_lahir, alamat, no_hp)
VALUES
('$nama', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$no_hp')
");


// Mengecek apakah data berhasil disimpan
if ($query) {

    // Pesan berhasil dan kembali ke halaman data pasien
    echo "<script>
            alert('Data pasien berhasil ditambahkan');
            window.location='index.php';
          </script>";

} else {

    // Menampilkan pesan jika penyimpanan gagal
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);

}

?>