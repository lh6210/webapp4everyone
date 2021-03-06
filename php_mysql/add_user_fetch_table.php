<?php
require_once "pdo.php";

// the submit action in the form will trigger an insertion of a new record
if ( isset($_POST['name']) && isset($_POST['email']) 
     && isset($_POST['password'])) {
    $data = array ( ':name'=> $_POST['name'], ':email'=>$_POST['email'], ':password'=>$_POST['password']);
    $sql = "INSERT INTO users (name, email, password) 
              VALUES (:name, :email, :password)";  //placeholders
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute( $data);  // corresponding key-value pairs
}

// display all the records in the database on the page
$stmt = $pdo->prepare("SELECT name, email, password FROM users");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
<head></head>
<body>

<table border="1">    <!-- display table users on html page -->
<?php
echo "<tr><th>name</th>
	<th>email</th>
	<th>password</th></tr>";
	
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo($row['name']);
    echo("</td><td>");
    echo($row['email']);
    echo("</td><td>");
    echo($row['password']);
    echo("</td></tr>\n");
}
?>
</table>
<p>Add A New User</p>
<form method="post">
<label for="input_name">Name:</label><br>
<input type="text" id="input_name" name="name" size="40"></p>
<label for="input_email">Email:</label><br>
<input type="text" id="input_email" name="email"></p>
<label for="input_pw">Password:</label><br>
<input type="password" id="input_pw" name="password"></p>
<p><input type="submit" value="Add New"/></p>
</form>
</body>
