<?php
require 'koneksi.php'; // Memuat file koneksi.php yang berisi konfigurasi koneksi database
$myproject = query("SELECT * FROM myproject"); // Mengambil data project dari database

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // Jika tombol submit sudah ditekan, lakukan penambahan data project
    if (tambah($_POST) > 0) { // Memanggil fungsi tambah() untuk menambahkan data project
        // Jika data berhasil ditambahkan, tampilkan pesan berhasil dan arahkan ke halaman index.php
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        // Jika data gagal ditambahkan, tampilkan pesan gagal dan arahkan ke halaman tambah.php
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'tambah.php';
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
    <title>Tambah Data Project</title> <!-- Judul halaman -->
</head>

<body>

    <h1>Tambah Data Project</h1> <!-- Heading untuk judul form -->

    <form action="" method="POST" enctype="multipart/form-data"> <!-- Form untuk mengirim data dengan metode POST dan mengizinkan unggahan file -->
        <ul> <!-- Daftar tak terurut -->
            <li>
                <label for="Nama_Project"> NAMA PROJECT : </label> <!-- Label untuk input nama project -->
                <input type="text" name="Nama_Project" id="Nama_Project" required> <!-- Input teks untuk nama project yang wajib diisi -->
            </li>
            <li>
                <label for="Tanggal_Pembuatan"> TANGGAL PEMBUATAN : </label> <!-- Label untuk input tanggal pembuatan -->
                <input type="date" name="Tanggal_Pembuatan" id="Tanggal_Pembuatan" required> <!-- Input tanggal untuk tanggal pembuatan yang wajib diisi -->
            </li>
            <li>
                <label for="Jenis_Project">JENIS PROJECT:</label> <!-- Label untuk input jenis project -->
                <select name="Jenis_Project" id="Jenis_Project" required> <!-- Dropdown untuk memilih jenis project yang wajib diisi -->
                    <option value="">Pilih Jenis Project</option> <!-- Pilihan default -->
                    <option value="Pemrograman">Pemrograman</option> <!-- Pilihan jenis project: Pemrograman -->
                    <option value="Multimedia">Multimedia</option> <!-- Pilihan jenis project: Multimedia -->
                    <option value="Office">Office</option> <!-- Pilihan jenis project: Office -->
                    <!-- Tambahkan opsi lain sesuai dengan kebutuhan -->
                </select>
            </li>
            <li>
                <label for="Hasil"> HASIL : </label> <!-- Label untuk input hasil project -->
                <input type="file" name="Hasil" id="Hasil" required> <!-- Input unggahan file untuk hasil project yang wajib diisi -->
            </li>
    
            <li>
                <button type="submit" name="submit">Tambah Data</button> <!-- Tombol untuk mengirim data -->
            </li>
        </ul>

    </form>

</body>

</html>
