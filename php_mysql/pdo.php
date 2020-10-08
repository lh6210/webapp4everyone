<?php
$host='localhost';
$port=3306;
$db='misc';
$user='lh';
$pw='a123';
$dsn="mysql:host=$host;port=$port;dbname=$db";
$pdo = new PDO($dsn, $user, $pw);
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>


