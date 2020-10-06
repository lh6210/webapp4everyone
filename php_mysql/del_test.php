<head>
<style>
    table, td {
        border: 1px solid black;
    }
</style>

</head>

<?php
require_once "pdo.php";

if (isset($_POST['user_id'])) {
    $sql="delete from users where user_id=:uid";
    $data = array(':uid'=>$_POST['user_id']);
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
}

$sql2 = "select * from users";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$data = $stmt2->fetchall(PDO::FETCH_ASSOC);
echo "<table>";
foreach($data as $row)
{
	echo "<tr><td>";
	echo $row['user_id'];
	echo "</td><td>";
	echo $row['name'];
	echo "</td><td>";
	echo $row['email'];
	echo "</td><td>";
	echo $row['password'];
	echo "</td></tr>";
}
echo "</table>";


?>


<form method="post">
<p>Delete a record</p>
<label for="user_id">User ID:</label>
<input type="text" id="user_id" name="user_id">
<input type="submit" value="Delete">

</form>


