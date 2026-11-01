<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard - Klinik Sehat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>

body{
    background:#f4f6f9;
}

.navbar{
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

.card{
    border:none;
    border-radius:15px;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.icon{
    font-size:45px;
}

.footer{
    margin-top:50px;
    text-align:center;
    color:gray;
}

</style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold">

<i class="bi bi-hospital"></i>

Klinik Sehat

</a>

<div>

<a href="logout.php" class="btn btn-light">

<i class="bi bi-box-arrow-right"></i>

Logout

</a>

</div>

</div>

</nav>

<!-- Content -->

<div class="container mt-5">

<div class="alert alert-primary shadow-sm">

<h4>

Selamat Datang,

<b><?= $_SESSION['nama_admin']; ?></b>

👋

</h4>

<p class="mb-0">

Selamat datang di Sistem Informasi Klinik Sehat.

Silakan pilih menu yang tersedia di bawah ini.

</p>

</div>

<div class="row g-4">

<!-- Pasien -->

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<div class="icon text-primary">

<i class="bi bi-people-fill"></i>

</div>

<h5 class="mt-3">

Data Pasien

</h5>

<p>

Mengelola data pasien.

</p>

<a href="pasien/index.php" class="btn btn-primary w-100">

Masuk

</a>

</div>

</div>

</div>

<!-- Dokter -->

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<div class="icon text-success">

<i class="bi bi-person-vcard-fill"></i>

</div>

<h5 class="mt-3">

Data Dokter

</h5>

<p>

Mengelola data dokter.

</p>

<a href="dokter/index.php" class="btn btn-success w-100">

Masuk

</a>

</div>

</div>

</div>

<!-- Jadwal -->

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<div class="icon text-warning">

<i class="bi bi-calendar-check-fill"></i>

</div>

<h5 class="mt-3">

Jadwal Pemeriksaan

</h5>

<p>

Mengatur jadwal pemeriksaan pasien.

</p>

<a href="jadwal/index.php" class="btn btn-warning w-100">

Masuk

</a>

</div>

</div>

</div>

<!-- Hasil -->

<div class="col-md-6">

<div class="card shadow">

<div class="card-body text-center">

<div class="icon text-danger">

<i class="bi bi-file-earmark-medical-fill"></i>

</div>

<h5 class="mt-3">

Hasil Pemeriksaan

</h5>

<p>

Melihat dan mengelola hasil pemeriksaan pasien.

</p>

<a href="hasil/index.php" class="btn btn-danger w-100">

Masuk

</a>

</div>

</div>

</div>

<!-- Riwayat -->

<div class="col-md-6">

<div class="card shadow">

<div class="card-body text-center">

<div class="icon text-info">

<i class="bi bi-clock-history"></i>

</div>

<h5 class="mt-3">

Berobat

</h5>

<p>

Melihat riwayat pemeriksaan pasien.

</p>

<a href="riwayat/index.php" class="btn btn-info text-white w-100">

Masuk

</a>

</div>

</div>

</div>

</div>

<div class="footer">

<hr>

<p>

© <?= date('Y'); ?> Sistem Informasi Klinik Sehat

</p>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>