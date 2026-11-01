<?php
include "../config/auth.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pasien - Klinik Sehat</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        .btn{
            border-radius:10px;
        }
    </style>

</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

         <!-- Form tambah data pasien -->
            <div class="card shadow-lg">

                <div class="card-header bg-primary text-white">

                    <h3 class="text-center mb-0">
                        <i class="bi bi-person-plus-fill"></i>
                        Tambah Data Pasien
                    </h3>

                </div>

                <div class="card-body">

                    <form action="simpan.php" method="POST">

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Nama Pasien
                            </label>

                            <input
                                type="text"
                                name="nama_pasien"
                                class="form-control"
                                placeholder="Masukkan Nama Pasien"
                                required>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label fw-bold">
                                        Jenis Kelamin
                                    </label>

                                    <select
                                        name="jenis_kelamin"
                                        class="form-select"
                                        required>

                                        <option value="">-- Pilih --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label fw-bold">
                                        Tanggal Lahir
                                    </label>

                                    <input
                                        type="date"
                                        name="tanggal_lahir"
                                        class="form-control"
                                        required>

                                </div>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                class="form-control"
                                rows="4"
                                placeholder="Masukkan Alamat"></textarea>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Nomor HP
                            </label>

                            <input
                                type="text"
                                name="no_hp"
                                class="form-control"
                                placeholder="08xxxxxxxxxx">

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php" class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>

                                Kembali

                            </a>

                            <!-- Menyimpan data pasien -->

                            <button type="submit" class="btn btn-success">

                                <i class="bi bi-save"></i>

                                Simpan Data

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>