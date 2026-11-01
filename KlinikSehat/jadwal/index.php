<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */


// Mengambil data jadwal beserta informasi pasien dan dokter
$data = mysqli_query($koneksi,"
SELECT
jadwal_pemeriksaan.*,
pasien.nama_pasien,
dokter.nama_dokter

FROM jadwal_pemeriksaan

JOIN pasien 
ON pasien.id_pasien=jadwal_pemeriksaan.id_pasien

JOIN dokter 
ON dokter.id_dokter=jadwal_pemeriksaan.id_dokter

ORDER BY tanggal DESC,jam DESC
");

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Jadwal Pemeriksaan</title>


<!-- Bootstrap untuk desain tampilan -->
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

.table th,
.table td{
vertical-align:middle;
}

</style>


</head>


<body>


<div class="container mt-5">


<!-- Card utama halaman jadwal -->
<div class="card shadow-lg">


<div class="card-header bg-primary text-white">


<h3>

<i class="bi bi-calendar-check-fill"></i>

Jadwal Pemeriksaan

</h3>


</div>


<div class="card-body">


<!-- Tombol navigasi -->
<a href="../dashboard.php" class="btn btn-secondary mb-3">

<i class="bi bi-arrow-left"></i>

Kembali

</a>


<!-- Tombol tambah jadwal -->
<a href="tambah.php" class="btn btn-success mb-3">

<i class="bi bi-plus-circle"></i>

Tambah Jadwal

</a>




<!-- Tabel data jadwal pemeriksaan -->
<table class="table table-bordered table-hover">


<thead class="table-primary">

<tr>

<th>No</th>

<th>Nama Pasien</th>

<th>Nama Dokter</th>

<th>Tanggal</th>

<th>Jam</th>

<th>Status</th>

<th width="180">Aksi</th>

</tr>

</thead>


<tbody>


<?php

// Membuat nomor urut
$no=1;


// Menampilkan data jadwal
while($row=mysqli_fetch_assoc($data)){

?>


<tr>


<td><?= $no++; ?></td>

<td><?= $row['nama_pasien']; ?></td>

<td><?= $row['nama_dokter']; ?></td>

<td><?= $row['tanggal']; ?></td>

<td><?= $row['jam']; ?></td>


<td>


<!-- Menampilkan status dengan badge berbeda -->
<?php

if($row['status']=="Menunggu"){

echo "<span class='badge bg-warning text-dark'>Menunggu</span>";

}elseif($row['status']=="Selesai"){

echo "<span class='badge bg-success'>Selesai</span>";

}else{

echo "<span class='badge bg-danger'>Batal</span>";

}

?>


</td>


<td>


<!-- Tombol edit jadwal -->
<a href="edit.php?id=<?= $row['id_jadwal']; ?>" 
class="btn btn-warning btn-sm">

Edit

</a>



<!-- Tombol hapus jadwal -->
<a href="hapus.php?id=<?= $row['id_jadwal']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus?')">

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