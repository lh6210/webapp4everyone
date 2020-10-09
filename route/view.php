<?php
require_once 'pdo.php';

// session keys: who, msg 

session_start();
echo "<head><title>H Li</title></head>";

// index.php->view.php: this will happen
if (!isset($_SESSION['who'])) {
    die("Not logged in");
    exit;
}
else // login.php/add.php->view.php 
{
    $name=$_SESSION['who'];
    echo "<h2>Tracking Autos for $name</h2>";

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        $_SESSION['msg'] = false;
    }


    echo "<table><thead><th>Make</th><th>Year</th><th>Mileage</th></thead>";
    echo "<tbody>";
    $sql2= 'select make, year, mileage from autos';
    $stmt2= $pdo->prepare($sql2);
    $stmt2->execute();
    $data2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
    foreach ($data2 as $row) {
	    echo "<tr><td>";
	    echo "{$row['year']}</td><td>{$row['make']}</td><td>{$row['mileage']}</td>";
	    echo "</tr>";
    }

    echo "</table>";
    echo "<p><a href='add.php'>Add New</a>";
    echo "<a href='index.php'>Log out</a></p>";

}
?>



