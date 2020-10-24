<?php 
require_once 'pdo.php';

// session keys: user_id, msg, name, email, error
// error is the flash message for add.php
// msg is the flash message for index.php
// email comes from index.php and is for profile.email
// name is for header on add.php
session_start();
    



// if not logged in
if (!isset($_SESSION['user_id'])) {
    echo "<head><title>H Li</title></head>";
    die('ACCESS DENIED');
}

// cancel adding records and head to index.php, no msg
if (isset($_POST['cancel'])) {
    unset($_SESSION['msg']);
    header('Location: index.php');
    exit;
}

// add a new record, validate and redirect with a message
if (isset($_POST['add'])) {
    if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['headline']) || empty($_POST['summary'])) {
		$_SESSION['error'] = 'All fields are required';
		header('Location:add.php');
		exit;
	} elseif (strpos($_POST['email'], '@') == false) {
		$_SESSION['error']='Email address must contain @';
		header('Location:add.php');
		exit;
	}
	else {
		$sql = "insert into profile (user_id, first_name, last_name, email, headline, summary) values (:user_id, :firstName, :lastName, :email, :headline, :summary)";
		$data = array(':user_id'=> $_SESSION['user_id'], ':firstName'=>htmlentities($_POST['firstName']), ':lastName'=>htmlentities($_POST['lastName']), ':email'=>htmlentities($_POST['email']), ':headline'=>htmlentities($_POST['headline']), ':summary'=>htmlentities($_POST['summary']));
		$stmt = $pdo->prepare($sql);
		$stmt->execute($data);

		$_SESSION['msg'] = 'Record inserted';
		header('location:index.php');
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>H Li</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
<h1>Adding Profile for <?= $_SESSION['name'] ?></h1>
<?php 
if (isset($_SESSION['error'])) {
	echo "<p style='color: red'>{$_SESSION['error']}</p>";
	unset($_SESSION['error']);
}
?>
<form method='POST'>
<label for='firstName'>First Name:</label><br>
<input type='text' name='firstName' id='firstName'><br>
<label for='lastName'>Last Name:</label><br>
<input type='text' name='lastName' id='lastName'><br>
<label for='email'>Email:</label><br>
<input type='text' name='email' id='email' value= <?= $_SESSION['email'] ?>><br>
<label for='headline'>Headline:</label><br>
<input type='text' name='headline' id='headline'><br>
<label for='summary'>Summary:</label><br>
<input type='text' name='summary' id='summary'><br>
<input type='submit' name='add' value='Add'>
<input type='submit' name='cancel' value='Cancel'>
</form>
	
</body>
</html>
