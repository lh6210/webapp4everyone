<?php
// connect to mysql
$host = 'localhost';
$port = 3306;
$database = 'misc';
$user = 'lh';
$password = 'a123';
$options = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database",  
   $user, $password, $options);
// See the "errors" folder for details...
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//return will be a set of rows
function conn_set($sql, $variablesArray) {
	global $pdo;
	$stmt = $pdo->prepare($sql);
	$stmt->execute($variablesArray);
	$rows = $stmt->fetchall(PDO::FETCH_ASSOC);
	return $rows;
}

// return will be a single row
function conn_single($sql, $variables) {
	global $pdo;
	$stmt = $pdo->prepare($sql);
	$stmt->execute($variables);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}
