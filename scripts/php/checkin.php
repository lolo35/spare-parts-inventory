<?php
session_start();
require_once '../../conn.php';
if(isset($_POST['post']) && $_POST['post'] === "true"){
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $sql = "update `parts` set `status` = '1',`location` = '$location' where `id` = '$id'";
  if($conn -> query($sql)){
    echo "success";
  }else{
    echo $conn -> error;
  }
}
?>
