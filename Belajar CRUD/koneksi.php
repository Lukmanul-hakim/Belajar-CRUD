<?php
// Koneksi ke database
$db = mysqli_connect("localhost", "root", "", "projectcrud");

// Fungsi untuk mengeksekusi query dan mengambil hasilnya
function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk menambahkan data project ke dalam database
function tambah($data)
{
    global $db;

    // Mendapatkan nilai dari formulir dan mengamankan datanya
    $Nama_Project = htmlspecialchars($data["Nama_Project"]);
    $Tanggal_Pembuatan = htmlspecialchars($data["Tanggal_Pembuatan"]);
    $Jenis_Project = htmlspecialchars($data["Jenis_Project"]);

    // Mengunggah file gambar dan menyimpannya di server
    $Hasil = upload();
    if (!$Hasil) {
        return false;
    }

    // Membuat query SQL untuk menambahkan data project ke dalam database
    $query = "INSERT INTO myproject VALUES 
            ('', '$Nama_Project', '$Tanggal_Pembuatan', '$Jenis_Project', '$Hasil')";

    // Mengeksekusi query
    mysqli_query($db, $query);

    // Mengembalikan jumlah baris yang terpengaruh oleh operasi SQL
    return mysqli_affected_rows($db);
}

// Fungsi untuk mengelola proses pengunggahan file gambar
function upload()
{
    // Mendapatkan informasi tentang file gambar yang diunggah
    $namafile = $_FILES['Hasil']['name'];
    $ukuranfile = $_FILES['Hasil']['size'];
    $error = $_FILES['Hasil']['error'];
    $tmpName = $_FILES['Hasil']['tmp_name'];

    // Cek apakah file gambar diunggah dengan benar
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    // Cek apakah yang diunggah adalah file gambar yang valid
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang Anda unggah bukan gambar');
        </script>";
        return false;
    }

    // Cek apakah ukuran file gambar tidak terlalu besar
    if ($ukuranfile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    // Menghasilkan nama file gambar baru dan menyimpannya di server
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'image/' . $namafileBaru);
    return $namafileBaru;
}


function ubah($data)
{
    global $db; // Mengakses variabel global dapat memperkenalkan perilaku yang tidak terduga. Pastikan ini benar-benar diperlukan.

    $id = $data["id"]; // Mengambil ID dari data yang diberikan.
    $Nama_Project = htmlspecialchars($data["Nama_Project"]); // Mengambil nama proyek dari data yang diberikan dan melarikan karakter HTML. Pastikan ini sesuai dengan kebutuhan aplikasi.
    $Tanggal_Pembuatan = htmlspecialchars($data["Tanggal_Pembuatan"]); // Mengambil tanggal pembuatan dari data yang diberikan dan melarikan karakter HTML. Pastikan ini sesuai dengan kebutuhan aplikasi.
    $Jenis_Project = htmlspecialchars($data["Jenis_Project"]); // Mengambil jenis proyek dari data yang diberikan dan melarikan karakter HTML. Pastikan ini sesuai dengan kebutuhan aplikasi.
    $gambarLama = htmlspecialchars($data["gambarlama"]); // Mengambil nama file gambar lama dari data yang diberikan dan melarikan karakter HTML. Pastikan ini sesuai dengan kebutuhan aplikasi.

    // Memeriksa apakah pengguna memilih gambar baru atau tidak.
    if ($_FILES['Hasil']['error'] === 4) { // Memeriksa apakah tidak ada file yang diunggah (error kode 4).
        $Hasil = $gambarLama; // Jika tidak ada file yang diunggah, gunakan nama file gambar lama.
    } else {
        $Hasil = upload(); // Jika ada file yang diunggah, proses unggahan gambar.
    }

    // Membuat query untuk memperbarui data proyek.
    $query = "UPDATE myproject SET 
            Nama_Project = '$Nama_Project',
            Tanggal_Pembuatan = '$Tanggal_Pembuatan',
            Jenis_Project = '$Jenis_Project',
            Hasil = '$Hasil'
            WHERE id = $id
            ";

    mysqli_query($db, $query); // Menjalankan query untuk memperbarui data proyek pada database.

    return mysqli_affected_rows($db); // Mengembalikan jumlah baris yang terpengaruh oleh operasi UPDATE pada database.
}

function hapus($id)
{
    global $db; // Mengakses variabel global dapat memperkenalkan perilaku yang tidak terduga. Pastikan ini benar-benar diperlukan.
    mysqli_query($db, "DELETE FROM myproject WHERE id = $id"); // Melakukan penghapusan data dari tabel myproject dengan ID yang diberikan. Pastikan $id divalidasi dan disanitasi dengan benar.
    return mysqli_affected_rows($db); // Mengembalikan jumlah baris yang terpengaruh oleh operasi DELETE pada database.
}

