<?php

$id = $_GET['id'];
$pdo = new PDO("mysql:host=localhost;dbname=test;", "root", "");
$sql = "DELETE FROM Task_18 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id'=>$id]);

var_dump($id);
header('Location: /index.php');