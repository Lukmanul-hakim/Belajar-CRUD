<?php
require 'koneksi.php'; // Memuat file koneksi.php yang berisi konfigurasi koneksi database

$id = $_GET["id"]; //Mengambil nilai ID dari parameter URL. Pastikan validasi yang memadai untuk mencegah serangan URL injection.

if (hapus($id) > 0) {
    // Jika data berhasil dihapus, tampilkan pesan berhasil dan arahkan ke halaman index.php
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href = 'index.php';
    </script>
    ";
} else {
    // Jika data gagal dihapus, tampilkan pesan gagal dan arahkan ke halaman index.php
    echo "
    <script>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
    </script>
";
}
