<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc', 
   'lh', 'a123');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function conn_set($sql, $arr) {
	global $pdo;
	$stmt = $pdo->prepare($sql);
	$stmt->execute($arr);
	$rows = $stmt->fetchall(PDO::FETCH_ASSOC);
	return $rows;
}


function conn_single($sql, $arr) {
	global $pdo;
	$stmt = $pdo->prepare($sql);
	$stmt->execute($arr);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}
