<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="max-w-4xl w-full px-6">

    <h1 class="text-3xl font-bold mb-2 text-center">
        Dashboard Admin
    </h1>

    <p class="text-center text-gray-600 mb-10">
        Selamat datang, <b><?= $_SESSION['admin']; ?></b>
    </p>

    <div class="grid md:grid-cols-2 gap-6">

        <!-- Kelola Berita -->
        <a href="berita/index.php"
           class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition block">
            <h2 class="text-xl font-bold text-blue-600 mb-2">
                📰 Kelola Berita
            </h2>
            <p class="text-gray-600">
                Tambah, edit, dan hapus berita TOMCAT SQUAD.
            </p>
        </a>

        <!-- Logout -->
        <a href="logout.php"
           class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition block">
            <h2 class="text-xl font-bold text-red-600 mb-2">
                🚪 Logout
            </h2>
            <p class="text-gray-600">
                Keluar dari akun admin dengan aman.
            </p>
        </a>

    </div>

</div>

</body>
</html>
