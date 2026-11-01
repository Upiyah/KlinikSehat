<?php
include "../config/koneksi.php";
include "../config/auth.php";
/** @var mysqli $koneksi */

// Mengambil seluruh data pasien dari database
$data = mysqli_query($koneksi, "SELECT * FROM pasien");

// Mengecek apakah query berhasil dijalankan
if (!$data) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pasien</title>
     <!-- Bootstrap untuk tampilan halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h3>Data Pasien</h3>
<!-- Tombol navigasi -->
    <a href="../dashboard.php" class="btn btn-secondary mb-3">Kembali</a>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Pasien</a>

        <!-- Tabel data pasien -->
    <table class="table table-bordered table-striped table-hover">

        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>

        <?php
          // Membuat nomor urut
        $no = 1;

         // Menampilkan data pasien
        if(mysqli_num_rows($data) > 0){

            while($row = mysqli_fetch_assoc($data)){
        ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= htmlspecialchars($row['nama_pasien']); ?></td>

                <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>

                <td><?= htmlspecialchars($row['tanggal_lahir']); ?></td>

                <td><?= htmlspecialchars($row['alamat']); ?></td>

                <td><?= htmlspecialchars($row['no_hp']); ?></td>

                <td>
                     <!-- Tombol edit -->
                    <a href="edit.php?id=<?= $row['id_pasien']; ?>" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                     <!-- Tombol hapus -->
                    <a href="hapus.php?id=<?= $row['id_pasien']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </a>

                </td>

            </tr>

        <?php
            }

        }else{
        ?>

<!-- Pesan jika data kosong -->
            <tr>
                <td colspan="7" class="text-center">
                    Belum ada data pasien.
                </td>
            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>