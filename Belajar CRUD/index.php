<?php
// Koneksi ke database
require 'koneksi.php'; // Memuat file koneksi.php yang berisi konfigurasi koneksi database
$myproject = query("SELECT * FROM myproject"); // Mengambil data project dari database

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPortofolio</title>
</head>
<body>
    
<h1>Data Project</h1>
    <a href="tambah.php">Tambah Data</a> <!-- Link untuk menuju halaman tambah.php -->
    <table border="1" cellpadding="10" cellspacing="0"> <!-- Tabel untuk menampilkan data project -->
        <tr>
            <th>No.</th> <!-- Kolom nomor -->
            <th>Nama Project</th> <!-- Kolom nama project -->
            <th>Tanggal Pembuatan</th> <!-- Kolom tanggal pembuatan -->
            <th>Jenis Project</th> <!-- Kolom jenis project -->
            <th>Hasil</th> <!-- Kolom hasil project (gambar) -->
            <th>Aksi</th> <!-- Kolom aksi (Ubah dan Hapus) -->
        </tr>

        <?php $i = 1; ?> <!-- Inisialisasi variabel $i untuk nomor urut -->
        <?php foreach ($myproject as $row) : ?> <!-- Perulangan untuk menampilkan data project -->
            <tr>
                <td><?= $i; ?></td> <!-- Menampilkan nomor urut -->
                <td><?= $row["Nama_Project"] ?></td> <!-- Menampilkan nama project -->
                <td><?= $row["Tanggal_Pembuatan"] ?></td> <!-- Menampilkan tanggal pembuatan -->
                <td><?= $row["Jenis_Project"] ?></td> <!-- Menampilkan jenis project -->
                <td><img src="image/<?= $row["Hasil"] ?>" width="100"></td> <!-- Menampilkan gambar hasil project -->
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> | <!-- Link untuk menuju halaman ubah.php -->
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data');">Hapus</a> <!-- Link untuk menghapus data -->
                </td>
            </tr>
            <?php $i++; ?> <!-- Menginkrementasi variabel $i untuk nomor urut -->
        <?php endforeach; ?>

    </table>
</body>
</html>
