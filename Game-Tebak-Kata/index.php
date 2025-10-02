<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tebak Kata</title>
    <link rel="stylesheet" href="Frontend/style.css">
    <!-- =======================================================
    * Project Name: Game Tebak Kata
    * Updated: 2 Oktober 2025
    * Author: Martin Hidayat Rihwan
    * Github: https://github.com/Martin-020
    ======================================================== -->
</head>
<body>
    <div class="container">
        <div class="card welcome-card">
            <h1 class="title">Selamat datang di <span class="highlight">Tebak Kata</span></h1>
            
            <?php if(!isset($_SESSION['username'])): ?>
            <p class="subtitle">Silakan login atau daftar untuk memulai permainan!</p>
            <div class="btn-group">
                <a href="Backend/login.php" class="btn primary-btn">Login</a>
                <a href="Backend/register.php" class="btn secondary-btn">Register</a>
            </div>
            <?php else: ?>
            <p class="subtitle">Hai, <span class="highlight"><?= $_SESSION['username'] ?></span>! Siap bermain?</p>
            <div class="btn-group">
                <a href="Backend/logout.php" class="btn logout-btn">Logout</a>
                <a href="Frontend/game.php" class="btn primary-btn">Mulai Game</a>
                <a href="Frontend/leaderboard.php" class="btn secondary-btn">Leaderboard</a>
                <a href="Frontend/history.php" class="btn tertiary-btn">Histori</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
