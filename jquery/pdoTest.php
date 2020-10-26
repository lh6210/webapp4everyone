<?php

/*
This document is for multirow-insertion practice.
First create a table in mysql:
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `make` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
*/

// to connect to mysql database
require_once 'pdo.php';

// simulated data from client side
$data = array(
		array("make" => "Nissan",
			"model" => "Primera"),
		array("make" => "Toyota",
			"model" => "Corolla"),
		array("make" => "Toyota",
			"model" => "Camery")
);	

$parsedDt = getValues($data);
//echo gettype($parsedDt);
echo "<pre>";
print_r($parsedDt);
echo "</pre>";

$sql = "insert into cars (make, model) values (?, ?)";
$stmt = $pdo->prepare($sql);
try {
	$pdo->beginTransaction();
	foreach($parsedDt as $row) {
			$stmt->execute($row);
	}
	$pdo->commit();
	echo "Transaction completed!";
} catch (Exception $e) {
	$pdo->rollback();
	throw($e);
}

// data from front-end is an array of arrays
function getValues($data) {
	$params = array();
	$rowParam = array();
	foreach($data as $obj) {
		foreach($obj as $key => $value) {
			// group only the values in the array
			$rowParam[] = $value;
		}
		$params[] = $rowParam;
		$rowParam = [];
	}
	return $params;
}

?>
