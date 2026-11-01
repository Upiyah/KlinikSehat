<?php
// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */

// Mengambil data pasien dan dokter
$pasien = mysqli_query($koneksi,"
SELECT * FROM pasien
ORDER BY nama_pasien ASC
");

$dokter = mysqli_query($koneksi,"
SELECT * FROM dokter
ORDER BY nama_dokter ASC
");
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Riwayat Berobat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow-lg">

<div class="card-header bg-primary text-white">

<h3 class="mb-0">
<i class="bi bi-clock-history"></i>
Tambah Riwayat Berobat
</h3>

</div>

<div class="card-body">

<form action="simpan.php" method="POST">

<div class="mb-3">
<label class="form-label fw-bold">Nama Pasien</label>

<select name="id_pasien" class="form-select" required>

<option value="">-- Pilih Pasien --</option>

<?php while($p=mysqli_fetch_assoc($pasien)){ ?>

<option value="<?= $p['id_pasien']; ?>">
<?= htmlspecialchars($p['nama_pasien']); ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label class="form-label fw-bold">Nama Dokter</label>

<select name="id_dokter" class="form-select" required>

<option value="">-- Pilih Dokter --</option>

<?php while($d=mysqli_fetch_assoc($dokter)){ ?>

<option value="<?= $d['id_dokter']; ?>">
<?= htmlspecialchars($d['nama_dokter']); ?>
</option>

<?php } ?>

</select>

</div>

<div class="row mb-3">

<div class="col-md-6">

<label class="form-label fw-bold">Tanggal Berobat</label>

<input
type="date"
name="tanggal_berobat"
class="form-control"
required>

</div>

<div class="col-md-6">

<label class="form-label fw-bold">Jam Berobat</label>

<input
type="time"
name="jam_berobat"
class="form-control"
required>

</div>

</div>

<div class="mb-4">

<label class="form-label fw-bold">Obat</label>

<textarea
name="obat"
class="form-control"
rows="4"
placeholder="Masukkan obat atau resep"
required></textarea>

</div>

<div class="d-flex justify-content-between">

<a href="index.php" class="btn btn-secondary">
<i class="bi bi-arrow-left"></i>
Kembali
</a>

<button type="submit" class="btn btn-success">
<i class="bi bi-save"></i>
Simpan
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