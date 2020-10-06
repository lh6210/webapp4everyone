<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
<?php
$host='sql304.byethost33.com';
$db='b33_26749185_LearningPath';
$user='b33_26749185';
$pw='Sa56830640!';
$port=3306;
$charset='utf8mb4';

$dsn="mysql:host=$host;dbname=$db;charset=$charset;port=$port";

$pdo=new PDO($dsn, $user, $pw);
$sql = 'select * from courses';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetch();

echo '<pre>';
print_r($data);
echo '</pre>';
?>

</head>
<body>
<p>this is a test page.</p>
	
</body>
</html>

