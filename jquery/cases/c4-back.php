<?php
  // $_POST is a PHP array
  
  sleep(5);
  $return['snack'] = 'chocolate';
  $return['drink'] = 'grape juice';
  //$var = json_encode($return);
  //error_log($var);
  //Do what you need to do with the info. The following are some examples.
  //if ($return["favorite_beverage"] == ""){
  //  $return["favorite_beverage"] = "Coke";
  //}
  //$return["favorite_restaurant"] = "McDonald's";
  
  //$return["cash"] = json_encode($return);
  //$return['cash'] = 5;
  // json_encode returns a string containing the JSON representation of the value
  //sleep(4);
  echo json_encode($return);

?>
