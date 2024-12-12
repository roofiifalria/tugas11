<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_pendaftaran_siswa";

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
