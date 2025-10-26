<?php
include 'config.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === "ADMIN" && $password === "Admin4803562009") {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit;
} else {
    echo "<script>alert('Nama atau password salah!'); window.location.href='index.html';</script>";
    exit;
}
?>