<?php 
require_once 'pdo.php';

// session keys: who, msg

session_start();

// if not logged in
if (!isset($_SESSION['who'])) {
    echo "<head><title>H Li</title></head>";
    echo 'Not logged in';
    exit;
}

// cancel adding records and head to view.php, no msg
if (isset($_POST['cancel'])) {
	$_SESSION['msg'] = false;
	header('Location: view.php');
	exit;
}

// add a new record, validate and redirect with a message
if (isset($_POST['add'])) {
	if (empty($_POST['make'])) {
		echo 'Make is required';
	} elseif (!is_numeric($_POST['mileage']) || !is_numeric($_POST['year'])) {
		echo 'Mileage and year must be numeric.';
	}
	else {
		$sql = "insert into autos (make, year, mileage) values (:make, :year, :mileage)";
		$data = array(':make'=> htmlentities($_POST['make']), ':year'=>htmlentities($_POST['year']), ':mileage'=>htmlentities($_POST['mileage']));
		$stmt = $pdo->prepare($sql);
		$stmt->execute($data);

		$_SESSION['msg'] = 'Record inserted';
		header('location:view.php');
		exit;
		//echo 'Record inserted!';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>H Li</title>
</head>
<body>
<h1>Tracking Autos for <?= $_SESSION['who'] ?></h1>
<form method='POST'>
<label for='make'>Make:</label><br>
<input type='text' name='make' id='make'><br>
<label for='yr'>Year:</label><br>
<input type='text' name='year' id='yr'><br>
<label for='miles'>Mileage:</label><br>
<input type='text' name='mileage' id='miles'><br>
<input type='submit' name='add' value='Add'>
<input type='submit' name='cancel' value='Cancel'>
</form>
	
</body>
</html>
