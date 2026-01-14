<?php
include "../../config/app.php";
include "../auth.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Data Berita</h1>

            <div class="flex gap-3">
                <a href="../dashboard.php" class="bg-gray-200 hover:bg-gray-300
                  text-gray-700 px-4 py-2 rounded">
                    ← Kembali
                </a>

                <a href="tambah.php" class="bg-blue-600 hover:bg-blue-700
                  text-white px-4 py-2 rounded">
                    + Tambah Berita
                </a>
            </div>
        </div>

        <table class="w-full border">
            <tr class="bg-blue-600 text-white">
                <th class="p-2">No</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            $q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($q)):
                ?>
                <tr class="border-b">
                    <td class="p-2 text-center"><?= $no++ ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td class="text-center space-x-2">
                        <a href="edit.php?id=<?= $row['id'] ?>" class="text-blue-600">Edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus berita?')"
                            class="text-red-600">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>