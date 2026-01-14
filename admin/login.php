<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "admin082009") {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-blue-600">
        Login Admin
    </h2>

    <?php if (isset($error)): ?>
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-4">
            <label class="block mb-1">Username</label>
            <input type="text" name="username" required
                   class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-6">
            <label class="block mb-1">Password</label>
            <input type="password" name="password" required
                   class="w-full border px-4 py-2 rounded">
        </div>

        <button type="submit" name="login"
                class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700">
            Login
        </button>
    </form>
</div>

</body>
</html>
