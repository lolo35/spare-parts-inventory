<?php
session_start();
require_once '../../conn.php';
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === "admin"){
  ?>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm">
          <div id="add-user-alert-container">

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="idCard-input">Scan ID card</label>
            <input type="password" class="form-control" id="idCard-input" disabled>
          </div>
          <div class="form-group">
            <label for="userName">User Name</label>
            <input type="text" class="form-control" id="userName">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="add-user">Add</button>
  </div>
  <script type="text/javascript">
    setInterval(function(){
      $.ajax({
        method: "GET",
        url: "scripts/php/getLoginInfo.php",
        cache: false,
        success: function(loginInfoData){
          $("#idCard-input").val(loginInfoData);
        }
      });
    }, 1000);
    $("#add-user").on("click", function(){
      var userIdCard = $("#idCard-input").val();
      var userName = $("#userName").val();
      if(userIdCard !== null || userIdCard !== "" && userName !== null || userName !== ""){
        $.ajax({
          method: "POST",
          url: "scripts/php/addUserToDb.php",
          data: {
            addUser: "true",
            card: userIdCard,
            user: userName
          },
          cache: false,
          success: function(addUserResult){
            $("#add-user-alert-container").html(addUserResult);
          }
        });
      }
    });
  </script>
  <?php
}else{
  echo "You don't have permision to view this content! Get lost!";
}
?>
