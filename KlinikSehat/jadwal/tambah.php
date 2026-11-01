<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */


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


<title>Tambah Jadwal Pemeriksaan</title>


<!-- Bootstrap untuk tampilan halaman -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Bootstrap Icons -->
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


<!-- Form tambah jadwal pemeriksaan -->
<div class="card shadow-lg">


<div class="card-header bg-primary text-white">


<h3 class="text-center mb-0">

<i class="bi bi-calendar-plus"></i>

Tambah Jadwal Pemeriksaan

</h3>


</div>


<div class="card-body">


<!-- Mengirim data ke simpan.php -->
<form action="simpan.php" method="POST">



<!-- Pilihan pasien -->
<div class="mb-3">


<label class="form-label fw-bold">
Nama Pasien
</label>


<select name="id_pasien" class="form-select" required>


<option value="">
-- Pilih Pasien --
</option>



<?php while($p=mysqli_fetch_assoc($pasien)){ ?>


<option value="<?= $p['id_pasien']; ?>">

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


<option value="">
-- Pilih Dokter --
</option>



<?php while($d=mysqli_fetch_assoc($dokter)){ ?>


<option value="<?= $d['id_dokter']; ?>">

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


<option value="">
-- Pilih Status --
</option>


<option value="Menunggu">
Menunggu
</option>


<option value="Selesai">
Selesai
</option>


<option value="Batal">
Batal
</option>


</select>


</div>




<div class="d-flex justify-content-between">


<!-- Kembali ke halaman jadwal -->
<a href="index.php" class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>



<!-- Menyimpan data jadwal -->
<button type="submit" class="btn btn-success">

<i class="bi bi-save"></i>

Simpan Jadwal

</button>


</div>


</form>


</div>


</div>


</div>


</div>


</div>


<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>