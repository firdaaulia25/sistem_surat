<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
            text-align: center;
        }
        .welcome-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            width: 400px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .button-group a {
            text-decoration: none;
            padding: 12px;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .admin-btn {
            background-color: #4CAF50;
            color: white;
        }
        .user-btn {
            background-color: #2196F3;
            color: white;
        }
        .register-btn {
            background-color: #FF9800;
            color: white;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Selamat Datang di Sistem Surat</h1>
        <div class="button-group">
            <a href="admin/login.php" class="admin-btn">Login Admin</a>
            <a href="user/login.php" class="user-btn">Login User</a>
            <a href="register.php" class="register-btn">Registrasi</a>
        </div>
    </div>
</body>
</html>