<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </form>
</body>
</html>

<?php
session_start();
include('db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result_admin = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $result_user = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if ($result_admin->num_rows > 0) {
        $_SESSION['role'] = 'admin';
        header('Location: admin/dashboard.php');
    } elseif ($result_user->num_rows > 0) {
        $_SESSION['role'] = 'user';
        header('Location: user/dashboard.php');
    } else {
        echo "<p>Username atau password salah.</p>";
    }
}
?>
