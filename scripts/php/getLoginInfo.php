<?php
$filename = "../../login.log";
if(file_exists($filename)){
  $loginData = file_get_contents($filename);
  $loginData = substr($loginData, 2,20);
  echo $loginData;
  //unlink($filename);
}
?>
