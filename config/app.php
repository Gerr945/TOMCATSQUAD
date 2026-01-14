<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "eskul_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// BASE URL PROJECT (WAJIB SESUAI NAMA FOLDER)
define('BASE_URL', 'http://localhost/Kerja Project/');
