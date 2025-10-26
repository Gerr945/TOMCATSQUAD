<?php
include 'config.php';

// Cek login session
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location.href='index.html';</script>";
    exit;
}

// Ambil data dari database
$komentar = $conn->query("SELECT * FROM komentar ORDER BY tanggal DESC");
$formulir = $conn->query("SELECT * FROM formulir ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function showSection(sectionId) {
            document.getElementById('formulirSection').classList.add('hidden');
            document.getElementById('komentarSection').classList.add('hidden');
            document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 flex justify-between items-center shadow">
        <h1 class="text-lg font-semibold">Dashboard Admin</h1>
        <a href="logout.php" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600 transition">Logout</a>
    </nav>

    <!-- Tombol Navigasi Kategori -->
    <div class="container mx-auto mt-8 flex justify-center space-x-4">
        <button onclick="showSection('formulirSection')"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Data Formulir</button>
        <button onclick="showSection('komentarSection')"
            class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Data Komentar</button>
    </div>

    <div class="container mx-auto mt-10">

        <!-- Bagian 1: Data Formulir -->
        <section id="formulirSection" class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Data Formulir</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-sm">
                    <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class="py-2 px-3 border">ID</th>
                            <th class="py-2 px-3 border">Nama</th>
                            <th class="py-2 px-3 border">Email</th>
                            <th class="py-2 px-3 border">Telepon</th>
                            <th class="py-2 px-3 border">Jenjang</th>
                            <th class="py-2 px-3 border">Jurusan</th>
                            <th class="py-2 px-3 border">Kelas</th>
                            <th class="py-2 px-3 border">Program</th>
                            <th class="py-2 px-3 border">Pesan</th>
                            <th class="py-2 px-3 border">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $formulir->fetch_assoc()): ?>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-2 px-3 border text-center"><?= $row['id'] ?></td>
                                <td class="py-2 px-3 border"><?= htmlspecialchars($row['nama']) ?></td>
                                <td class="py-2 px-3 border"><?= htmlspecialchars($row['email']) ?></td>
                                <td class="py-2 px-3 border text-center"><?= htmlspecialchars($row['telepon']) ?></td>
                                <td class="py-2 px-3 border text-center"><?= htmlspecialchars($row['jenjang']) ?></td>
                                <td class="py-2 px-3 border"><?= htmlspecialchars($row['jurusan']) ?></td>
                                <td class="py-2 px-3 border"><?= htmlspecialchars($row['kelas']) ?></td>
                                <td class="py-2 px-3 border"><?= htmlspecialchars($row['program']) ?></td>
                                <td class="py-2 px-3 border"><?= htmlspecialchars($row['pesan']) ?></td>
                                <td class="py-2 px-3 border text-center"><?= $row['tanggal'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Bagian 2: Data Komentar -->
        <section id="komentarSection" class="bg-white p-6 rounded-lg shadow hidden">
            <h2 class="text-2xl font-bold text-green-600 mb-4">Data Komentar</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-green-600 text-white text-sm">
                            <th class="py-2 px-4 border">ID</th>
                            <th class="py-2 px-4 border">Nama</th>
                            <th class="py-2 px-4 border">Komentar</th>
                            <th class="py-2 px-4 border">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $komentar->fetch_assoc()): ?>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-2 px-4 border text-center"><?= $row['id_komentar'] ?></td>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($row['nama']) ?></td>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($row['komentar']) ?></td>
                                <td class="py-2 px-4 border text-center"><?= $row['tanggal'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>

</body>

</html>