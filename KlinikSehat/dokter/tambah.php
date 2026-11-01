<?php

// Memanggil file autentikasi untuk pengecekan akses pengguna
include "../config/auth.php";

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Tambah Data Dokter - Klinik Sehat</title>


<!-- Menggunakan Bootstrap untuk desain tampilan -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Menggunakan Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


<style>

/* Mengatur background halaman */
body{
    background:#f4f6f9;
}


/* Mengatur tampilan card */
.card{
    border:none;
    border-radius:15px;
}


.card-header{
    border-radius:15px 15px 0 0 !important;
}


/* Mengatur bentuk input form */
.form-control{
    border-radius:10px;
}


/* Mengatur bentuk tombol */
.btn{
    border-radius:10px;
}

</style>


</head>


<body>


<div class="container mt-5">


<div class="row justify-content-center">


<div class="col-md-8">


<!-- Card form tambah dokter -->
<div class="card shadow-lg">


<!-- Header halaman -->
<div class="card-header bg-primary text-white">


<h3 class="text-center mb-0">

<i class="bi bi-person-plus-fill"></i>

Tambah Data Dokter

</h3>


</div>



<div class="card-body">


<!-- Form mengirim data ke simpan.php menggunakan POST -->
<form action="simpan.php" method="POST">



<!-- Input nama dokter -->
<div class="mb-3">


<label class="form-label fw-bold">

Nama Dokter

</label>


<input
type="text"
name="nama_dokter"
class="form-control"
placeholder="Masukkan Nama Dokter"
required>


</div>





<!-- Input spesialis dokter -->
<div class="mb-3">


<label class="form-label fw-bold">

Spesialis

</label>


<input
type="text"
name="spesialis"
class="form-control"
placeholder="Contoh: Dokter Umum"
required>


</div>





<!-- Input nomor HP dokter -->
<div class="mb-4">


<label class="form-label fw-bold">

Nomor HP

</label>


<input
type="text"
name="no_hp"
class="form-control"
placeholder="08xxxxxxxxxx"
required>


</div>





<div class="d-flex justify-content-between">


<!-- Tombol kembali ke halaman data dokter -->
<a href="index.php" class="btn btn-secondary">


<i class="bi bi-arrow-left"></i>

Kembali


</a>



<!-- Tombol mengirim data form -->
<button type="submit" class="btn btn-success">


<i class="bi bi-save"></i>

Simpan Data


</button>


</div>



</form>


</div>


</div>


</div>


</div>


</div>




<!-- Library Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>