<?php
//menghubungkan database
include "../config/koneksi.php";
include "../config/auth.php";
/** @var mysqli $koneksi */

//mengambil data hasil pemeriksaan
$data = mysqli_query($koneksi,"
SELECT 
hasil_pemeriksaan.*,
jadwal_pemeriksaan.tanggal,
jadwal_pemeriksaan.jam,
pasien.nama_pasien,
dokter.nama_dokter

FROM hasil_pemeriksaan

JOIN jadwal_pemeriksaan 
ON jadwal_pemeriksaan.id_jadwal = hasil_pemeriksaan.id_jadwal

JOIN pasien 
ON pasien.id_pasien = jadwal_pemeriksaan.id_pasien

JOIN dokter 
ON dokter.id_dokter = jadwal_pemeriksaan.id_dokter

ORDER BY hasil_pemeriksaan.id_hasil DESC
");
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Hasil Pemeriksaan</title>

<!--bootstrap design dan icon-->
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

<!--card utama untuk hasil pemeriksaan-->
<div class="card shadow-lg">


<div class="card-header bg-primary text-white">

<h3>

<i class="bi bi-clipboard2-pulse-fill"></i>

Hasil Pemeriksaan

</h3>

</div>


<div class="card-body">

<!--tombol navigasi-->
<a href="../dashboard.php" class="btn btn-secondary mb-3">

<i class="bi bi-arrow-left"></i>

Kembali

</a>

<!--tombol tambah data-->
<a href="tambah.php" class="btn btn-success mb-3">

<i class="bi bi-plus-circle"></i>

Tambah Hasil

</a>


<!--menampilkan tabel data pemeriksaan-->
<table class="table table-bordered table-hover">


<thead class="table-primary">

<tr>

<th>No</th>

<th>Pasien</th>

<th>Dokter</th>

<th>Tanggal</th>

<th>Diagnosa</th>

<th>Tindakan</th>

<th>Resep</th>

<th width="150">Aksi</th>

</tr>

</thead>


<tbody>


<?php
//membuat no urut data
$no=1;
//menampilkan data pemeriksaan
while($row=mysqli_fetch_assoc($data)){

?>


<tr>


<td><?= $no++; ?></td>


<td><?= $row['nama_pasien']; ?></td>


<td><?= $row['nama_dokter']; ?></td>


<td>

<?= $row['tanggal']; ?>

<br>

<small><?= $row['jam']; ?></small>

</td>


<td><?= $row['diagnosa']; ?></td>


<td><?= $row['tindakan']; ?></td>


<td><?= $row['resep']; ?></td>


<td>


<a href="edit.php?id=<?= $row['id_hasil']; ?>" 
class="btn btn-warning btn-sm">

<i class="bi bi-pencil"></i>

Edit

</a>


<a href="hapus.php?id=<?= $row['id_hasil']; ?>" 
class="btn btn-danger btn-sm"
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