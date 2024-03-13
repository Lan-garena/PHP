<?php 

for ($i=0; $i < count($_FILES['image']['name']); $i++) { 

	upload_file($_FILES['image']['name'][$i], $_FILES['image']['tmp_name'][$i]);
}

function db_insert($location){
$pdo = new PDO("mysql:host=localhost;dbname=test;", "root", "");
$sql = "INSERT INTO Task_18 (location) VALUES (:location)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':location'=>$location]);
}

function upload_file($filename, $tmp_name){
	$result = pathinfo($filename);

	$filename = uniqid() . '.' . $result['extension'];

	$location = 'uploads/' . $filename;
	db_insert($location);
	move_uploaded_file($tmp_name, $location);
}



header('Location: /index.php');