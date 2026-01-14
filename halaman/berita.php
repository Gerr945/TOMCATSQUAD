<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../layout/header.php';

$query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
?>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">

            <?php while ($row = mysqli_fetch_assoc($query)): ?>
                <a href="artikel.php?id=<?= $row['id']; ?>"
                   class="block bg-white rounded-xl shadow hover:shadow-lg
                          overflow-hidden transition hover:-translate-y-1">

                    <?php if (!empty($row['gambar'])): ?>
                        <img
                            src="<?= BASE_URL ?>uploads/berita/<?= htmlspecialchars($row['gambar']); ?>"
                            alt="<?= htmlspecialchars($row['judul']); ?>"
                            class="w-full h-40 object-cover"
                        >
                    <?php else: ?>
                        <div class="w-full h-40 bg-gray-200 flex items-center
                                    justify-center text-gray-500 text-sm">
                            Tidak ada gambar
                        </div>
                    <?php endif; ?>

                    <div class="p-6">
                        <h3 class="text-lg font-bold mb-2 text-gray-800">
                            <?= htmlspecialchars($row['judul']); ?>
                        </h3>

                        <p class="text-gray-600 text-sm mb-4">
                            <?= substr(strip_tags($row['isi']), 0, 120); ?>...
                        </p>

                        <span class="text-xs text-gray-400">
                            <?= htmlspecialchars($row['penulis']); ?> · <?= $row['tanggal']; ?>
                        </span>
                    </div>
                </a>
            <?php endwhile; ?>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
