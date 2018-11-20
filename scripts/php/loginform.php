<?php
session_start();
require_once '../../conn.php';
if(isset($_GET['login']) && $_GET['login'] === "true"){
  ?>
  <div class="container-fluid">
    <form onsubmit="submitLoginData(event)">
      <div class="row text-center">
        <div class="col-sm">
          <img src="images/login-form-logo-small.png" class="img-fluid" alt="">
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="cartela-input">Scanati Cartela</label>
            <input type="password" class="form-control" id="cartela-input" disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <button type="submit" id="submit-login" class="btn btn-primary btn-block btn-lg">Login</button>
        </div>
      </div>
    </form>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      setInterval(function(){
        $.ajax({
          method: "GET",
          url: "scripts/php/getLoginInfo.php",
          cache: false,
          success: function(loginData){
            console.log(loginData);
            $("#cartela-input").val(loginData);
          }
        });
      }, 1000);
    });
    function submitLoginData(e){
      e.preventDefault();
      var cardValue = $("#cartela-input").val();
      //console.log("yey!");
      $.ajax({
        method: "POST",
        url: "scripts/php/checkUser.php",
        data: {
          submitData: "true",
          card: cardValue
        },
        cache: false,
        success: function(checkUserData){
          console.log(checkUserData);
          if(checkUserData === "success"){
            $("body").fadeOut("slow", function(){
              window.location.replace("index.php");
            });
          }
        }
      });
    }
  </script>
  <?php
}
?>
