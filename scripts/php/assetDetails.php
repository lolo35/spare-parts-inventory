<?php
session_start();
require_once '../../conn.php';
if(isset($_GET['id'])){
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "select * from `parts` where `id` = '$id'";
  $result = $conn -> query($sql);
  $row = $result -> fetch_assoc();
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <?php
        if(file_exists($row['id'].'jpg')){
          $src = "images/" . $row['id'] . "jpg";
        }else{
          $src = "images/placeholder.png";
        }
        ?>
        <img class="img-fluid" src="<?php echo $src;?>" width="225" height="225" alt="<?php echo $row['asset_name'];?>">
      </div>
      <div class="col-sm-6">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm">
              <h5><?php echo $row['asset_name'];?></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <p class="text-muted">Serial number: <?php echo $row['serial_n'];?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <p>Location: <?php echo $row['location'];?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <?php
              if($row['status'] == 0){
                ?>
                <div class="alert alert-danger" role="alert">
                  <strong>Checked out</strong>
                </div>
                <?php
              }else{
                ?>
                <div class="alert alert-success" role="alert">
                  <strong>On location</strong>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <h4>Additional Information</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <p><?php echo $row['details'];?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <button type="button" class="btn btn-success btn-block" id="check-in-btn" <?php if($row['status'] == 0){}else{ echo "disabled";} ?>>Check in</button>
      </div>
      <div class="col-sm-6">
        <button type="button" class="btn btn-warning btn-block" id="check-out-btn" <?php if($row['status'] == 1){}else{ echo "disabled";} ?>>Check out</button>
      </div>
    </div>
  </div>
  <?php
}
?>
