<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */


// Mengambil ID jadwal yang akan diedit
$id = $_GET['id'];


// Mengambil data jadwal berdasarkan ID
$query = mysqli_query($koneksi, "
SELECT * FROM jadwal_pemeriksaan 
WHERE id_jadwal='$id'
");

$row = mysqli_fetch_assoc($query);


// Mengecek apakah data tersedia
if(!$row){

    echo "<script>
            alert('Data jadwal tidak ditemukan!');
            window.location='index.php';
          </script>";
    exit;

}


// Mengambil data pasien dan dokter untuk pilihan form
$pasien = mysqli_query($koneksi, "
SELECT * FROM pasien 
ORDER BY nama_pasien ASC
");


$dokter = mysqli_query($koneksi, "
SELECT * FROM dokter 
ORDER BY nama_dokter ASC
");

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Edit Jadwal Pemeriksaan</title>


<!-- Bootstrap untuk tampilan halaman -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


<style>

body{
    background:#f4f6f9;
}

.card{
    border:none;
    border-radius:15px;
}

.card-header{
    border-radius:15px 15px 0 0 !important;
}

.form-control,
.form-select{
    border-radius:10px;
}

.btn{
    border-radius:10px;
}

</style>


</head>


<body>


<div class="container mt-5">


<div class="row justify-content-center">


<div class="col-md-8">


<!-- Form edit jadwal pemeriksaan -->
<div class="card shadow-lg">


<div class="card-header bg-warning text-dark">


<h3 class="text-center mb-0">

<i class="bi bi-pencil-square"></i>

Edit Jadwal Pemeriksaan

</h3>


</div>


<div class="card-body">


<!-- Mengirim data perubahan ke update.php -->
<form action="update.php" method="POST">


<!-- Menyimpan ID jadwal -->
<input type="hidden" name="id" value="<?= $row['id_jadwal']; ?>">



<!-- Pilihan pasien -->
<div class="mb-3">

<label class="form-label fw-bold">
Nama Pasien
</label>


<select name="id_pasien" class="form-select" required>


<?php while($p=mysqli_fetch_assoc($pasien)){ ?>


<option value="<?= $p['id_pasien']; ?>"
<?= ($row['id_pasien']==$p['id_pasien'])?'selected':''; ?>>

<?= $p['nama_pasien']; ?>

</option>


<?php } ?>


</select>


</div>



<!-- Pilihan dokter -->
<div class="mb-3">

<label class="form-label fw-bold">
Nama Dokter
</label>


<select name="id_dokter" class="form-select" required>


<?php while($d=mysqli_fetch_assoc($dokter)){ ?>


<option value="<?= $d['id_dokter']; ?>"
<?= ($row['id_dokter']==$d['id_dokter'])?'selected':''; ?>>

<?= $d['nama_dokter']; ?>

</option>


<?php } ?>


</select>


</div>




<!-- Input tanggal dan jam pemeriksaan -->
<div class="row">


<div class="col-md-6">

<div class="mb-3">

<label class="form-label fw-bold">
Tanggal
</label>


<input
type="date"
name="tanggal"
class="form-control"
value="<?= $row['tanggal']; ?>"
required>

</div>

</div>



<div class="col-md-6">

<div class="mb-3">

<label class="form-label fw-bold">
Jam
</label>


<input
type="time"
name="jam"
class="form-control"
value="<?= $row['jam']; ?>"
required>

</div>

</div>


</div>




<!-- Pilihan status jadwal -->
<div class="mb-4">

<label class="form-label fw-bold">
Status
</label>


<select name="status" class="form-select" required>


<option value="Menunggu" <?= ($row['status']=="Menunggu")?'selected':''; ?>>
Menunggu
</option>


<option value="Selesai" <?= ($row['status']=="Selesai")?'selected':''; ?>>
Selesai
</option>


<option value="Batal" <?= ($row['status']=="Batal")?'selected':''; ?>>
Batal
</option>


</select>


</div>




<div class="d-flex justify-content-between">


<!-- Kembali ke halaman data -->
<a href="index.php" class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>



<!-- Menyimpan perubahan jadwal -->
<button type="submit" class="btn btn-warning">

<i class="bi bi-pencil-square"></i>

Update Jadwal

</button>


</div>


</form>


</div>


</div>


</div>


</div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>