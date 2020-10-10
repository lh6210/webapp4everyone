<?php 
require_once 'pdo.php';

// session keys: who, msg

session_start();

// if not logged in
if (!isset($_SESSION['who'])) {
    echo "<head><title>H Li</title></head>";
    die('ACCESS DENIED');
}

// cancel adding records and head to view.php, no msg
if (isset($_POST['cancel'])) {
	$_SESSION['msg'] = false;
	header('Location: index.php');
	exit;
}

// add a new record, validate and redirect with a message
if (isset($_POST['add'])) {
	if (empty($_POST['make']) || empty($_POST['model']) || empty($_POST['year']) || empty($_POST['mileage'])) {
		$_SESSION['error'] = 'All fields are required';
		header('Location:add.php');
		exit;
	} elseif (!is_numeric($_POST['mileage']) || !is_numeric($_POST['year'])) {
		$_SESSION['error']='Mileage and year must be numeric.';
		header('Location:add.php');
		exit;
	}
	else {
		$sql = "insert into autos (make, model, year, mileage) values (:make, :model, :year, :mileage)";
		$data = array(':make'=> htmlentities($_POST['make']), ':model'=>htmlentities($_POST['model']), ':year'=>htmlentities($_POST['year']), ':mileage'=>htmlentities($_POST['mileage']));
		$stmt = $pdo->prepare($sql);
		$stmt->execute($data);

		$_SESSION['msg'] = 'Record inserted';
		header('location:index.php');
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
<?php 
if (isset($_SESSION['error'])) {
	echo "<p style='color: red'>{$_SESSION['error']}</p>";
	unset($_SESSION['error']);
}
?>
<form method='POST'>
<label for='make'>Make:</label><br>
<input type='text' name='make' id='make'><br>
<label for='model'>Model:</label><br>
<input type='text' name='model' id='model'><br>
<label for='yr'>Year:</label><br>
<input type='text' name='year' id='yr'><br>
<label for='miles'>Mileage:</label><br>
<input type='text' name='mileage' id='miles'><br>
<input type='submit' name='add' value='Add'>
<input type='submit' name='cancel' value='Cancel'>
</form>
	
</body>
</html>
