<?php // Do not put any HTML above this line
session_start();

$email = isset($_SESSION['who'])?$_SESSION['who']:'';

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    exit;
}

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is php123


// $hint= false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['Add']) ) {
    $_SESSION['who'] = htmlentities($_POST['email']); // $_SESSION['who'] is recorded
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
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash && $_SESSION['who'] == 'csev@umich.edu') {
            // Redirect the browser to game.php
	    error_log("Login success ".$_SESSION['who']);
            header('Location: view.php');
            exit;
        } else {
            $_SESSION['hint']= "Incorrect password";
	    error_log("Login fail ".$_SESSION['who']." $check");
	    header('Location: login.php');
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
<h1>Please Log In</h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if (isset($_SESSION['hint'])) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.$_SESSION['hint']."</p>\n");
    $_SESSION['hint'] = false;
}
?>
<form method="POST">
<label for="nam">Email</label>
<input type="text" name="email" id="nam" value= "<?= $email ?>"><br/>
<label for="id_1723">Password</label>
<input type="text" name="pass" id="id_1723"><br/>
<!-- submit -->
<input type="submit" name="Add" value="Log In">
<!-- cancel -->
<input type="submit" name="cancel" value="Cancel">
</form>
<!--<a href="#">Add New</a>-->
</div>
</body>
