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
?>
