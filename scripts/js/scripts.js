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
  $("li").removeClass("active");
  $("#" + id).addClass("active");
  $("#main-content-div").hide("fold", {direction: "up"}, "slow", function(){
    $.ajax({
      method: "GET",
      url: "scripts/php/searchForm.php",
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
