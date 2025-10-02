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
    <title>Histori Skor</title>
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
    <div class="card history-card">
        <h1 class="title">Histori Skor <span class="highlight"><?= $_SESSION['username'] ?></span></h1>
        <p class="subtitle">Berikut daftar skor yang pernah kamu mainkan:</p>
        <ul id="history" class="history-list"></ul>
        <a href="../index.php" class="btn secondary-btn back-btn">Kembali</a>
    </div>
</div>

<script>
fetch('../Backend/get_history.php')
.then(res => res.json())
.then(data => {
    const list = document.getElementById('history');
    if(data.length === 0){
        const li = document.createElement('li');
        li.innerText = "Belum ada histori skor.";
        list.appendChild(li);
    } else {
        data.forEach(h => {
            const li = document.createElement('li');
            li.innerText = `${h.level.toUpperCase()} - Skor: ${h.score} - ${h.created_at}`;
            list.appendChild(li);
        });
    }
});
</script>
</body>
</html>
