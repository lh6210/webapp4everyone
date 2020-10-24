<?php
session_start();
session_unset();
error_log('user logged out.');
header('Location:index.php');
exit;

?>
