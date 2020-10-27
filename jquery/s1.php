<?php
require_once 'pdo.php';


$req = isset($_POST['req'])? $_POST['req']:['error'.'No input specified'];

//echo json_encode(gettype($req).$req);
// $req is a string
/*
echo $req."\n";
echo gettype($req);
echo "<pre>";
print_r($req); 
echo "</pre>";
 */
//$sql = "insert into ? (make, model) values (?, ?)";
//$stmt = $pdo->prepare($sql);
//$stmt->execute(['cars']);

//$sql = 'select make, model from cars';
//$stmt = $pdo->query($sql);

/*
$sql1 = "select make, model from :tb";
$stmt = $pdo->prepare($sql1);
$stmt->execute(array('tb' => 'cars'));
*/

$sql2 = "select make, model from cars";
$stmt = $pdo->prepare($sql2);
//$stmt->bindValue(':tb',$req);
$stmt->execute();
$row = $stmt->fetchall(PDO::FETCH_ASSOC);
echo json_encode($row);
//$stmt->execute($pair);
//$data = $stmt->fetch(PDO::FETCH_ASSOC);
//$data = $stmt->rowCount();
//echo json_encode($data);
//echo json_encode($data);

/*
if ($req) {
	//$arr = $_POST['req-profile'];
	$sql = 'select first_name, last_name, headline from $req';
	$stmt = $pdo->query($sql);
	$data = $stmt->fetchall(PDO::FETCH_ASSOC);
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	echo json_encode $data;
} else {
	$response = ['error' => 'No input specified'];
	echo json_encode($response);
}
 */

?>
