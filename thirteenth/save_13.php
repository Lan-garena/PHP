<?php 
session_start();
$text = $_POST["text"];
$_SESSION['text'] = $text;
header("Location: /index.php");