<?php 
session_start();

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=test;", "root", "");

$sql = "SELECT * FROM Task_11 WHERE text =:text ";
$stmt = $pdo->prepare($sql);
$stmt -> execute([':text' => $text]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if (!empty($result)){
    $message = 'Такая запись уже существует в БД.';
    $_SESSION['danger'] = $message;
    header("Location: /index.php");
exit;
}
$sql = "INSERT INTO Task_11 (text) VALUES (:text)";
$stmt = $pdo->prepare($sql);
$stmt -> execute([':text' => $text]);

$message = 'Запись успешно добавлена.';
$_SESSION['success'] = $message;

header("Location: /index.php");