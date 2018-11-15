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
