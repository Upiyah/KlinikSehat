<?php
include "../config/koneksi.php";
include "../config/auth.php";
/** @var mysqli $koneksi */

// Mengambil data jadwal pemeriksaan beserta pasien dan dokter
$jadwal = mysqli_query($koneksi,"
SELECT 
jadwal_pemeriksaan.id_jadwal,
jadwal_pemeriksaan.tanggal,
jadwal_pemeriksaan.jam,
pasien.nama_pasien,
dokter.nama_dokter

FROM jadwal_pemeriksaan

JOIN pasien 
ON pasien.id_pasien = jadwal_pemeriksaan.id_pasien

JOIN dokter 
ON dokter.id_dokter = jadwal_pemeriksaan.id_dokter

ORDER BY tanggal DESC, jam DESC
");

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Hasil Pemeriksaan</title>


<!-- Bootstrap -->

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


.form-control,
.form-select{

    border-radius:10px;

}


textarea{

    resize:none;

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

<!-- Form tambah hasil pemeriksaan -->
<div class="card shadow-lg">



<div class="card-header bg-primary text-white">


<h3 class="text-center mb-0">

<i class="bi bi-clipboard2-plus"></i>

Tambah Hasil Pemeriksaan

</h3>


</div>



<div class="card-body">



<form action="simpan.php" method="POST">



<div class="mb-3">


<label class="form-label fw-bold">

Jadwal Pemeriksaan

</label>



<select name="id_jadwal" class="form-select" required>


<option value="">

-- Pilih Jadwal Pemeriksaan --

</option>



<?php while($j=mysqli_fetch_assoc($jadwal)){ ?>


<option value="<?= $j['id_jadwal']; ?>">


<?= $j['nama_pasien']; ?> 
-
<?= $j['nama_dokter']; ?>

|

<?= $j['tanggal']; ?>

|

<?= $j['jam']; ?>


</option>



<?php } ?>


</select>


</div>





<div class="mb-3">


<label class="form-label fw-bold">

Diagnosa

</label>


<textarea 
name="diagnosa"
class="form-control"
rows="3"
placeholder="Masukkan diagnosa pasien"
required></textarea>


</div>





<div class="mb-3">


<label class="form-label fw-bold">

Tindakan

</label>


<textarea 
name="tindakan"
class="form-control"
rows="3"
placeholder="Masukkan tindakan medis"
required></textarea>


</div>





<div class="mb-4">


<label class="form-label fw-bold">

Resep

</label>


<textarea 
name="resep"
class="form-control"
rows="3"
placeholder="Masukkan resep obat"></textarea>


</div>





<div class="d-flex justify-content-between">


<a href="index.php" class="btn btn-secondary">


<i class="bi bi-arrow-left"></i>


Kembali


</a>





<button type="submit" class="btn btn-success">


<i class="bi bi-save"></i>


Simpan Hasil


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