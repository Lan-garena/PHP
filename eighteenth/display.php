<?php

$pdo = new PDO("mysql:host=localhost;dbname=test;", "root", "");
$sql = "SELECT * FROM Task_18";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$imgs = $stmt->fetchAll(PDO::FETCH_ASSOC);

