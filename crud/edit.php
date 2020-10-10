
<?php
require_once 'pdo.php';
session_start();

if (!isset($_GET['auto_id'])) {
	die('ACCESS DENIED');
}

$auto_id = $_GET['auto_id'];
$sql='select * from autos where auto_id = :auto_id';
$stmt= $pdo->prepare($sql);
$stmt->execute([':auto_id'=>$auto_id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$make = $row['make'];
$model = $row['model'];
$year = $row['year'];
$mileage = $row['mileage'];





if (isset($_SESSION['error'])) {
	echo "<p style='color: red'>{$_SESSION['error']}</p>";
       unset($_SESSION['error']);
}



if (isset($_POST['save_sbmt'])) {
	if (empty($_POST['make']) || empty($_POST['model']) || empty($_POST['year']) || empty($_POST['mileage'])) {
	$_SESSION['error'] ='All fields are required';
	header("Location:edit.php?auto_id=$auto_id");
	exit;
	} elseif (!is_numeric($_POST['mileage']) || !is_numeric($_POST['year'])) {
	$_SESSION['error']='Mileage and year must be numeric.';
	header("Location:edit.php?auto_id=$auto_id");
	exit;
	} else {
	$sql2='update autos set make=:make, model=:model, year=:year, mileage=:mileage where auto_id=:auto_id';
	$cond = array(':make'=>htmlentities($_POST['make']), ':model'=>htmlentities($_POST['model']), ':year'=>htmlentities($_POST['year']), ':mileage'=>htmlentities($_POST['mileage']), ':auto_id'=>$auto_id);
	$stmt=$pdo->prepare($sql2);
	$stmt->execute($cond);
	$_SESSION['msg']='Record edited';
	header('Location:index.php');
	exit;
	}
}

if (isset($_POST['cancel_sbmt'])) {
	header('Location:index.php');
	exit;
}



?>

<form method="POST">
<p>
<label for="make">Make</label>
<input type="text" name='make' value="<?=$make?>" id='make'></p><p>
<label for="model">Model</label>
<input type="text" name='model' value="<?=$model?>" id='model'></p><p>
<label for="year">Year</label>
<input type="text" name='year' value="<?=$year?>" id='year'></p><p>
<label for="mileage">Mileage</label>
<input type="text" name='mileage' value="<?=$mileage?>" id='mileage'></p>
<input type="submit" name='save_sbmt' value='Save'>
<input type="submit" name='cancel_sbmt' value='Cancel'>
</form>




