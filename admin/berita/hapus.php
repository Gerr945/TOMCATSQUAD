<?php
include "../../config/app.php";
include "../auth.php";

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM berita WHERE id='$id'");

header("Location: index.php");
