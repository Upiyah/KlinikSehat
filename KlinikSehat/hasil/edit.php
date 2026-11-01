<?php

// Koneksi database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";
/** @var mysqli $koneksi */


// Mengambil ID hasil pemeriksaan yang akan diedit
$id = $_GET['id'];


// Mengambil data hasil pemeriksaan berdasarkan ID
$data = mysqli_query($koneksi,"
SELECT * FROM hasil_pemeriksaan 
WHERE id_hasil='$id'
");

$row = mysqli_fetch_assoc($data);


// Mengambil data jadwal pemeriksaan (pasien dan dokter)
$jadwal = mysqli_query($koneksi,"
SELECT 
jadwal_pemeriksaan.id_jadwal,
jadwal_pemeriksaan.tanggal,
jadwal_pemeriksaan.jam,
pasien.nama_pasien,
dokter.nama_dokter

FROM jadwal_pemeriksaan

JOIN pasien 
ON pasien.id_pasien = jadwal_pemeriksaan.id_pasien

JOIN dokter 
ON dokter.id_dokter = jadwal_pemeriksaan.id_dokter

ORDER BY tanggal DESC, jam DESC
");

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Hasil Pemeriksaan</title>


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

textarea{
    resize:none;
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


<!-- Form edit hasil pemeriksaan -->
<div class="card shadow-lg">


<div class="card-header bg-primary text-white">

<h3 class="text-center mb-0">

<i class="bi bi-pencil-square"></i>

Edit Hasil Pemeriksaan

</h3>

</div>


<div class="card-body">


<!-- Mengirim data update ke update.php -->
<form action="update.php" method="POST">


<!-- Menyimpan ID hasil pemeriksaan -->
<input type="hidden" name="id_hasil" value="<?= $row['id_hasil']; ?>">



<div class="mb-3">

<label class="form-label fw-bold">
Jadwal Pemeriksaan
</label>


<!-- Menampilkan daftar jadwal pemeriksaan -->
<select name="id_jadwal" class="form-select" required>


<?php while($j=mysqli_fetch_assoc($jadwal)){ ?>


<option 
value="<?= $j['id_jadwal']; ?>"
<?= ($row['id_jadwal']==$j['id_jadwal']) ? 'selected' : ''; ?>
>

<?= $j['nama_pasien']; ?> -
<?= $j['nama_dokter']; ?> |
<?= $j['tanggal']; ?> |
<?= $j['jam']; ?>

</option>


<?php } ?>


</select>

</div>




<div class="mb-3">

<label class="form-label fw-bold">
Diagnosa
</label>


<textarea 
name="diagnosa"
class="form-control"
rows="3"
required><?= $row['diagnosa']; ?></textarea>

</div>




<div class="mb-3">

<label class="form-label fw-bold">
Tindakan
</label>


<textarea 
name="tindakan"
class="form-control"
rows="3"
required><?= $row['tindakan']; ?></textarea>

</div>




<div class="mb-4">

<label class="form-label fw-bold">
Resep
</label>


<textarea 
name="resep"
class="form-control"
rows="3"><?= $row['resep']; ?></textarea>

</div>




<div class="d-flex justify-content-between">


<!-- Kembali ke halaman data -->
<a href="index.php" class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>



<!-- Menyimpan perubahan data -->
<button type="submit" class="btn btn-warning">

<i class="bi bi-save"></i>

Update Hasil

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