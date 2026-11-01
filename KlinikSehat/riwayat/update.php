<?php

include "../config/koneksi.php";
include "../config/auth.php";
/** @var mysqli $koneksi */

$id_hasil = $_POST['id_hasil'];
$diagnosa = $_POST['diagnosa'];
$tindakan = $_POST['tindakan'];
$resep = $_POST['resep'];

$query = mysqli_query($koneksi, "
UPDATE hasil_pemeriksaan SET
    diagnosa = '$diagnosa',
    tindakan = '$tindakan',
    resep = '$resep'
WHERE id_hasil = '$id_hasil'
");


if($query){

    echo "
    <script>
        alert('Data hasil pemeriksaan berhasil diperbarui');
        window.location='index.php';
    </script>
    ";

}else{

    echo "
    <script>
        alert('Data gagal diperbarui: ".mysqli_error($koneksi)."');
        window.history.back();
    </script>
    ";

}

?>