
<?php 
$host='localhost';
$port=3306;
$db='LearningPath';
$user='lh';
$pw='a123';
$sdn="mysql:host=$host;port=$port;dbname=$db";
$pdo = new PDO($sdn, $user, $pw);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>
