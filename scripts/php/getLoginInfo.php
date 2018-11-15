<?php
$filename = "../../login.log";
if(file_exists($filename)){
  $loginData = file_get_contents($filename);
  echo $loginData;
}
?>
