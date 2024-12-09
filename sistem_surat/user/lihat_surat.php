<?php
session_start();
include('../db/config.php');
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
    <title>Lihat Surat</title>
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
        header {
            font-size: 2em;
            font-weight: bold;
            color: #333;
            margin: 20px 0;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Sistem Surat</div>
        <div class="navbar-menu">
            <a href="dashboard.php">Dashboard</a>
            <a href="lihat_surat.php">Lihat Surat</a>
            <a href="logout.php" style="background-color: #F44336;">Logout</a>
        </div>
    </nav>

    <div class="container">
        <header>Daftar Surat Keluar</header>
        <h2>Daftar Surat Keluar</h2>
        <table>
            <tr>
                <th>No Surat</th>
                <th>Tanggal Surat</th>
                <th>Tujuan</th>
                <th>Asal</th>
                <th>Perihal</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM surat_keluar");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['no_surat']}</td>
                        <td>{$row['tanggal_surat']}</td>
                        <td>{$row['tujuan_surat']}</td>
                        <td>{$row['asal_surat']}</td>
                        <td>{$row['perihal']}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
