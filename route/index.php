<!DOCTYPE html>

<?php
session_start();
session_unset();
?>

<html>
<head>
<title>H Li</title>
</head>
<body>
<div class="container">
<h1>Welcome to Autos Database</h1>
<p>
<a href="login.php">Please Log In</a>
</p>
<p>
Attempt to go to 
<a href="view.php">view.php</a> without logging in - it should fail with an error message.
</p><p>
Attempt to go to 
<a href="add.php">add.php</a> without logging in - it should fail with an error message.
</p>
<p>
<a href="http://www.wa4e.com/code/rps.zip"
 target="_blank">Source Code for this Application</a>
</p>
</div>
</body>

