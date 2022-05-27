$(document).ready(function(){

  //get data 
  $.ajax({url: "/EventsController/getAllHomepageEvents", success: function(result){
    //console.log($.parseJSON(result));
    var arr = $.parseJSON(result);
    console.log(arr);

    for(var i=0; i<arr[0]['banner'].length;i++)
    {
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
              <p>${arr[0]['banner'][i].event_date}</p>
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
              <p>${arr[0]['banner'][i].event_date}</p>
              <a href="#${arr[0]['banner'][i].event_id}" class="btn btn-primary">Book Now</a>
            </div>
          </div>`
        );
      }
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
      $('.two-row').append(`
        <div class="w-50 list-item">
          <img src="${arr[0]['allresult'][i].image_url}" alt="${arr[0]['allresult'][i].event_name}" class="img-fluid cover-image" />
          <div class="row">
            <div class="col">
              <h5>${arr[0]['allresult'][i].event_name}</h5>
              <p>${arr[0]['allresult'][i].event_date}</p>
              <p>₹ ${arr[0]['allresult'][i].price}</p>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
              <a href="#${arr[0]['allresult'][i].event_id}" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>`
      );
    }

  }});
});