$(document).ready(function(){

});
function login(){
  console.log("click");
  $("#main-login-container").hide("fold", {direction: "up"}, "slow", function(){
    $("#main-login-container").html("");
    $.ajax({
      method: "GET",
      url: "scripts/php/loginform.php?login=true",
      cache: false,
      success: function(loginFormData){
        $("#main-login-container").html(loginFormData);
        $("#main-login-container").show("fold", {direction: "down"}, "slow", function(){

        });
      }
    });
  });
}
function activateMenu(id){
  console.log(id);
  $("li").removeClass("active");
  $("#" + id).addClass("active");
  $("#main-content-div").hide("fold", {direction: "up"}, "slow", function(){
    $.ajax({
      method: "GET",
      url: "scripts/php/searchForm.php?what=" + id ,
      cache: false,
      success: function(searchData){
        $("#main-content-div").html("");
        $("#main-content-div").html(searchData);
        $("#main-content-div").show(
          "fold",
           {
             direction: "down"
           },
           "slow",
            function(){

        });
      }
    });
  });
}
function updateLocation(id, location){
  $("#location-" + id).text(location);
}
function addPart(e){
  e.preventDefault();
  var assetName = $("#asset-name").val();
  var serialNumber = $("#serial-number").val();
  var addLocation = $("#add-location").val();
  var addDetails = $("#add-details").val();

  $.ajax({
    method: "POST",
    url: "scripts/php/addPart.php",
    data: {
      submit: "true",
      name: assetName,
      serial: serialNumber,
      location: addLocation,
      details: addDetails
    },
    cache: false,
    success: function(addPartsResult){
      //console.log(addPartsResult);
      $("add-form-alert-container").html(addPartsResult);
    }
  });
}
