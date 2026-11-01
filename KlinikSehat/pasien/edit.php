<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */


// Mengambil ID pasien yang akan diedit
$id = $_GET['id'];


// Mengambil data pasien berdasarkan ID
$data = mysqli_query($koneksi, "
SELECT * FROM pasien 
WHERE id_pasien='$id'
");


$row = mysqli_fetch_assoc($data);


// Mengecek apakah data pasien tersedia
if(!$row){

    echo "<script>
            alert('Data pasien tidak ditemukan');
            window.location='index.php';
          </script>";

    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Edit Data Pasien - Klinik Sehat</title>


<!-- Bootstrap untuk tampilan halaman -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


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


<!-- Form edit data pasien -->
<div class="card shadow-lg">


<div class="card-header bg-warning text-dark">


<h3 class="text-center mb-0">

<i class="bi bi-pencil-square"></i>

Edit Data Pasien

</h3>


</div>



<div class="card-body">


<!-- Mengirim data perubahan ke update.php -->
<form action="update.php" method="POST">


<!-- Menyimpan ID pasien -->
<input type="hidden" name="id" value="<?= $row['id_pasien']; ?>">



<!-- Input nama pasien -->
<div class="mb-3">

<label class="form-label fw-bold">
Nama Pasien
</label>


<input
type="text"
name="nama_pasien"
class="form-control"
value="<?= htmlspecialchars($row['nama_pasien']); ?>"
required>


</div>




<div class="row">


<!-- Pilihan jenis kelamin -->
<div class="col-md-6">

<div class="mb-3">


<label class="form-label fw-bold">
Jenis Kelamin
</label>


<select
name="jenis_kelamin"
class="form-select"
required>


<option value="L" <?= ($row['jenis_kelamin']=="L") ? "selected" : ""; ?>>
Laki-laki
</option>


<option value="P" <?= ($row['jenis_kelamin']=="P") ? "selected" : ""; ?>>
Perempuan
</option>


</select>


</div>

</div>



<!-- Input tanggal lahir -->
<div class="col-md-6">


<div class="mb-3">


<label class="form-label fw-bold">
Tanggal Lahir
</label>


<input
type="date"
name="tanggal_lahir"
class="form-control"
value="<?= $row['tanggal_lahir']; ?>"
required>


</div>


</div>


</div>





<!-- Input alamat pasien -->
<div class="mb-3">


<label class="form-label fw-bold">
Alamat
</label>


<textarea
name="alamat"
class="form-control"
rows="4"><?= htmlspecialchars($row['alamat']); ?></textarea>


</div>




<!-- Input nomor HP -->
<div class="mb-4">


<label class="form-label fw-bold">
Nomor HP
</label>


<input
type="text"
name="no_hp"
class="form-control"
value="<?= htmlspecialchars($row['no_hp']); ?>">


</div>




<div class="d-flex justify-content-between">


<!-- Kembali ke halaman data -->
<a href="index.php" class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>



<!-- Update data pasien -->
<button type="submit" class="btn btn-warning text-dark">

<i class="bi bi-pencil-square"></i>

Update Data

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