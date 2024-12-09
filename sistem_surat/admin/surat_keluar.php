<?php
session_start();
include('../db/config.php');
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_surat = $_POST['no_surat'];
    $tanggal_surat = $_POST['tanggal_surat'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $asal_surat = $_POST['asal_surat'];
    $perihal = $_POST['perihal'];

    $sql = "INSERT INTO surat_keluar (no_surat, tanggal_surat, tujuan_surat, asal_surat, perihal) 
            VALUES ('$no_surat', '$tanggal_surat', '$tujuan_surat', '$asal_surat', '$perihal')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keluar</title>
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
        .header {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            color: #333;
        }
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .form-container input, .form-container textarea, .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .form-container button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #333;
            color: white;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Sistem Surat</div>
        <div class="navbar-menu">
            <a href="dashboard.php">Dashboard</a>
            <a href="surat_keluar.php">Surat Keluar</a>
            <a href="surat_masuk.php">Surat Masuk</a>
            <a href="laporan.php">Laporan</a>
            <a href="logout.php" style="background-color: #F44336;">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="header">
            <h2>Kelola Surat Keluar</h2>
        </div>

        <div class="form-container">
            <form method="POST">
                <input type="text" name="no_surat" placeholder="No Surat" required>
                <input type="date" name="tanggal_surat" required>
                <input type="text" name="tujuan_surat" placeholder="Tujuan Surat" required>
                <input type="text" name="asal_surat" placeholder="Asal Surat" required>
                <textarea name="perihal" placeholder="Perihal" required></textarea>
                <button type="submit">Tambah Surat</button>
            </form>
        </div>

        <div class="form-container">
            <h3>Daftar Surat Keluar</h3>
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
    </div>
</body>
</html>
