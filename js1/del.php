<!DOCTYPE html>
<?php
require_once 'pdo.php';
session_start();
// session variables: msg, name, user_id
// cookie variables: $_GET['profile_id']


if (!isset($_SESSION['user_id']) || !isset($_GET['profile_id'])) {
    die('ACCESS DENIED');
}

if (isset($_SESSION['error'])) {
    echo "<p style='color: red'>{$_SESSION['error']}</p>";
    unset($_SESSION['error']);
}

$profile_id = $_GET['profile_id'];


// post reaction
if (isset($_POST['del_sbmt'])) {
    $sql1 = 'delete from profile where profile_id = :profile_id';
    $stmt=$pdo->prepare($sql1);
    $stmt->execute(array(':profile_id'=>$profile_id));
    $_SESSION['msg'] = 'Record deleted';
    header('Location:index.php');
    exit;
}

if (isset($_POST['cancel_sbmt'])) {
    header('Location:index.php');
    exit;
}

$sql="select * from profile where profile_id = :profile_id";
$stmt=$pdo->prepare($sql);
$stmt->execute(array(':profile_id'=> $profile_id));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$firstName = $row['first_name'];
$lastName = $row['last_name'];

echo "Confirm: Deleting Profile:";
?>

<table>
    <tr>
    <td>First Name: <?= $firstName ?></td>
    </tr>
    <tr>
    <td>Last Name: <?= $lastName ?> </td>
    </tr>
</table>


<form method="POST">
    <input type="hidden" name='profile_id' value="<?= $profile_id ?>">
    <input type="submit" name='del_sbmt' value='Delete'>
    <input type="submit" name='cancel_sbmt' value='Cancel'>
</form>





