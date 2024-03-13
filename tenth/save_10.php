<?php 
$text = $_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=test;", "root", "");
$sql = "INSERT INTO Task_10 (text) VALUES (:text) ";
$statement = $pdo->prepare($sql);
$statement -> execute(['text' => $text]);
header("Location: /index.php");
?>