<?php
session_start();
require_once '../../conn.php';
if(isset($_POST['submitData']) && $_POST['submitData'] === "true"){
  $pass = mysqli_real_escape_string($conn,$_POST['card']);
  $sql = "select * from `users` where `pass` = '$pass'";
  $result = $conn -> query($sql);
  $row = $result -> fetch_assoc();
  if(strlen($row['user']) > 0){
    $_SESSION['user_login'] = $row['user'];
    $_SESSION['user_type'] = $row['user_type'];
    echo "success";
  }
}
?>
