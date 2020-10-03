<!DOCTYPE html>
<head>
</head>
<body>
<?php
echo "<pre>\n";
require_once "pdo.php";
$stmt = $pdo->query("select * from users");
while ($row = $stmt->fetch()) {
  echo $row['name'].'  '.$row['email']."<br />\n";
}
echo "</pre>\n";
?>



</body>
