<?php

include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */


/**
 * Mengambil ID dokter dari URL.
 * Validasi dilakukan agar hanya menerima angka.
 */
$id_dokter = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);


/**
 * Jika ID dokter tidak tersedia,
 * pengguna diarahkan kembali ke halaman utama.
 */
if (!$id_dokter) {

    header("Location:index.php");
    exit;

}


/**
 * Mengambil data dokter berdasarkan ID.
 */
$stmt = $koneksi->prepare(
    "SELECT * FROM dokter WHERE id_dokter=?"
);


if (!$stmt) {

    die("Query gagal dibuat");

}


$stmt->bind_param(
    "i",
    $id_dokter
);


$stmt->execute();


$result = $stmt->get_result();


$data = $result->fetch_assoc();


$stmt->close();



/**
 * Jika data dokter tidak ditemukan,
 * kembali ke halaman index.
 */
if (!$data) {

    echo "
    <script>
        alert('Data dokter tidak ditemukan');
        window.location='index.php';
    </script>
    ";

    exit;

}

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Edit Data Dokter - Klinik Sehat</title>


<link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">


<link 
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


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


.form-control{

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


<div class="card shadow-lg">


<div class="card-header bg-primary text-white">


<h3 class="text-center mb-0">

<i class="bi bi-pencil-square"></i>

Edit Data Dokter

</h3>


</div>



<div class="card-body">


<form action="update.php" method="POST">


<input 
type="hidden"
name="id_dokter"
value="<?= $data['id_dokter']; ?>">



<div class="mb-3">


<label class="form-label fw-bold">

Nama Dokter

</label>


<input

type="text"

name="nama_dokter"

class="form-control"

value="<?= htmlspecialchars($data['nama_dokter']); ?>"

required>


</div>




<div class="mb-3">


<label class="form-label fw-bold">

Spesialis

</label>


<input

type="text"

name="spesialis"

class="form-control"

value="<?= htmlspecialchars($data['spesialis']); ?>"

required>


</div>




<div class="mb-4">


<label class="form-label fw-bold">

Nomor HP

</label>


<input

type="text"

name="no_hp"

class="form-control"

value="<?= htmlspecialchars($data['no_hp']); ?>"

required>


</div>



<div class="d-flex justify-content-between">


<a href="index.php" class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>



<button type="submit" class="btn btn-warning">

<i class="bi bi-save"></i>

Update Data

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