<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard User</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>Dashboard User</header>
    <nav>
        <a href="lihat_surat.php">Lihat Surat</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Selamat Datang, <?= $_SESSION['user']; ?>!</h2>
    </div>
</body>
</html>
