<?php 
require_once 'pdo.php';

//$data = isset($_POST)? $_POST:'nothing here';

// test the response from the server to client
/*
if (isset($_POST['req'])) {
	$arr = $_POST['req'];
	$x = (object)array("position" => "front-end programmer", "description"=> "senior");
	array_push($arr, $x);
	echo json_encode($arr); die;
} else {
	$response = ['error' => 'No input specified'];
	echo json_encode($response);
}
 */

if (isset($_POST['req'])) {
	$arr = $_POST['req'];
	// fetch data and update the database


} else {
	$response = ['error'=>'No input specified'];
	echo json_encode($response);
}

?>
