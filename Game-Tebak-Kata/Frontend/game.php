<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: ../Backend/login.php'); exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tebak Kata - Hangman</title>
    <link rel="stylesheet" href="style.css">
    <!-- =======================================================
    * Project Name: Game Tebak Kata
    * Updated: 2 Oktober 2025
    * Author: Martin Hidayat Rihwan
    * Github: https://github.com/Martin-020
    ======================================================== -->
</head>
<body>
<div class="container">
    <div class="card game-card">
        <h1 class="title">Tebak Kata <span class="highlight">Hangman</span></h1>
        <p class="subtitle">Hai, <span class="highlight"><?= $_SESSION['username'] ?></span>! Pilih level dan mulai bermain!</p>
        
        <div class="level-select">
            <label for="level">Pilih Level:</label>
            <select id="level">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
            <button id="new-word" class="btn primary-btn">Mulai</button>
        </div>
        
        <div id="hint" class="hint">Hint: -</div>

        <div id="hangman" class="hangman">😃</div>
        <div id="word-display" class="word-display">_ _ _</div>
        <div id="letters" class="letters"></div>
        <div id="score" class="score">Skor: 0</div>
    </div>
</div>

<script src="game.js"></script>
</body>
</html>
