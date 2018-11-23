<?php
session_start();
require_once '../../conn.php';
if(isset($_POST['submit']) && $_POST['submit'] === "true"){
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $serialN = mysqli_real_escape_string($conn, $_POST['name']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $details = mysqli_real_escape_string($conn, $_POST['details']);

  $sql = "insert into `parts` (`asset_name`, `serial_n`, `location`,`status`, `details`) values ('$name', '$serialN', '$location', 1, '$details')";
  if($conn -> query($sql)){
    ?>
    <div class="alert alert-success" role="alert">
      <?php echo $name;?> was added successfully!
    </div>
    <?php
  }else{
    echo $conn -> error;
  }
}
?>
