<!DOCTYPE html>
<?php
require_once 'pdo.php';
session_start();
// session variables: name, user_id, error
// cookie variables: $_GET['profile_id']



echo "<head><title>H Li</title></head>";
if (!isset($_SESSION['user_id']) || !isset($_GET['profile_id'])) 
{
	die ('ACCESS DENIED');
} 

if (isset($_POST['save_sbmt'])) {
	if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['headline']) || empty($_POST['summary'])) {
		$_SESSION['error'] = 'All fields are required';
		header("Location:edit.php?profile_id={$_GET['profile_id']}");
		exit;
	} elseif (strpos($_POST['email'], '@') == false) {
		$_SESSION['error']='Email address must contain @';
		header("Location:edit.php?profile_id={$_GET['profile_id']}");
		exit;
	}
	else {
		$sql = "update profile set first_name = :firstName, last_name = :lastName, email = :email, headline = :headline, summary = :summary where profile_id = :profile_id"; 
		$data = array(':firstName'=>htmlentities($_POST['firstName']), ':lastName'=>htmlentities($_POST['lastName']), ':email'=>htmlentities($_POST['email']), ':headline'=>htmlentities($_POST['headline']), ':summary'=>htmlentities($_POST['summary']), ':profile_id'=>$profile_id);
		$stmt = $pdo->prepare($sql);
		$stmt->execute($data);

		$_SESSION['msg'] = 'Record updated';
		header('location:index.php');
		exit;
	}
}

if (isset($_POST['cancel_sbmt'])) {
	header('Location:index.php');
	exit;
}

// display the webpage
// flash messages
if (isset($_SESSION['error'])) {
	echo "<p style='color: red'>{$_SESSION['error']}</p>";
	unset($_SESSION['error']);
}

$profile_id = $_GET['profile_id'];

$sql='select * from profile where profile_id = :profile_id';
$stmt= $pdo->prepare($sql);
$stmt->execute([':profile_id'=>$profile_id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$firstName = $row['first_name'];
$lastName = $row['last_name'];
$email = $row['email'];
$headline = $row['headline'];
$summary = $row['summary'];

echo "<form method='POST'>";
echo "<label for='firstName'>First Name:</label><br>";
echo "<input type='text' name='firstName' id='firstName'value = $firstName ><br>";
echo "<label for='lastName'>Last Name:</label><br>";
echo "<input type='text' name='lastName' id='lastName' value= $lastName><br>";
echo "<label for='email'>Email:</label><br>";
echo "<input type='text' name='email' id='email' value=$email><br>";
echo "<label for='headline'>Headline:</label><br>";
echo "<input type='text' name='headline' id='headline' value=$headline><br>";
echo "<label for='summary'>Summary:</label><br>";
echo "<input type='text' name='summary' id='summary' value=$summary><br>";
echo "<input type='submit' name='save_sbmt' value='Save'>";
echo "<input type='submit' name='cancel_sbmt' value='Cancel'>";
echo "</form>";


?>


