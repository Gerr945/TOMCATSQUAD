<?php
include "../config/app.php";
include "../layout/header.php";

if (!isset($_GET['id'])) {
    header("Location: berita.php");
    exit;
}

$id = (int) $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = $id");
$berita = mysqli_fetch_assoc($query);

if (!$berita) {
    echo "<div class='text-center py-20'>Artikel tidak ditemukan</div>";
    include "../layout/footer.php";
    exit;
}
?>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-3xl">

        <h1 class="text-4xl font-bold mb-4">
            <?= htmlspecialchars($berita['judul']); ?>
        </h1>

        <p class="text-sm text-gray-500 mb-6">
            TOMCAT SQUAD •
            <?= date('d M Y', strtotime($berita['tanggal'] ?? date('Y-m-d'))) ?>
        </p>

        <?php if ($berita['gambar']): ?>
            <img src="../uploads/berita/<?= $berita['gambar']; ?>"
                 class="w-full rounded-xl mb-8">
        <?php endif; ?>

        <div class="text-gray-800 leading-relaxed text-lg">
            <?= nl2br($berita['isi']); ?>
        </div>

        <a href="berita.php"
           class="inline-block mt-12 bg-blue-600 text-white px-6 py-2 rounded">
            ← Kembali ke Berita
        </a>

    </div>
</section>

<?php include "../layout/footer.php"; ?>
