<?php
session_start();
require_once '../../conn.php';
if(isset($_GET['what']) && $_GET['what'] === "menu-Search"){
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label for="search-input">Search</label>
          <input type="text" id="search-input" style="text-align: center;" class="form-control form-control-lg">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <button type="button" id="search-btn" onclick="search()" class="btn btn-primary btn-lg btn-block"><i class="fas fa-search"></i>Search</button>
      </div>
    </div>
    <div class="row">
      <div class="col-sm" style="margin-top: 20px;">
        <div id="search-data-container">

        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function search(){
      var searchCriteria = $("#search-input").val();
      if(searchCriteria.length == null || searchCriteria == ""){
        alert("Search cannot be emtpy!");
      }else{
        console.log(searchCriteria);
        $.ajax({
          method: "GET",
          url: "scripts/php/searchDb.php?criteria=" + searchCriteria,
          cache: false,
          success: function(searchData){
            $("#search-data-container").hide("fold", {direction: "right"}, "slow", function(){
              $("#search-data-container").html("");
              $("#search-data-container").html(searchData);
              $("#search-data-container").show("fold", {direction: "left"}, "slow", function(){

              });
            });
          }
        });
      }
    }
  </script>
  <?php
}
if(isset($_GET['what']) && $_GET['what'] === "menu-Add_Part"){
  ?>
  <div class="container-fluid">
    <form onsubmit="addPart(event)">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="asset-name">Asset Name</label>
            <input type="text" class="form-control" style="text-align: center;" id="asset-name" required>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="serial-number">Serial Number</label>
            <input type="text" class="form-control" style="text-align: center;" id="serial-number" required>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="add-location">Location</label>
            <input type="text" class="form-control" style="text-align: center;" id="add-location" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="add-details">Details</label>
            <textarea id="add-details" class="form-control" rows="8" cols="60" required></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <button type="submit" id="add-form-submit-btn" class="btn btn-primary btn-lg btn-block">
            <i class="fas fa-check-double"></i>
            Submit
          </button>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="col-sm">
        <div id="add-form-alert-container">

        </div>
      </div>
    </div>
  </div>
  <?php
}
?>
