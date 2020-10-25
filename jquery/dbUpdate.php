<?php 
require_once 'pdo.php';

//$data = isset($_POST)? $_POST:'nothing here';

if (isset($_POST['req'])) {
	$arr = $_POST['req'];
	$x = (object)array("position" => "front-end programmer", "description"=> "senior");
	array_push($arr, $x);
	echo json_encode($arr); die;
} else {
	$response = ['error' => 'No input specified'];
	echo json_encode($response);
}




?>
