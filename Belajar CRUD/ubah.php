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
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'myproject.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubah.php';
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
    <title>Ubah Data Project</title>
</head>

<body>

    <h1>Ubah Data Project</h1>

    <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $myproject["id"] ?>">
        <ul>
            <li>
                <label for="Nama_Project"> Nama Project : </label>
                <input type="text" name="Nama_Project" id="Nama_Project" required value="<?= $myproject["Nama_Project"] ?>">
            </li>
            <li>
                <label for="Tanggal_Pembuatan"> Tanggal Pembuatan : </label>
                <input type="text" name="Tanggal_Pembuatan" id="Tanggal_Pembuatan" required value="<?= $myproject["Tanggal_Pembuatan"] ?>">
            </li>
            <li>
                <label for="Jenis_Project">Jenis_Project:</label>
                <select name="Jenis_Project" id="Jenis_Project" required>
                    <option value="">Pilih Jenis Project</option>
                    <option value="Pemrograman">Pemrograman</option>
                    <option value="Multimedia">Multimedia</option>
                    <option value="Office">Office</option>
                    <!-- Tambahkan opsi lain sesuai dengan kebutuhan -->
                </select>
            </li>
            <li>
                <label for="Hasil"> Hasil : </label>
                <input type="file" name="Hasil" id="Hasil" required value="<?= $myproject["Hasil"] ?>">
            </li>
           
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>

    </form>

</body>

</html>