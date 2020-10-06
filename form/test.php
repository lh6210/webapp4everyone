
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<?php  
//header("Location: http://localhost/form/index.php");
$salt='XyZzy12*_';
$ans=hash('md5', $salt.'php123');

?>
<body>
<p>temp page</p>
<p><?php echo "$ans";    ?></p>
</body>



</html>
