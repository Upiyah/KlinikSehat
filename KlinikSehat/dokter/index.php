<?php

// Menghubungkan database dan autentikasi pengguna
include "../config/koneksi.php";
include "../config/auth.php";

/** @var mysqli $koneksi */

// Mengambil data dokter dari database dan mengurutkan berdasarkan nama
$data = mysqli_query($koneksi, "
SELECT * FROM dokter
ORDER BY nama_dokter ASC
");

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Data Dokter</title>


<!-- Menggunakan Bootstrap untuk desain tampilan -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Menggunakan Bootstrap Icons untuk ikon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


<style>

/* Mengatur tampilan background halaman */
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


/* Mengatur posisi teks pada tabel */
.table th{
    text-align:center;
    vertical-align:middle;
}


.table td{
    vertical-align:middle;
}


/* Mengatur bentuk tombol */
.btn{
    border-radius:8px;
}

</style>


</head>


<body>


<div class="container mt-5">


<!-- Card utama halaman data dokter -->
<div class="card shadow-lg">


<!-- Header halaman -->
<div class="card-header bg-primary text-white">


<h3 class="mb-0">

<i class="bi bi-person-vcard-fill"></i>

Data Dokter

</h3>


</div>



<div class="card-body">



<!-- Tombol navigasi dan tambah data -->
<div class="mb-3">


<!-- Kembali ke dashboard -->
<a href="../dashboard.php" class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>



<!-- Menu tambah data dokter -->
<a href="tambah.php" class="btn btn-success">

<i class="bi bi-plus-circle"></i>

Tambah Dokter

</a>


</div>





<!-- Tabel untuk menampilkan data dokter -->
<table class="table table-bordered table-hover">



<thead class="table-primary">


<tr>


<th width="60">No</th>

<th>Nama Dokter</th>

<th>Spesialis</th>

<th>No HP</th>

<th width="180">Aksi</th>


</tr>


</thead>




<tbody>



<?php

// Membuat nomor urut data
$no = 1;


// Mengecek apakah terdapat data dokter
if(mysqli_num_rows($data)>0){


// Menampilkan data dokter secara berulang
while($row=mysqli_fetch_assoc($data)){


?>


<tr>


<td class="text-center">

<?= $no++; ?>

</td>



<!-- Menampilkan data dengan htmlspecialchars untuk keamanan -->
<td>

<?= htmlspecialchars($row['nama_dokter']); ?>

</td>



<td>

<?= htmlspecialchars($row['spesialis']); ?>

</td>



<td>

<?= htmlspecialchars($row['no_hp']); ?>

</td>



<td class="text-center">


<!-- Tombol edit data dokter -->
<a href="edit.php?id=<?= $row['id_dokter']; ?>" 
class="btn btn-warning btn-sm">


<i class="bi bi-pencil-square"></i>

Edit

</a>




<!-- Tombol hapus data dokter dengan konfirmasi -->
<a href="hapus.php?id=<?= $row['id_dokter']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data dokter?')">


<i class="bi bi-trash"></i>

Hapus

</a>


</td>


</tr>



<?php


}


}else{


// Menampilkan pesan jika data dokter kosong

?>



<tr>

<td colspan="5" class="text-center text-muted">

Belum ada data dokter.

</td>

</tr>



<?php } ?>


</tbody>


</table>



</div>


</div>


</div>



<!-- Memanggil library Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>