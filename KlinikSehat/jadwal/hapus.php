<?php

// Menghubungkan database
include "../config/koneksi.php";

/** @var mysqli $koneksi */


// Mengecek apakah ID jadwal tersedia
if(isset($_GET['id'])){


    // Mengambil ID jadwal yang akan dihapus
    $id = $_GET['id'];


    // Menghapus data jadwal berdasarkan ID
    $query = mysqli_query($koneksi, "
    DELETE FROM jadwal_pemeriksaan 
    WHERE id_jadwal='$id'
    ");



    // Mengecek keberhasilan proses hapus
    if($query){


        // Pesan berhasil dan kembali ke halaman data
        echo "
        <script>
            alert('Jadwal pemeriksaan berhasil dihapus.');
            window.location='index.php';
        </script>
        ";


    }else{


        // Pesan gagal dan menampilkan error database
        echo "
        <script>
            alert('Jadwal pemeriksaan gagal dihapus.');
            window.location='index.php';
        </script>
        ";

        echo "<br><b>Error MySQL :</b> ".mysqli_error($koneksi);


    }


}else{


    // Jika ID tidak ditemukan
    echo "
    <script>
        alert('ID jadwal tidak ditemukan.');
        window.location='index.php';
    </script>
    ";


}

?>