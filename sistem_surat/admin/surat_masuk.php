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
    <title>Surat Masuk</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>Kelola Surat Masuk</header>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="surat_keluar.php">Surat Keluar</a>
        <a href="surat_masuk.php">Surat Masuk</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Daftar Surat Masuk</h2>
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
</body>
</html>
