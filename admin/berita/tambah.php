<?php
require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../auth.php';

if (isset($_POST['simpan'])) {

    $judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi     = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $penulis = "Admin TOMCAT";
    $tanggal = date("Y-m-d");

    $gambar = null;

    // ===== PROSES UPLOAD GAMBAR =====
    if (!empty($_FILES['gambar']['name'])) {

        $folder = "../../uploads/berita/";

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (!in_array($ext, $allowed)) {
            echo "<script>alert('Format gambar harus JPG, PNG, atau WEBP');history.back();</script>";
            exit;
        }

        if ($_FILES['gambar']['size'] > 2 * 1024 * 1024) {
            echo "<script>alert('Ukuran gambar maksimal 2MB');history.back();</script>";
            exit;
        }

        $gambar = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $gambar);
    }

    // ===== SIMPAN KE DATABASE =====
    mysqli_query($koneksi, "
        INSERT INTO berita (judul, isi, penulis, tanggal, gambar)
        VALUES ('$judul', '$isi', '$penulis', '$tanggal', " . 
        ($gambar ? "'$gambar'" : "NULL") . ")
    ");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">Tambah Berita</h1>

    <form method="post" enctype="multipart/form-data" class="space-y-4">

        <div>
            <label class="block font-semibold">Judul Berita</label>
            <input type="text" name="judul" required
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">Isi Berita</label>
            <textarea name="isi" rows="5" required
                      class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Gambar Berita</label>
            <input type="file" name="gambar"
                   accept="image/jpeg,image/png,image/webp"
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div class="flex justify-between">
            <a href="index.php" class="bg-gray-300 px-4 py-2 rounded">
                ← Kembali
            </a>

            <button type="submit" name="simpan"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </div>

    </form>

</div>

</body>
</html>
