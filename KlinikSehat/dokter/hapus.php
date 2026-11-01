<?php


include "../config/koneksi.php";
include "../config/auth.php";
/** @var mysqli $koneksi */

$id_dokter = $_GET['id'] ?? null;



if(!$id_dokter){

    header("Location:index.php");

    exit;

}



mysqli_begin_transaction($koneksi);



try{


    // Hapus jadwal dokter terlebih dahulu

    $stmt = $koneksi->prepare(
        "DELETE FROM jadwal_dokter WHERE id_dokter=?"
    );


    $stmt->bind_param(
        "i",
        $id_dokter
    );


    $stmt->execute();




    // Hapus data dokter

    $stmt = $koneksi->prepare(
        "DELETE FROM dokter WHERE id_dokter=?"
    );


    $stmt->bind_param(
        "i",
        $id_dokter
    );


    $stmt->execute();



    mysqli_commit($koneksi);



    echo "

    <script>

    alert('Data dokter berhasil dihapus');

    window.location='index.php';

    </script>

    ";



}catch(Exception $e){



    mysqli_rollback($koneksi);



    echo "

    <script>

    alert('Data dokter gagal dihapus');

    window.location='index.php';

    </script>

    ";


}


?>