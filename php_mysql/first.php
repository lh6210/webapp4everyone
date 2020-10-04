<?php
echo "<pre>\n";
$host='localhost';
$port=3306;
$db='misc';
$user='lh';
$pw='a123';
$pdo = new PDO("mysql:host=$host;port=$port;dbname=$db",
    $user, $pw);

$stmt = $pdo->query("SELECT * FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

echo "</pre>\n";
