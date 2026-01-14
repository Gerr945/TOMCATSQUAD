<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>TOMCAT SQUAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<nav class="bg-blue-600">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-white font-bold text-xl">
            BERITA
        </h1>

        <ul class="flex gap-6 text-white font-medium items-center">
            <li>
                <a href="/Kerja Project/index.php" class="hover:underline">
                    Kembali
                </a>
            </li>

            <!-- LOGIN ADMIN -->
            <?php if (isset($_SESSION['admin'])): ?>
                <li>
                    <a href="/Kerja Project/admin/logout.php"
                       class="border border-white px-4 py-2 rounded-lg">
                        Logout
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="/Kerja Project/admin/login.php"
                       class="bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold">
                        Log
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
