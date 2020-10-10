<?php
require_once 'pdo.php';
session_start();

// authorized access
if (!isset($_GET['auto_id'])) {
	$_SESSION['msg'] = 'Missing auto_id';
	header('Location:index.php');
	exit;
}	


$auto_id = $_GET['auto_id'];
// post reaction
if (isset($_POST['del_sbmt']) && isset($_POST['auto_id'])) {
	$sql1 = 'delete from autos where auto_id = :auto_id';
	$stmt=$pdo->prepare($sql1);
	$stmt->execute(array(':auto_id'=>$auto_id));
	$_SESSION['msg'] = 'Record deleted';
	header('Location:index.php');
	exit;
}

if (isset($_POST['cancel_sbmt'])) {
	header('Location:index.php');
	exit;
}




$sql="select * from autos where auto_id = :auto_id";
$stmt=$pdo->prepare($sql);
$stmt->execute(array(':auto_id'=> $auto_id));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Confirm: Deleting {$row['make']} {$row['model']} {$row['year']} {$row['mileage']}<br>";
?>

<form method="POST">
<input type="hidden" name='auto_id' value=$auto_id>
<input type="submit" name='del_sbmt' value='Delete'>
<input type="submit" name='cancel_sbmt' value='Cancel'>
</form>





