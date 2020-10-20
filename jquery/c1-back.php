<?php

//$array = isset($_POST)? $_POST:'not received data';

//$data = json_decode($json, true);  // associative array
//$array['server'] = 'extra';
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

// get the value from the query string
$array = (isset($_POST)) ? $_POST: '';
// add some ingrdients into the value we just fetched
$array["weather"] = "shiny";
// construct the message that we want to send back to the client
// json encoded string
echo json_encode($array);

?>
