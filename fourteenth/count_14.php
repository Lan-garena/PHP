<?php 
session_start();
$_SESSION['count_click'] = (int) $_SESSION['count_click']+1;
header('Location: /index.php');
