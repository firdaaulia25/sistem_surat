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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }
        .navbar {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .navbar-brand {
            font-size: 1.5em;
            font-weight: bold;
        }
        .navbar-menu {
            display: flex;
            gap: 20px;
        }
        .navbar-menu a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .navbar-menu a:hover {
            background-color: #555;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .welcome-section {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            text-align: center;
            margin-top: 20px;
        }
        .welcome-section h2 {
            margin-bottom: 15px;
        }
        .welcome-section p {
            font-size: 1.1em;
            color: #333;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Sistem Surat</div>
        <div class="navbar-menu">
            <a href="lihat_surat.php">Lihat Surat</a>
            <a href="logout.php" style="background-color: #F44336;">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-section">
            <h2>Selamat Datang, <?= $_SESSION['user']; ?>!</h2>
            <p>Selamat datang di dashboard Anda.</p>
        </div>
    </div>
</body>
</html>
