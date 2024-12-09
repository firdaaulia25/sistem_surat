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
    $pengirim = $_POST['pengirim'];
    $tujuan = $_POST['tujuan'];
    $perihal = $_POST['perihal'];

    $sql = "INSERT INTO surat_masuk (no_surat, tanggal_surat, pengirim, tujuan, perihal) 
            VALUES ('$no_surat', '$tanggal_surat', '$pengirim', '$tujuan', '$perihal')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Masuk</title>
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
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        form input, form textarea, form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        table th, table td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #333;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
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
            <a href="logout.php" style="background-color: #F44336;">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-section">
            <h2>Kelola Surat Masuk</h2>
            <form method="POST">
                <input type="text" name="no_surat" placeholder="No Surat" required>
                <input type="date" name="tanggal_surat" required>
                <input type="text" name="pengirim" placeholder="Pengirim" required>
                <input type="text" name="tujuan" placeholder="Tujuan" required>
                <textarea name="perihal" placeholder="Perihal" required></textarea>
                <button type="submit">Tambah Surat</button>
            </form>

            <table>
                <tr>
                    <th>No Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Pengirim</th>
                    <th>Tujuan</th>
                    <th>Perihal</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM surat_masuk");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['no_surat']}</td>
                            <td>{$row['tanggal_surat']}</td>
                            <td>{$row['pengirim']}</td>
                            <td>{$row['tujuan']}</td>
                            <td>{$row['perihal']}</td>
                          </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
