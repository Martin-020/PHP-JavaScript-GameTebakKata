<?php
session_start();
require 'db.php';
$message = '';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $username=$_POST['username'];
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt=$pdo->prepare("SELECT id FROM players WHERE username=?");
    $stmt->execute([$username]);
    if($stmt->fetch()){
        $message = "Username sudah terdaftar!";
    } else {
        $stmt=$pdo->prepare("INSERT INTO players (username,password) VALUES (?,?)");
        $stmt->execute([$username,$password]);
        $message = "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Tebak Kata</title>
    <link rel="stylesheet" href="../Frontend/style.css">
    <!-- =======================================================
    * Project Name: Game Tebak Kata
    * Updated: 2 Oktober 2025
    * Author: Martin Hidayat Rihwan
    * Github: https://github.com/Martin-020
    ======================================================== -->
</head>
<body>
<div class="container">
    <div class="card auth-card">
        <h1 class="title">Daftar <span class="highlight">Tebak Kata</span></h1>

        <?php if($message): ?>
            <p class="info-msg"><?= $message ?></p>
        <?php endif; ?>

        <form method="POST" class="auth-form">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn primary-btn">Daftar</button>
        </form>

        <p class="subtitle">Sudah punya akun? <a href="login.php" class="link-btn">Login di sini</a></p>
    </div>
</div>
</body>
</html>
