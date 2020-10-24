<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc', 
   'lh', 'a123');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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
