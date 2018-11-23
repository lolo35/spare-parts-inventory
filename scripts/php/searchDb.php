<?php
session_start();
require_once '../../conn.php';
if(isset($_GET['criteria'])){
  $criteria = mysqli_real_escape_string($conn, $_GET['criteria']);
  $sql = "select * from `parts` where concat(`asset_name`, `serial_n`) like '%$criteria%'";
  $result = $conn -> query($sql);
  ?>
  <button style="visibility: hidden;" id="details-modal-trigger-btn" type="button" data-toggle="modal" data-target="#detailsModal">Modal</button>
  <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModal-center-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailsModal-center-title">Asset Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="details-modal-body-content">

        </div>
      </div>
    </div>
  </div>
  <table class="table table-striped">
    <thead class="thead-light">
      <tr>
        <th>#</th>
        <th>Asset Name</th>
        <th>Serial Number</th>
        <th>Location</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = $result -> fetch_assoc()){
        ?>
        <tr style="cursor: pointer;" onclick="showDetails(<?php echo $row['id'];?>)">
          <td><i class="fas fa-info-circle"></i></td>
          <td title="Asset Name: <?php echo $row['asset_name'];?>"><?php echo $row['asset_name'];?></td>
          <td><?php echo $row['serial_n'];?></td>
          <td id="location-<?php echo $row['id'];?>"><?php echo $row['location'];?></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
  <?php
}
?>
<script type="text/javascript">
  function showDetails(assetID){
    $.ajax({
      method: "GET",
      url: "scripts/php/assetDetails.php?id=" + assetID,
      cache: false,
      success: function(detailsModalData){
        $("#details-modal-body-content").html(detailsModalData);
        $("#details-modal-trigger-btn").click();
      }
    });
  }
</script>
