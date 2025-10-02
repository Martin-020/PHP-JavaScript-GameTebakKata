<?php
require 'db.php';
session_start();

$level = $_GET['level'] ?? 'easy';

$stmt = $pdo->prepare("SELECT word, hint FROM words WHERE difficulty=? ORDER BY RAND() LIMIT 1");
$stmt->execute([$level]);
$word = $stmt->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode([
    'word' => $word['word'],
    'hint' => $word['hint']
]);
