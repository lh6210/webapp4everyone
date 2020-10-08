<?php
require_once "pdo.php";
$stmt = $pdo->query("SELECT * FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>\n";
print_r($rows);
echo "</pre>\n";
