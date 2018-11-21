<?php
session_start();
require_once '../../conn.php';

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
      <div class="form-group">
        <label for="search-input">Cautare</label>
        <input type="text" id="search-input" style="text-align: center;" class="form-control form-control-lg">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
      <button type="button" id="search-btn" onclick="search()" class="btn btn-primary btn-lg btn-block"><i class="fas fa-search"></i>Cautare</button>
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
</script>
