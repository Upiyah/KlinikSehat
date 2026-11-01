<?php
include "../config/koneksi.php";
include "../config/auth.php";
/** @var mysqli $koneksi */

$data = mysqli_query($koneksi, "
SELECT
    hasil_pemeriksaan.id_hasil,
    hasil_pemeriksaan.diagnosa,
    hasil_pemeriksaan.tindakan,
    hasil_pemeriksaan.resep,

    jadwal_pemeriksaan.tanggal,
    jadwal_pemeriksaan.jam,

    pasien.nama_pasien,
    dokter.nama_dokter

FROM hasil_pemeriksaan

JOIN jadwal_pemeriksaan
ON hasil_pemeriksaan.id_jadwal = jadwal_pemeriksaan.id_jadwal

JOIN pasien
ON jadwal_pemeriksaan.id_pasien = pasien.id_pasien

JOIN dokter
ON jadwal_pemeriksaan.id_dokter = dokter.id_dokter

ORDER BY jadwal_pemeriksaan.tanggal DESC,
         jadwal_pemeriksaan.jam DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Riwayat Berobat</title>

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

.table th,
.table td{
    vertical-align:middle;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card shadow-lg">

<div class="card-header bg-primary text-white">

<h3>
<i class="bi bi-clock-history"></i>
Riwayat Berobat
</h3>

</div>

<div class="card-body">

<a href="../dashboard.php" class="btn btn-secondary mb-3">
<i class="bi bi-arrow-left"></i>
Kembali
</a>

<table class="table table-bordered table-hover">

<thead class="table-primary">

<tr>

<th>No</th>
<th>Nama Pasien</th>
<th>Nama Dokter</th>
<th>Tanggal</th>
<th>Jam</th>
<th>Diagnosa</th>
<th>Tindakan</th>
<th>Resep</th>
<th width="150">Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= htmlspecialchars($row['nama_pasien']); ?></td>

<td><?= htmlspecialchars($row['nama_dokter']); ?></td>

<td><?= $row['tanggal']; ?></td>

<td><?= $row['jam']; ?></td>

<td><?= htmlspecialchars($row['diagnosa']); ?></td>

<td><?= htmlspecialchars($row['tindakan']); ?></td>

<td><?= htmlspecialchars($row['resep']); ?></td>

<td>

<a href="edit.php?id=<?= $row['id_hasil']; ?>" class="btn btn-warning btn-sm">
<i class="bi bi-pencil"></i>
Edit
</a>

<a href="hapus.php?id=<?= $row['id_hasil']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus?')">
<i class="bi bi-trash"></i>
Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>