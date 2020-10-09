<?php 
require_once 'pdo.php';

// session keys: who, msg

session_start();

// cancel heads to view.php, no msg
if (isset($_POST['cancel'])) {
	$_SESSION['msg'] = false;
	header('Location: view.php');
	exit;
}

// add a new record, validate and redirect with a message
if (isset($_POST['add_sbmt'])) {
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


if (!isset($_SESSION['who'])) {
    echo 'Not logged in';
    exit;
} else {
    $name = $_SESSION['who'];
    echo "Tracking Autos for $name";

    echo "<form method='POST'>";
    echo "<label for='make'>Make:</label><br>";
    echo "<input type='text' name='make' id='make'><br>";
    echo "<label for='yr'>Year:</label><br>";
    echo "<input type='text' name='year' id='yr'><br>";
    echo "<label for='miles'>Mileage:</label><br>";
    echo "<input type='text' name='mileage' id='miles'><br>";
    echo "<input type='submit' name='add_sbmt' value='Add'>";
    echo "<input type='submit' name='cancel' value='Cancel'>";
    echo "</form>";
}

?>
