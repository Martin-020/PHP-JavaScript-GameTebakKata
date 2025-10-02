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
    <title>Leaderboard</title>
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
    <div class="card leaderboard-card">
        <h1 class="title">Leaderboard</h1>
        <p class="subtitle">Top 10 pemain dengan skor tertinggi:</p>
        <ol id="leaderboard" class="leaderboard-list"></ol>
        <a href="../index.php" class="btn secondary-btn back-btn">Kembali</a>
    </div>
</div>

<script>
fetch('../Backend/get_leaderboard.php')
.then(res => res.json())
.then(data => {
    const list = document.getElementById('leaderboard');
    if(data.length === 0){
        const li = document.createElement('li');
        li.innerText = "Belum ada data leaderboard.";
        list.appendChild(li);
    } else {
        data.forEach((p, index) => {
            const li = document.createElement('li');
            li.innerText = `${index + 1}. ${p.username} - Skor: ${p.top_score}`;
            list.appendChild(li);
        });
    }
});
</script>
</body>
</html>
