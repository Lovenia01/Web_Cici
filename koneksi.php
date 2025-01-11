<?php
$host = "localhost";     // Server database
$username = "root";      // Username MySQL (default: root)
$password = "";          // Password MySQL (default: kosong)
$database = "web_buku_penulis";  // Nama database

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>