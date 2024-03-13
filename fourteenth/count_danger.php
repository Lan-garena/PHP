<?php 
session_start();
unset($_SESSION['count_click']);
header('Location: /index.php');

