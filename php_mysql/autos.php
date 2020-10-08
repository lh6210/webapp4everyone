<?php
require_once 'pdo.php';

session_start();
$_SESSION['make']='';
$_SESSION['mileage']='';
$_SESSION['year']='';

// redirect to index.php if logout
if (isset($_POST['logout'])) {
    header('Location: index.php');
}

// add a new record, post and redirect
if (isset($_POST['add_sbmt'])) {
	if (empty($_POST['make'])) {
		echo 'Make is required';
	} elseif (!is_numeric($_POST['mileage']) || !is_numeric($_POST['year'])) {
		echo 'Mileage and year must be numeric.';
	}
	else {
		$sql = "insert into autos (make, year, mileage) values (:make, :year, :mileage)";
		$data = array(':make'=> htmlentities($_POST['make']), ':year'=>$_POST['year'], ':mileage'=>$_POST['mileage']);
		$stmt = $pdo->prepare($sql);
		$stmt->execute($data);

		$_SESSION['make']=$_POST['make'];
		$_SESSION['mileage']=$_POST['mileage'];
		$_SESSION['year']=$_POST['year'];
		header('location:http://localhost/php_mysql/autos.php');
		exit;
		//echo 'Record inserted!';
	}
}

/*if (!isset($_GET['name'])) {
    die("Name parameter missing");
}
 */
//else {
//    $nam=$_GET['name'];
//    echo "<h2>Tracking Autos for $nam</h2>";
    echo "<form method='POST'>";
    echo "<label for='make'>Make:</label><br>";
    echo "<input type='text' name='make' id='make'><br>";
    echo "<label for='yr'>Year:</label><br>";
    echo "<input type='text' name='year' id='yr'><br>";
    echo "<label for='miles'>Mileage:</label><br>";
    echo "<input type='text' name='mileage' id='miles'><br>";
    echo "<input type='submit' name='add_sbmt' value='Add'>";
    echo "<input type='submit' name='logout' value='Logout'>";
    echo "</form>";

    echo "<table><thead><th>Make</th><th>Year</th><th>Mileage</th></thead>";
    echo "<tbody>";
    $sql2= 'select make, year, mileage from autos';
    $stmt2= $pdo->prepare($sql2);
    $stmt2->execute();
    $data2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
    foreach ($data2 as $row) {
	    echo "<tr><td>";
	    echo "{$row['make']}</td><td>{$row['year']}</td><td>{$row['mileage']}</td>";
	    echo "</tr>";
    }

    echo "</table>";



//}
?>





