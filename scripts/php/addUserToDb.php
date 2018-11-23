<?php
session_start();
require_once '../../conn.php';
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === "admin"){
  if(isset($_POST['addUser']) && $_POST['addUser'] === "true"){
    $cardId = mysqli_real_escape_string($conn, $_POST['card']);
    //echo $cardId;
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $sql = "insert into `users` (`user`,`pass`) values ('$user', '$cardId')";
    if($conn -> query($sql)){
      ?>
      <div class="alert alert-success" role="alert">
        User was successfully created!
      </div>
      <?php
      $filename = "../../login.log";
      if(file_exists($filename)){
        unlink($filename);
      }
    }
  }
}
?>
