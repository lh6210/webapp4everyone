<?php // Do not put any HTML above this line
require_once 'pdo.php';
session_start();

/* 
login module: the inputs of email and password have to be consistent with the record stored in database 

session variables: 
hint(only for error warning in this page) 
email(for user's convenience in this page) 
user_id is needed for index.php
name is needed in the header for index.php
email is needed in add.php
 */

// the email input box remembers user's prior input
$email = isset($_SESSION['email'])?$_SESSION['email']:'';

// cancel submission 
if ( isset($_POST['cancel'] ) ) {
    session_unset();
    // Redirect the browser to game.php
    header("Location: index.php");
    exit;
}

$salt = 'XyZzy12*_';
//$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
// Pw is php123


// $hint= false;  // If we have no POST data

// sql injection protection: htmlentities for user input email and password
// verify the email and password are correct according to the database record, and return username, user_id
if ( isset($_POST['login']) ) {
    $_SESSION['email'] = htmlentities($_POST['email']); // $_SESSION['email'] is recorded, so that user don't have to type email again

    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['hint']= "User name and password are required";
	header('Location: login.php');
	exit;
    } 
    elseif (strpos($_POST['email'], '@') == false) { 
	$_SESSION['hint'] = "Email must have an at-sign (@)";
	header('Location: login.php');
	exit;
    }
    else {
        $pw= hash('md5', $salt.htmlentities($_POST['pass']));
	error_log($pw);
	$sql = 'select user_id, name from users where email = :email && password = :pw';
        $arr = array(':email'=>$_POST['email'], ':pw'=>$pw);
	$row = conn_single($sql, $arr);
	if ($row == false) {
	    $_SESSION['hint']= "Incorrect password";
	    error_log("Login fail ".$_SESSION['email']." $check");
	    header('Location: login.php');
	    exit;
        } else {
	    $_SESSION['user_id'] = $row['user_id'];
	    $_SESSION['name'] = $row['name'];
	    $_SESSION['email'] = $_POST['email'];
	    error_log("Login success ".$_SESSION['email']);
	    header('Location: index.php'); // go to index.php with valid $_SESSION['email']
	    exit;
        }
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>
<title>H Li</title>
</head>
<body>
<div class="container">
<h1>Please log in</h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if (isset($_SESSION['hint'])) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.$_SESSION['hint']."</p>\n");
    unset($_SESSION['hint']);
}
?>

<form method="POST">
<label for="nam">Email</label>
<input type="text" name="email" id="nam" value= "<?= $email ?>"><br/>
<label for="id_1723">Password</label>
<input type="text" name="pass" id="id_1723"><br/>
<!-- submit -->
<input type="submit" name="login" value="Log In">
<!-- cancel -->
<input type="submit" name="cancel" value="Cancel">
</form>
<!--<a href="#">Add New</a>-->
</div>
</body>
</html>
