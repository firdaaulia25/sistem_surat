<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>Dashboard Admin</header>
    <nav>
        <a href="surat_keluar.php">Surat Keluar</a>
        <a href="surat_masuk.php">Surat Masuk</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Selamat Datang, <?= $_SESSION['admin']; ?>!</h2>
    </div>
</body>
</html>
