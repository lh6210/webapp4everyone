<!DOCTYPE html>

<?php
require_once 'pdo.php';
session_start();
// session variables: msg (from add.php, edit.php, del.php), user_id, name, email 
// if user_id is set, it means the user has logged in


if (!isset($_SESSION['user_id'])) {
// function display table with edit/delete hidden
//echo "<p>Attemp to <a href='add.php'>add data </a>without logging in</p>";
    echo "<head><title>H Li</title></head>";
    echo "<h2>Welcome to Resume Registry, Visitor:</h2>";
    echo "<p><a href='login.php'>Please login in</a></p>";
    $sql= 'select first_name, last_name, headline, profile_id from profile';
    $arr = array();
    $rows = conn_set($sql, $arr);

    if ($rows == false) {
	echo 'No records.'; 
    }
    else 
    {
	echo "<table><tbody>";
	echo "<thead><th>Name</th><th>Headline</th></thead>";
	foreach($rows as $row) {
	    echo "<tr><td><a href='view.php?profile_id={$row['profile_id']}'>{$row['first_name']}.{$row['last_name']}</a></td><td>{$row['headline']}</td>";
	}
	echo "</tbody></table>";
    }
} else {
    echo "<head><title>H Li</title></head>";
    echo "<h2>Welcome to Resume Registry, {$_SESSION['name']}</h2>";

	// flash message
    if (isset($_SESSION['msg'])) {
	echo "<p style='color: green'>{$_SESSION['msg']}</p>";
	unset($_SESSION['msg']);
    }

    $sql= 'select first_name, last_name, headline, profile_id, user_id from profile';
    $arr = array();
    $rows = conn_set($sql, $arr);

    if ($rows == false) {
	echo 'No records.'; 
    }
    else {
	echo "<table><tbody>";
	echo "<thead><th>Name</th><th>Headline</th><th>Action</th></thead>";
	foreach($rows as $row) {
	    if ( $row['user_id'] !== $_SESSION['user_id']) {
		$type = 'hidden'; 
	    } else {
		$type = '';
	    }
	    echo "<tr><td><a href='view.php?profile_id={$row['profile_id']}'>{$row['first_name']}.{$row['last_name']}</a></td><td>{$row['headline']}</td>";
	    echo "<td><input type='hidden' name='profile_id' value={$row['profile_id']}>";
	    echo "<a href='edit.php?profile_id={$row['profile_id']}' $type>Edit</a>";
	    echo "  ";
	    echo "<a href='del.php?profile_id={$row['profile_id']}' $type>Delete</a></td></tr>";	
	}
	echo "</tbody></table>";
    }
    echo "<br>";
    echo "<a href='add.php'>Add New Entry</a><br>";
    echo "<a href='logout.php'>Log out</a><br>";
}
?>

