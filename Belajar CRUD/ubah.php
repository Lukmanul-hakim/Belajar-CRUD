<?php

require 'koneksi.php';

//ambil data di URL
$id = $_GET["id"];
// query data myproject berdasarkan id

$myproject = query("SELECT * FROM myproject WHERE id = $id")[0];

//cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    //cek apakah data berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
// Jika data berhasil ditambahkan, tampilkan pesan berhasil dan arahkan ke halaman index.php
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
// Jika data gagal diubah, tampilkan pesan gagal dan arahkan ke halaman ubah.php
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubah.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html> <!-- Deklarasi tipe dokumen -->
<html lang="en"> <!-- Mulai tag html dengan bahasa Inggris -->

<head>
    <meta charset="UTF-8"> <!-- Penetapan karakter set UTF-8 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Penyesuaian dengan Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Pengaturan tampilan sesuai lebar perangkat -->
    <title>Ubah Data Project</title> <!-- Judul halaman -->
</head>

<body>
    <h1>Ubah Data Project</h1> <!-- Heading untuk judul form -->
    <form action="" method="POST" enctype="multipart/form-data"> <!-- Form untuk mengirim data dengan metode POST dan mengizinkan unggahan file -->
        <input type="hidden" name="id" value="<?= $myproject["id"] ?>"> <!-- Input tersembunyi untuk menyimpan ID project -->
        <input type="hidden" name="gambarlama" value="<?= $myproject["Hasil"] ?>"> <!-- Input tersembunyi untuk menyimpan Ga,bar lama project -->

        <ul> <!-- Daftar tak terurut -->
            <li>
                <label for="Nama_Project"> Nama Project : </label> <!-- Label untuk input nama project -->
                <input type="text" name="Nama_Project" id="Nama_Project" required value="<?= $myproject["Nama_Project"] ?>"> <!-- Input teks untuk nama project yang sudah diisi dengan nilai sebelumnya -->
            </li>
            <li>
                <label for="Tanggal_Pembuatan"> Tanggal Pembuatan : </label> <!-- Label untuk input tanggal pembuatan -->
                <input type="text" name="Tanggal_Pembuatan" id="Tanggal_Pembuatan" required value="<?= $myproject["Tanggal_Pembuatan"] ?>"> <!-- Input teks untuk tanggal pembuatan yang sudah diisi dengan nilai sebelumnya -->
            </li>
            <li>
                <label for="Jenis_Project">Jenis_Project:</label> <!-- Label untuk input jenis project -->
                <select name="Jenis_Project" id="Jenis_Project" required> <!-- Dropdown untuk memilih jenis project yang wajib diisi -->
                    <option value="">Pilih Jenis Project</option> <!-- Pilihan default -->
                    <option value="Pemrograman">Pemrograman</option> <!-- Pilihan jenis project: Pemrograman -->
                    <option value="Multimedia">Multimedia</option> <!-- Pilihan jenis project: Multimedia -->
                    <option value="Office">Office</option> <!-- Pilihan jenis project: Office -->
                    <!-- Tambahkan opsi lain sesuai dengan kebutuhan -->
                </select>
            </li>
            <li>
                <label for="Hasil"> Hasil : </label> <!-- Label untuk input hasil project -->
                <img src="image/<?= $mhs["Hasil"] ?>" width="40">
                <input type="file" name="Hasil" id="Hasil"  value="<?= $myproject["Hasil"] ?>"> <!-- Input file untuk hasil project yang sudah diisi dengan nilai sebelumnya -->
            </li>
           
            <li>
                <button type="submit" name="submit">Ubah Data</button> <!-- Tombol untuk mengirim data -->
            </li>
        </ul>
    </form>
</body>
</html>
