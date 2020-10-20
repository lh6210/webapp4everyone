<?php
  if ( !isset($_POST['val']) ) return;
  sleep(5);
  echo('From the server: '.$_POST['val']);
?>
