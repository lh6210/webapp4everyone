<?php
require_once "pdo.php";

if ( isset($_POST['name']) && isset($_POST['email']) 
     && isset($_POST['password'])) {
    $sql = "INSERT INTO users (name, email, password) 
              VALUES (:name, :email, :password)";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']));
}
?>
<html>
<head></head>
<body>
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
</html>
