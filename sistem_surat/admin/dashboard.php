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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }
        .dashboard-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 25px;
            text-align: center;
            transition: transform 0.3s;
        }
        .dashboard-card:hover {
            transform: translateY(-10px);
        }
        .dashboard-card h3 {
            margin-bottom: 15px;
            color: #333;
        }
        .dashboard-card .count {
            font-size: 2em;
            font-weight: bold;
            color: #4CAF50;
        }
        .welcome-section {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Sistem Surat</div>
        <div class="navbar-menu">
            <a href="surat_keluar.php">Surat Keluar</a>
            <a href="surat_masuk.php">Surat Masuk</a>
            <a href="laporan.php">Laporan</a>
            <a href="logout.php" style="background-color: #F44336;">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        <div class="welcome-section">
            <h2>Selamat Datang, <?= $_SESSION['admin']; ?>!</h2>
            <p>Administrator Sistem Surat</p>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>Total Surat Masuk</h3>
                <div class="count">56</div>
            </div>
            <div class="dashboard-card">
                <h3>Total Surat Keluar</h3>
                <div class="count">42</div>
            </div>
            <div class="dashboard-card">
                <h3>Total Pengguna</h3>
                <div class="count">15</div>
            </div>
        </div>
    </div>
</body>
</html>