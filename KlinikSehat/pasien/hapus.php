<?php

// Menghubungkan database
include "../config/koneksi.php";

/** @var mysqli $koneksi */


// Mengambil ID pasien yang akan dihapus
$id = $_GET['id'];


// Menghapus data pasien berdasarkan ID
$query = mysqli_query(
    $koneksi,
    "DELETE FROM pasien WHERE id_pasien='$id'"
);



// Mengecek apakah proses hapus berhasil
if($query){

    // Pesan berhasil dan kembali ke halaman data pasien
    echo "
    <script>
    alert('Data berhasil dihapus');
    window.location='index.php';
    </script>
    ";

}else{

    // Pesan gagal dan menampilkan error database
    echo "
    <script>
    alert('Gagal hapus: ".mysqli_error($koneksi)."');
    window.history.back();
    </script>
    ";

}

?>