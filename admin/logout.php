<?php
session_start();
session_unset();
session_destroy();

// arahkan ke halaman berita
header("Location: ../halaman/berita.php");
exit;
