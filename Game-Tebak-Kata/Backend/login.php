<?php
session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $stmt=$pdo->prepare("SELECT * FROM players WHERE username=?");
    $stmt->execute([$username]);
    $player=$stmt->fetch(PDO::FETCH_ASSOC);

    if($player && password_verify($password,$player['password'])){
        $_SESSION['username']=$username;
        header('Location: ../index.php'); exit;
    } else { $error = "Login gagal! Username atau password salah."; }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tebak Kata</title>
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
        <h1 class="title">Login <span class="highlight">Tebak Kata</span></h1>
        <?php if(isset($error)): ?>
            <p class="error-msg"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" class="auth-form">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn primary-btn">Login</button>
        </form>
        <p class="subtitle">Belum punya akun? <a href="register.php" class="link-btn">Daftar di sini</a></p>
    </div>
</div>
</body>
</html>
