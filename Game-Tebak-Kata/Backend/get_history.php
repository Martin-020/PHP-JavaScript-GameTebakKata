<?php
require 'db.php';
session_start();
$username=$_SESSION['username'] ?? '';

if($username){
    $stmt=$pdo->prepare("SELECT s.score,s.level,s.created_at FROM scores s JOIN players p ON s.player_id=p.id WHERE p.username=? ORDER BY s.created_at DESC");
    $stmt->execute([$username]);
    $history=$stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($history);
}else{ echo json_encode([]); }
?>
