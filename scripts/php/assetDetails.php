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
              <p id="location-info">Location: <?php echo $row['location'];?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <?php
              if($row['status'] == 0){
                ?>
                <div id="location-alert" class="alert alert-danger" role="alert">
                  <strong id="location-text">Checked out</strong>
                </div>
                <?php
              }else{
                ?>
                <div id="location-alert" class="alert alert-success" role="alert">
                  <strong id="location-text">On location</strong>
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
  <script type="text/javascript">
    $("#check-in-btn").on("click", function(){
      var location = prompt("Please enter location: ", "<?php echo $row['location'];?>");
      if(location == null || location == ""){
        alert("Location invalid!");
      }else{
        $.ajax({
          method: "post",
          url: "scripts/php/checkin.php",
          data: {
            post: "true",
            id: <?php echo $id;?>,
            location: location
          },
          cache: false,
          success: function(checkinData){
            if(checkinData === "success"){
              $("#check-in-btn").prop("disabled", true);
              $("#check-out-btn").prop("disabled", false);
              $("#location-alert").removeClass("alert-danger");
              $("#location-alert").addClass("alert-success");
              $("#location-text").text("On location");
              $("#location-info").text("Location: " + location);
              console.log(checkinData);
              updateLocation(<?php echo $id;?> , location);
            }
          }
        });
      }
    });
    $("#check-out-btn").on("click", function(){
      var location = prompt("Please enter location: ", "<?php echo $row['location'];?>");
      if(location == null || location == ""){
        alert("Location invalid, please provide a valid location!");
      }else{
        $.ajax({
          method: "POST",
          url: "scripts/php/checkout.php",
          data: {
            post: "true",
            id: <?php echo $id;?>,
            location: location
          },
          cache: false,
          success: function(checkoutData){
            if(checkoutData === "success"){
              $("#check-in-btn").prop("disabled", false);
              $("#check-out-btn").prop("disabled", true);
              $("#location-alert").removeClass("alert-success");
              $("#location-alert").addClass("alert-danger");
              $("#location-text").text("Checked out");
              $("#location-info").text("Location: " + location);
              console.log(checkoutData);
              updateLocation(<?php echo $id;?> , location);
            }
          }
        });
      }
    });
  </script>
  <?php
}
?>
