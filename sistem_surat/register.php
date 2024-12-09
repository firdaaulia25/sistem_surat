<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Registrasi</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <button type="submit">Daftar</button>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </form>
</body>
</html>

<?php
include('db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $table = $role === 'admin' ? 'admin' : 'users';
    $conn->query("INSERT INTO $table (username, password) VALUES ('$username', '$password')");
    header('Location: login.php');
}
?>
