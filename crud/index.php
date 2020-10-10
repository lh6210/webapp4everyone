<!DOCTYPE html>

<?php
require_once 'pdo.php';
session_start();

echo "<head><title>H Li</title></head>";
echo "<h2>Welcome to the Automobiles Database</h2>";

if (isset($_SESSION['msg'])) {
	echo "<p style='color: green'>{$_SESSION['msg']}</p>";
	unset($_SESSION['msg']);
}

if (!isset($_SESSION['who'])) {
	echo "<p><a href='login.php'>Please login in</a></p>";
	echo "<p>Attemp to <a href='add.php'>add data </a>without logging in</p>";
}
else {
	// fetch tables from database
	$sql= 'select * from autos';
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$rows=$stmt->fetchall(PDO::FETCH_ASSOC);
	echo "<table><tbody>";
	echo "<thead><th>Make</th><th>Model</th><th>Year</th><th>Mileage</th><th>Action</th></thead>";
	foreach($rows as $row) {
		echo "<tr><td>{$row['make']}</td><td>{$row['model']}</td><td>{$row['year']}</td><td>{$row['mileage']}</td>";
		echo "<td><input type='hidden' name='auto_id' value={$row['auto_id']}>";
		echo "<a href='edit.php?auto_id={$row['auto_id']}'>Edit</a>";
		echo "  ";
		echo "<a href='del.php?auto_id={$row['auto_id']}'>Delete</a></td></tr>";	
		
	}
	echo "</tbody></table>";
	echo "<a href='add.php'>Add New Entry</a><br>";
	echo "<a href='logout.php'>Log out</a><br>";
}

?>

