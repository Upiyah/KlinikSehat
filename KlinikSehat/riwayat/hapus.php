<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */

// Cek apakah ID dikirim
if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Hapus data hasil pemeriksaan
    $query = mysqli_query($koneksi, "
        DELETE FROM hasil_pemeriksaan
        WHERE id_hasil='$id'
    ");

    if($query){

        echo "
        <script>
            alert('Data riwayat berobat berhasil dihapus');
            window.location='index.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Data gagal dihapus');
            window.location='index.php';
        </script>
        ";

        echo mysqli_error($koneksi);
    }

}else{

    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location='index.php';
    </script>
    ";

}
?>