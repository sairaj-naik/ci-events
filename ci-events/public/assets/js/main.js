$(document).ready(function(){

  // Homepage script
  //get data 
  $.ajax({url: "/EventsController/getAllHomepageEvents", success: function(result){
    //console.log($.parseJSON(result));
    var arr = $.parseJSON(result);
    console.log(arr);

    for(var i=0; i<arr[0]['banner'].length;i++)
    {
      //custom date
      var date = new Date(arr[0]['allresult'][i].event_date);
      var month = GetMonthName(date.getMonth());
      
      var fulldate = (date.getDate()) + '-' + month + '-' + date.getFullYear();
      var date1 = date.getDate() + '/' + date.getMonth() + '/' + date.getFullYear();
      var date2 = new Date();

      //console.log(date +"-"+ date2);
      var milli_secs = date - date2;
             
      // Convert the milli seconds to Days 
      var days = milli_secs / (1000 * 3600 * 24);

      //console.log(Math.round(Math.abs(days)));
      
      // if(date<date2)
      // {
        // add active class to first element
        if(i==0) {

          $('.carousel-indicators').append(
            `<li data-target="#carouselExampleIndicators" data-slide-to="${i}" class="active"></li>`
          );

          $('.carousel-inner').append(
            `<div class="carousel-item active">
              <img src="${arr[0]['banner'][i].image_url}" alt="${arr[0]['banner'][i].event_name}" class="d-block w-100" />
              <div class="carousel-caption d-none d-md-block">
                <h4>${arr[0]['banner'][i].event_name}</h4>
                <p>${fulldate + " (" + Math.round(Math.abs(days)) +" Days Remaining)"}</p>
                <a href="#${arr[0]['banner'][i].event_id}" class="btn btn-primary">Book Now</a>
              </div>
            </div>`
          );
        }
        else
        {
          $('.carousel-indicators').append(
            `<li data-target="#carouselExampleIndicators" data-slide-to="${i}"></li>`
          );

          $('.carousel-inner').append(
            `<div class="carousel-item">
            <img src="${arr[0]['banner'][i].image_url}" alt="${arr[0]['banner'][i].event_name}" class="d-block w-100" />
              <div class="carousel-caption d-none d-md-block">
                <h4>${arr[0]['banner'][i].event_name}</h4>
                <p>${fulldate + " (" + Math.round(Math.abs(days)) +" Days Remaining)"}</p>
                <a href="#${arr[0]['banner'][i].event_id}" class="btn btn-primary">Book Now</a>
              </div>
            </div>`
          );
        }
      // }
      
    }    

    $('#myCarousel').on('slide.bs.carousel', function () {
      // do something…
      $('.carousel').carousel({
        interval: 2000
      })
    })
    
    // $('.banner-image').after(rightButton);
    // $('.banner-image').after(leftButton);

    $('.list-title:first').text("Upcoming Events");
    
    //list all the events
    for(var i=0; i<arr[0]['allresult'].length;i++)
    {
      var date = new Date(arr[0]['allresult'][i].event_date);
      var month = GetMonthName(date.getMonth());
      
      //console.log(date);
      var fulldate = date.getDate() + '-' + month + '-' + date.getFullYear();

      //console.log(date +"-"+ date2);
      var milli_secs = date - date2;
             
      // Convert the milli seconds to Days 
      var days = milli_secs / (1000 * 3600 * 24);

      // console.log(Math.round(Math.abs(days)));

      // if(date<date2)
      // {
        $('.two-row').append(`
          <div class="w-50 list-item">
            <img src="${arr[0]['allresult'][i].image_url}" alt="${arr[0]['allresult'][i].event_name}" class="img-fluid cover-image" />
            <div class="row">
              <div class="col">
                <h5>${arr[0]['allresult'][i].event_name}</h5>
                <p>${fulldate + " (" + Math.round(Math.abs(days)) +" Days Remaining)"}</p>
                <p>₹ ${arr[0]['allresult'][i].price}</p>
              </div>
              <div class="col d-flex justify-content-center align-items-center">
                <a href="#${arr[0]['allresult'][i].event_id}" class="btn btn-primary">Book Now</a>
              </div>
            </div>
          </div>`
        );
      // }
    }

  }});

  function GetMonthName(monthNumber) 
  {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    return months[monthNumber];
  }



  //modal code
  function clearTextBox()
  {
      $("#nametxt").val('');
      $("#emailtxt").val('');
  }

  //open modal
  $("#create-user-btn").on("click", function(){
      clearTextBox();
      $('#staticBackdrop').addClass("open-modal");
      $("#update-user").css("display", "none");
  }); 

  //close modal
  $(".btn-close").on("click", function(){
      $('#staticBackdrop').removeClass("open-modal");
      $("#add-user").css("display", "");
      $("#update-user").css("display", "");

  });


  // Admin page Get all users Datatable    
    //display data
    function displayUserData()
    {
        //declaring array
        var userArray = new Array();
        var details = new Array();

        //ajax call using post method
        $.ajax({url: "/UsersController/getAllUsers", success: function(result, status){ 
          console.log("Data: " + result + "\nStatus: " + status);

          //add data to array
          $.each($.parseJSON(result), function (index, user) {
              details.push(user.uid, user.name, user.email);
              userArray.push(details);
              details=[];
          });

          console.log(userArray);

          //push data to jquery data table
          $('#myTable').DataTable( {
              data: userArray,
              columns: [
                  { title: 'uid'},
                  { title: 'name'},
                  { title: 'email'},
                  { data: 'action', render: function(data, type, row) {
                          return '<button class="btn btn-danger delete-user" data-value="'+row[0]+'" data-username="'+row[1]+'">Delete</button> <button class="btn btn-warning warning-btn" data-value="'+row[0]+'" data-username="'+row[1]+'" data-email="'+row[2]+'">Update</button>'
                      }
                  }
              ],
              columnDefs: [
                  { 
                      targets: 3,
                      render: function(data) {
                          //return '<button class="btn btn-danger">Delete</button> <button class="btn btn-warning">Update</button>'
                      }
                  }
              ]
          });
      }});
    }

    //-------------------------------------------------------------------------------------------------------------

    // events page

    function displayEventData()
    {
      //declaring array
      var userArray = new Array();
      var details = new Array();

      //ajax call using post method
      $.ajax({url: "/EventsController/getAllEvent", success: function(result, status){ 
          console.log("Data: " + result + "\nStatus: " + status);

          //add data to array
          $.each($.parseJSON(result), function (index, eventactivity) {
              details.push(eventactivity.event_id, eventactivity.event_name, eventactivity.event_details);
              userArray.push(details);
              details=[];
          });

          console.log(userArray);

          //push data to jquery data table
          $('#myTable').DataTable( {
              data: userArray,
              columns: [
                  { title: 'Event Id'},
                  { title: 'Event Name'},
                  { title: 'Event Details'},
                  { data: 'action', render: function(data, type, row) {
                          return '<button class="btn btn-danger delete-event" data-value="'+row[0]+'" data-username="'+row[1]+'">Delete</button> <button class="btn btn-warning warning-btn update-event" data-value="'+row[0]+'" data-username="'+row[1]+'" data-email="'+row[2]+'">Update</button>'
                      }
                  }
              ],
              columnDefs: [
                  { 
                      targets: 3,
                      render: function(data) {
                          //return '<button class="btn btn-danger">Delete</button> <button class="btn btn-warning">Update</button>'
                      }
                  }
              ]
        });
      }});
    }


    // delete-event
    //button click event to delete event
    $(function($) {
      $(document).on('click', '.delete-event', function(event) {
          var rowid = $(this).attr('data-value');
          var username = $(this).attr('data-username');
          
          //ajax call using post method
          $.post("/EventsController/deleteEvent",
          {
            id: rowid
          },
          //output returned from the php code
          function(userdata, status){
              console.log("Data: " + userdata + "\nStatus: " + status);

              // var jsondata = $.parseJSON(userdata);
              // if(jsondata.success)
              // {
              //     console.log(jsondata.success);
              // }
              // else
              // {
              //     console.log(jsondata.error);
              // }
          });
          clearTextBox();
          $('#staticBackdrop').removeClass("open-modal");
      });
  });



  //button click event to update user 

  $("#update-event").on("click", function(){
    var namevalue = $("#nametxt").val();
    var emailvalue = $("#emailtxt").val();
    
    var userid = $("#update-user").attr('data-update-userid');
    console.log("Email: " + emailvalue + "\nName: " + namevalue+ "\nUserid: "+userid);

    //ajax call using post method
    $.post("/EventsController/updateEvent",
    {
      name: namevalue,
      email: emailvalue,
      id: userid
    },
    //output returned from the php code
    function(userdata, status){
        console.log("Data: " + userdata + "\nStatus: " + status);

        var jsondata = $.parseJSON(userdata);
        if(jsondata.success)
        {
            console.log(jsondata.success);
        }
        else
        {
            console.log(jsondata.error);
        }
    });
    clearTextBox();
    $('#staticBackdrop').removeClass("open-modal");

});


// ------------------------------------------------------------------------------------------------------------



  //booking list page

    function displayBookingData()
    {
        //declaring array
        var userArray = new Array();
        var details = new Array();

        //ajax call using post method
        $.ajax({url: "/BookingController/getAllPendingBookings", success: function(result, status){ 
            console.log("Data: " + result + "\nStatus: " + status);

            //add data to array
            $.each($.parseJSON(result), function (index, booking) {
                details.push(booking.booking_id, booking.event_id, booking.email, booking.status);
                userArray.push(details);
                details=[];
            });

            console.log('booking data');

            console.log(userArray);

            //push data to jquery data table
            $('#myTable').DataTable( {
                data: userArray,
                columns: [
                    { title: 'Booking Id'},
                    { title: 'Event Id'},                    
                    { title: 'User\'s Email Id'},
                    { title: 'Status'},
                    { data: 'action', render: function(data, type, row) {
                            return '<button class="btn btn-danger deny-booking" data-value="'+row[0]+'" data-username="'+row[1]+'">Deny</button> <button class="btn btn-warning warning-btn" data-value="'+row[0]+'" data-username="'+row[1]+'" data-email="'+row[2]+'">Approve</button>'
                        }
                    }
                ],
                columnDefs: [
                    { 
                        targets: 4,
                        render: function(data) {
                            //return '<button class="btn btn-danger">Delete</button> <button class="btn btn-warning">Update</button>'
                        }
                    }
                ]
            });
      }});
    }


    //------------------------------------------------------------------------------------------------------------

    // approve booked event

    // after clicking warning button a popup should open
    
    $(function($) {
      $(document).on('click', '.warning-btn', function(event) {
          //retrive data from datatable
          var username = $(this).attr('data-username');
          var useremail = $(this).attr('data-email');
          var userid = $(this).attr('data-value');

          $('#staticBackdrop').addClass("open-modal");
          
          //assign data to the textbox inside the modal
          $("#nametxt").val(username);
          $("#emailtxt").val(useremail);

          var namevalue = $("#nametxt").val(username);
          var emailvalue = $("#emailtxt").val(useremail);
          
          console.log("Email: " + emailvalue + "Name: " + namevalue + "userid: " + userid);
          $("#add-user").css("display", "none");
          $("#approve-booking").attr("data-update-userid", userid);
          $("#update-user").attr("data-update-userid", userid);
      });
    });



    //update function for booking
    $("#approve-booking").on("click", function(){
      
      var seats = $("#seatstxt").val();

      var email = $("#approve-booking").attr('data-email');
      var userid = $("#approve-booking").attr('data-update-userid');
      console.log("Status: " + userid);

      //ajax call using post method
      $.post("/BookingController/updateBookingStatus",
      {
        email: email,
        seatsApproved: seats,
        status: "approved",
        id: userid
      },
      //output returned from the php code
      function(userdata, status){
          console.log("Data: " + userdata + "\nStatus: " + status);

          // var jsondata = $.parseJSON(userdata);
          // if(jsondata.success)
          // {
          //     console.log(jsondata.success);
          // }
          // else
          // {
          //     console.log(jsondata.error);
          // }
      });
      clearTextBox();
      $('#staticBackdrop').removeClass("open-modal");

  });
  
  // end booking approve part

  // --------------------------------------------------------------------------------------------------------------------------------

    
  
  // --------------------------------------------------------------------------------------------------------------------------------
  
  // button click event to deny booking
    $(function($) {
      $(document).on('click', '.deny-booking', function(event) {
          var rowid = $(this).attr('data-value');
          
        //ajax call using post method
        console.log("Status: " + rowid);

        //ajax call using post method
        $.post("/BookingController/updateBookingStatus",
        {
          status: "deny",
          id: rowid
        },
        //output returned from the php code
        function(userdata, status){
            console.log("Data: " + userdata + "\nStatus: " + status);

            // var jsondata = $.parseJSON(userdata);
            // if(jsondata.success)
            // {
            //     console.log(jsondata.success);
            // }
            // else
            // {
            //     console.log(jsondata.error);
            // }
        });
        clearTextBox();
        $('#staticBackdrop').removeClass("open-modal");
      });
  });

  // 

  // --------------------------------------------------------------------------------------------------------------------------------



  // update user details
  $("#update-user").on("click", function(){
    var namevalue = $("#nametxt").val();
    var emailvalue = $("#emailtxt").val();
    var userid = $("#update-user").attr('data-update-userid');
    console.log("Email: " + emailvalue + "\nName: " + namevalue+ "\nUserid: "+userid);

    //ajax call using post method
    $.post("/UsersController/updateUser",
    {
        name: namevalue,
        email: emailvalue,
        id: userid
    },
    //output returned from the php code
    function(userdata, status){
        console.log("Data: " + userdata + "\nStatus: " + status);

        // var jsondata = $.parseJSON(userdata);
        // if(jsondata.success)
        // {
        //     console.log(jsondata.success);
        // }
        // else
        // {
        //     console.log(jsondata.error);
        // }
    });
    clearTextBox();
    $('#staticBackdrop').removeClass("open-modal");

});



//button click event to delete user
$(function($) {
  $(document).on('click', '.delete-user', function(event) {
      var rowid = $(this).attr('data-value');
      var username = $(this).attr('data-username');
      
      //ajax call using post method
      $.post("/UsersController/deleteUser",
      {
          id: rowid
      },
      //output returned from the php code
      function(userdata, status){
          console.log("Data: " + userdata + "\nStatus: " + status);

          // var jsondata = $.parseJSON(userdata);
          // if(jsondata.success)
          // {
          //   console.log(jsondata.success);
          // }
          // else
          // {
          //   console.log(jsondata.error);
          // }
      });
      clearTextBox();
      $('#staticBackdrop').removeClass("open-modal");
  });
});



    
  // based on url load the data
  switch(window.location.pathname)
  {
    case "/UsersController/UsersList":
      displayUserData();
      break;

    case "/EventsController/EventsList":
      displayEventData();
      break;
    
    case "/BookingController/PendingBookingList":
      displayBookingData();
      break;
    
  }

});