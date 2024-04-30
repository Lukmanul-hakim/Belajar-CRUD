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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Project</title>
</head>

<body>

    <h1>Tambah Data Project</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="Nama_Project"> NAMA PROJECT : </label>
                <input type="text" name="Nama_Project" id="Nama_Project" required>
            </li>
            <li>
                <label for="Tanggal_Pembuatan"> TANGGAL PEMBUATAN : </label>
                <input type="date" name="Tanggal_Pembuatan" id="Tanggal_Pembuatan" required>
            </li>
            <li>
                <label for="Jenis_Project">JENIS PROJECT:</label>
                <select name="Jenis_Project" id="Jenis_Project" required>
                    <option value="">Pilih Jenis Project</option>
                    <option value="Pemrograman">Pemrograman</option>
                    <option value="Multimedia">Multimedia</option>
                    <option value="Office">Office</option>
                    <!-- Tambahkan opsi lain sesuai dengan kebutuhan -->
                </select>
            </li>
            <li>
                <label for="Hasil"> HASIL : </label>
                <input type="file" name="Hasil" id="Hasil" required>
            </li>
    
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>

    </form>

</body>

</html>
