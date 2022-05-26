$(document).ready(function(){

  //get data 
  $.ajax({url: "/UsersController/getallusers", success: function(result){
    console.log(result);
  }});

    $.post("/UsersController/getallusers",
    {
      option: "getusers"
    }, 
    function(userdata, status){

    });
});