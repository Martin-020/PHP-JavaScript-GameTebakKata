<?php
require 'db.php';
$stmt=$pdo->query("SELECT p.username, MAX(s.score) AS top_score FROM scores s JOIN players p ON s.player_id=p.id GROUP BY p.username ORDER BY top_score DESC LIMIT 10");
$leaders=$stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($leaders);
?>
