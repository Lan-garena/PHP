<?php  
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$pdo = new PDO("mysql:host=localhost;dbname=test;", "root","");
$sql = "SELECT * FROM Task_12 WHERE email=:email";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email'=>$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (empty($user)){
	$_SESSION['danger'] = "Неверный логин или пароль.";
	header("Location: /index.php");
	exit;
};
if (!password_verify($password, $user['password'])){
	$_SESSION['danger'] = "Неверный логин или пароль.";
	header("Location: /index.php");
	exit;
};
$_SESSION['user'] = ['email' => $user['email'],'id' => $user['id']];
header("Location: /session.php");