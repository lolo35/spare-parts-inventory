<?php
session_start();
require_once '../../conn.php';
if(isset($_POST['post']) && $_POST['post'] === "true"){
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $oldLocation = "select `location` from `parts` where `id` = '$id'";
  $resOldLocation = $conn -> query($oldLocation);
  $oldLocationData = $resOldLocation -> fetch_assoc();

  $sql = "update `parts` set `status` = '0', `location` = '$location' where `id` = '$id'";
  if($conn -> query($sql)){
    $details = "select `asset_name`, `serial_n`, `location`, `status`, `details` from `parts` where `id` = '$id'";
    $result = $conn -> query($details);
    $rowPartDetails = $result -> fetch_assoc();
    $history = "insert into `history` (`asset_name`, `serial_n`, `location`, `status`, `details`, `user`, `trans`, `date`) values
                ('".$rowPartDetails['asset_name']."','".$rowPartDetails['serial_n']."','".$oldLocationData['location']."','".$rowPartDetails['status']."','".$rowPartDetails['details']."',
                '".$_SESSION['user_login']."','$location', '".date('Y-m-d h:m')."')";
    if($conn -> query($history)){
      echo "success";
    }    
  }else{
    echo $conn -> error;
  }
}
?>
