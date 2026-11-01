<?php
include "../config/koneksi.php";
include "../config/auth.php";
/** @var mysqli $koneksi */

if(!isset($_GET['id'])){
    echo "<script>
        alert('ID tidak ditemukan');
        window.location='index.php';
    </script>";
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi,"
SELECT
hasil_pemeriksaan.*,
jadwal_pemeriksaan.id_pasien,
jadwal_pemeriksaan.id_dokter,
pasien.nama_pasien,
dokter.nama_dokter

FROM hasil_pemeriksaan

JOIN jadwal_pemeriksaan
ON hasil_pemeriksaan.id_jadwal=jadwal_pemeriksaan.id_jadwal

JOIN pasien
ON jadwal_pemeriksaan.id_pasien=pasien.id_pasien

JOIN dokter
ON jadwal_pemeriksaan.id_dokter=dokter.id_dokter

WHERE id_hasil='$id'
");

$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "<script>
        alert('Data tidak ditemukan');
        window.location='index.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Riwayat Berobat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">
<h3>Edit Riwayat Berobat</h3>
</div>

<div class="card-body">

<form action="update.php" method="POST">

<input
type="hidden"
name="id_hasil"
value="<?= $data['id_hasil']; ?>">

<input
type="hidden"
name="id_jadwal"
value="<?= $data['id_jadwal']; ?>">

<div class="mb-3">
<label>Pasien</label>
<input
type="text"
class="form-control"
value="<?= $data['nama_pasien']; ?>"
readonly>
</div>

<div class="mb-3">
<label>Dokter</label>
<input
type="text"
class="form-control"
value="<?= $data['nama_dokter']; ?>"
readonly>
</div>

<div class="mb-3">
<label>Diagnosa</label>
<textarea
name="diagnosa"
class="form-control"
rows="3"
required><?= htmlspecialchars($data['diagnosa']); ?></textarea>
</div>

<div class="mb-3">
<label>Tindakan</label>
<textarea
name="tindakan"
class="form-control"
rows="3"
required><?= htmlspecialchars($data['tindakan']); ?></textarea>
</div>

<div class="mb-3">
<label>Resep</label>
<textarea
name="resep"
class="form-control"
rows="3"
required><?= htmlspecialchars($data['resep']); ?></textarea>
</div>

<button class="btn btn-primary">
Simpan Perubahan
</button>

<a href="index.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>

</body>
</html>