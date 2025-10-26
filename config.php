<?php
session_start();

$host = "localhost";
$user = "root";    // ubah sesuai username MySQL kamu
$pass = "";        // ubah sesuai password MySQL kamu
$db = "website_data"; // database kamu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>