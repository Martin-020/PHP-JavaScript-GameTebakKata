<?php
require 'db.php';
session_start();

$username=$_SESSION['username'] ?? '';
$score=$_POST['score'] ?? 0;
$level=$_POST['level'] ?? 'easy';

if(!$username){ echo json_encode(['success'=>false]); exit; }

$stmt=$pdo->prepare("SELECT id FROM players WHERE username=?");
$stmt->execute([$username]);
$player=$stmt->fetch(PDO::FETCH_ASSOC);
$player_id=$player['id'];

$stmt=$pdo->prepare("INSERT INTO scores (player_id,score,level) VALUES (?,?,?)");
$stmt->execute([$player_id,$score,$level]);

echo json_encode(['success'=>true]);
?>
