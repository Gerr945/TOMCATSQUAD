<?php
include 'config.php';

// Hapus semua session login
session_unset();
session_destroy();

// Kembali ke halaman awal
header("Location: index.php");
exit;
?>
