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
    <title>Lihat Surat</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>Daftar Surat</header>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="lihat_surat.php">Lihat Surat</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
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
