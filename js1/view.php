<?php
require_once 'pdo.php';
session_start();

$profile_id = $_GET['profile_id'];
$sql = 'select * from profile where profile_id = :profile_id';
$arr = array(':profile_id'=>$profile_id);
$row = conn_single($sql, $arr);
?>


<head>
<title>H Li</title>
</head>
<body>
<h1>Profile Information:</h1>
<table>
    <tr>
    <td>First Name:</td><td><?= $row['first_name'] ?></td>
    </tr>
    <tr>
    	<td>Last Name:</td>
	<td><?= $row['last_name']?></td>
    </tr>
    <tr>
    	<td>Email:</td>
	<td><?= $row['email'] ?></td>
    </tr>
    <tr>
    	<td>Headline:</td>
	<td><?= $row['headline'] ?></td>
    </tr>
    <tr>
    	<td>Summary:</td>
	<td><?= $row['summary'] ?></td>
    </tr>
</table>

<a href="index.php">Done</a>

</body>
