<?php  
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=test;", "root", "");
$sql = "SELECT * FROM Task_12 WHERE email=:email";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email'=>$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!empty($user)){
	$_SESSION['danger'] = "Этот email уже занят";
	header("Location: /index.php");
	exit;
};
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO Task_12 (email, password) VALUES (:email, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email'=> $email, 'password'=>$hashed_password ]);
$message = 'Запись успешно добавленна.';
$_SESSION['success'] = $message;
header("Location: /index.php");