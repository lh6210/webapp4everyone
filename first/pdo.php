
<?php
$hostname = 'localhost';
$port = 3306;
$dbname = 'misc';
//$charset='utf8mb4';
$user = 'lh';
$pass = 'a123';
$dsn ="mysql:host=$hostname;port=$port;dbname=$dbname";  // must be double quotes
$pdo = new PDO($dsn, $user, $pass);
?>
