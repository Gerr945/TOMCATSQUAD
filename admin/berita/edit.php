<?php
include "../../config/app.php";
include "../auth.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id'")
);

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $isi   = $_POST['isi'];

    if ($_FILES['gambar']['name'] != "") {
        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "../../uploads/berita/" . $gambar);

        mysqli_query($koneksi,
            "UPDATE berita
             SET judul='$judul', isi='$isi', gambar='$gambar'
             WHERE id='$id'");
    } else {
        mysqli_query($koneksi,
            "UPDATE berita
             SET judul='$judul', isi='$isi'
             WHERE id='$id'");
    }

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-xl font-bold mb-6">Edit Berita</h1>

    <?php if ($data['gambar']): ?>
        <img src="../../uploads/berita/<?= $data['gambar']; ?>"
             class="w-40 mb-4 rounded">
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <label class="block mb-1">Judul Berita</label>
        <input type="text" name="judul"
               value="<?= $data['judul']; ?>"
               class="w-full border p-2 mb-4 rounded">

        <label class="block mb-1">Isi Berita</label>
        <textarea name="isi" rows="6"
                  class="w-full border p-2 mb-4 rounded"><?= $data['isi']; ?></textarea>

        <label class="block mb-1">Ganti Gambar (Opsional)</label>
        <input type="file" name="gambar"
               class="w-full border p-2 mb-6 rounded">

        <button type="submit" name="update"
                class="bg-blue-600 text-white px-4 py-2 rounded">
            Update Berita
        </button>
    </form>
</div>

</body>
</html>
