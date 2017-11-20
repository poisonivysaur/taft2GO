<?php include 'search-results.php' ?>

<?php startblock('content') ?>


<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
      <!--<ul class="navbar-nav"></ul>-->
      <button class="btn navbar-btn ml-2 btn-link baloo text-white" onclick="goToBooking1()">1. Review house rules
        <br> </button>
      <button class="btn navbar-btn ml-2 text-white btn-link baloo">&gt;
        <br> </button>
      <button class="btn navbar-btn ml-2 btn-link text-white baloo" onclick="goToBooking2()">2. Who's coming?
        <br> </button>
      <button class="btn navbar-btn ml-2 text-white btn-link baloo">&gt;
        <br> </button>
      <button class="btn navbar-btn ml-2 text-white btn-link baloo" onclick="goToBooking3()">3. Make Reservation
        <br> </button>
    </div>
    <div class="container">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    </div>
  </nav>

  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-12">
              <div class="alert border border-primary" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                <h6 class="alert-heading">This is a rare find. This place is usually booked.</h6>
              </div>
            </div>
          </div>
            <div id="changeable">

                <h1 class="baloo"> Review house rules </h1>
                <p id="rules"></p><hr>
                <p id="amenities"></p><hr>
                <p id="beds"></p><hr>
                <p id="bathrooms"></p><hr>
            <!--
              <ul class="list-group">
                <li class="list-group-item">Not suitable for pets</li>
                <li class="list-group-item">No parties or events</li>
                <li class="list-group-item">Not safe or suitable for children (0-12 years)</li>
                <li class="list-group-item">Check in time is 3PM - 10PM</li>
                <li class="list-group-item">Check out by 11AM</li>
              </ul>

              <p class="lead">Additional rules:</p>
              <ul class="">
                <li>Check Out 11:00</li>
                <li>Check Inn 15:00-22:00</li>
                <li>Events and Parties are not permitted.</li>
                <li>Please lock the door of the building when entering and leaving the same. It's for everyone's safety.</li>
                <li>Music until 23:00 hrs.</li>
                <li>Do not allow other people to enter the building.</li>
                <li>You can only smoke on the terrace.</li>
                <li>We do not assume responsibility for lost and forgotten objects in the department.</li>
                <li>We do not assume responsibility for accidents in the department. </li>
              </ul>
              <h3 class="">Since it’s your first Airbnb trip, remember:</h3>
              <ul class="list-group">
                <li class="list-group-item">Each place is unique, providing different spaces and amenities.</li>
                <li class="list-group-item">Respect your host’s place - you may be staying in their home!</li>
                <li class="list-group-item">Stay in touch with your host before and during your stay.</li>
              </ul>
            -->
              <br>
              <button class="btn btn-primary baloo w-50" onclick="goToBooking2()">Agree and Continue
                <br> </button>
            </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <div id="title" class="card-header"><br> </div>

            <div class="card-body">
                <img id="photo" class="img-fluid d-block" src="">
                <h4 id="type"></h4>
                <h6 id="aveRating"></h6>
                <hr>
              <h6 id="numPersons" class="text-muted"></h6>
              <p id="duration" class=" p-y-1"></p>
                <hr>
                <p id="total" class=" p-y-1"></p>
            </div>
          </div>
          <br>
            <!--
          <table class="table">
            <tbody>
              <tr>
                <td>₱1,185 x 9 nights </td>
                <td class="text-right">₱10,665</td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <td>Cleaning fee</td>
                <td class="text-right">₱700 </td>
              </tr>
              <tr>
                <td>Service fee</td>
                <td class="text-right">₱4,000</td>
              </tr>
              <tr>
                <td>Occupancy Taxes</td>
                <td class="text-right">₱1,000</td>
              </tr>
              <tr>
                <td>Total (PHP)</td>
                <td class="text-right baloo">₱16,365</td>
              </tr>
            </tbody>
          </table>
            -->
        </div>
      </div>
    </div>
  </div>
<!--</div>-->

<script>

    var listingID = sessionStorage.getItem('listingID');
    var checkin = sessionStorage.getItem('checkin');
    var checkout = sessionStorage.getItem('checkout');
    var numPersons = sessionStorage.getItem('numPersons');
    var total = sessionStorage.getItem('total');
    var title;
    var type;
    var aveRating;
    var photo;
    var rules;
    var beds;
    var bathrooms;
    var amenities;
    var capacity;
    var tripDetails;

    $(document).ready(function(){
        console.log('session checkin: ' + sessionStorage.getItem('checkin'));
        console.log('session checkout: ' + sessionStorage.getItem('checkout'));
        console.log('session numPersons: ' + sessionStorage.getItem('numPersons'));
        console.log('session listingID: ' + sessionStorage.getItem('listingID'));



        $.ajax({
            type: "GET",
            url: "http://localhost:8080/taft2GO/listing/?filter={'_id': {'$oid': '" + listingID +"'}}",
            dataType: "json",
            success: function(response){
                console.log(response);
                title = response._embedded[0].title;
                type = response._embedded[0].type;
                aveRating = response._embedded[0].aveRating;
                photo = response._embedded[0].photo;
                rules = response._embedded[0].rules;
                beds = parseInt(response._embedded[0].beds);
                bathrooms = parseFloat(response._embedded[0].bathrooms);
                amenities = response._embedded[0].amenities;
                capacity = parseInt(response._embedded[0].capacity);

                $('#title').html(title);
                if(type == 'condo') type = 'Condominium';
                else if(type == 'dorm') type = 'Dormitory';
                $('#type').html(type + ' Unit');
                $('#aveRating').html('User Rating: '+aveRating);
                $('#photo').attr('src',photo);
                $('#numPersons').html(numPersons+' guest(s)');
                $('#duration').html('From <b>'+checkin + "</b> to <br><b>"+ checkout+"</b>");
                $('#total').html(total);
                $('#rules').html('House Rules: <br>'+rules);
                console.log('in ajax rules: '+rules);
                $('#beds').html('No. of beds: '+beds);
                $('#bathrooms').html('No. of bathrooms: '+bathrooms);
                $('#amenities').html('Amenities: <br>'+amenities);
            },
            error: function(jqXHR, exception){
                console.log("Error");
                console.log(jqXHR.responseText);
            }
        });
    });

    function goToBooking1(){
        console.log('booking 1');
        $.ajax({
            type: "POST",
            url: 'bookroom1.php',
            dataType: "html",
            success: function(result){
                $('#changeable').html(result);
                (function () {
                    console.log(rules);
                    $('#rules').html('House Rules: <br>'+rules);
                    $('#beds').html('No. of beds: '+beds);
                    $('#bathrooms').html('No. of bathrooms: '+bathrooms);
                    $('#amenities').html('Amenities: <br>'+amenities);
                })();
            }
        });
    }

    function goToBooking2() {
        console.log('booking 2');

        $.ajax({
            type: "POST",
            url: 'bookroom2.php',
            dataType: "html",
            success: function(result){
                $('#changeable').html(result);
                (function () {
                    var numOfPeople = '<p class="lead">People Staying</p><select id="numGuests" onchange="changeGuests(this)">';
                    for(var i = 1; i <= capacity; i++){
                        numOfPeople += '<option value="' + i + '">' + i + ' person(s)</option>';
                    }
                    numOfPeople += '</select>';
                    $('#numOfGuests').html(numOfPeople);
                })();
            }
        });

    }
    function changeGuests(obj) {
        console.log(obj.value);
        numPersons = obj.value;
        $('#numPersons').html(numPersons+' guest(s)');
    }

    function goToBooking3() {
        console.log('booking 3');
        tripDetails = $('#tripDetails').val();
        console.log('trip details: '+tripDetails);

        $.ajax({
            type: "POST",
            url: 'bookroom3.php',
            dataType: "html",
            success: function(result){
                $('#changeable').html(result);
                (function () {
                    var numOfPeople = '<p class="lead">People Staying</p><select id="numGuests" onchange="changeGuests(this)">';
                    for(var i = 1; i <= capacity; i++){
                        numOfPeople += '<option value="' + i + '">' + i + ' person(s)</option>';
                    }
                    numOfPeople += '</select>';
                    $('#numOfGuests').html(numOfPeople);
                    $('#fname').attr('value', '<?php echo $_SESSION['fname']?>');
                    $('#lname').attr('value', '<?php echo $_SESSION['lname']?>');
                })();
            }
        });
    }

    function makeReservation() {

        // POSTING TIME

        var postData = '{"accountID":"'+ '<?php echo $_SESSION['objID'];?>' + '"listingID:"'+ listingID + '"checkIn:"'+ checkin + '"checkOut:"'+ checkout +
            '"numOfPeople:"'+ numPersons + '"status:"'+ 'reserved' + '"tripDetails:"'+ tripDetails + '"}';

        $.ajax({
            type: "POST",
            url: "http://localhost:8080/taft2GO/booking",
            processData: false,
            contentType: "application/json",
            data: postData,
            complete: function(jqXHR, exception){
                console.log(jqXHR.status);
                console.log(jqXHR.responseText);

                if(jqXHR.status == 201){ // created
                    $('#feedback').html('<div class="col-md-12">'
                        + '<div class="alert alert-success" role="alert">'
                        + '<button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>'
                        + '<h4 class="alert-heading">Booking Reserved! </h4>'
                        + '<p class="mb-0">You can view your upcoming reservations and past bookings in the Stays tab of your account.</p>'
                        + '</div>'
                        + '</div>');
                    $('#billingInfo').val('');
                }
                else if(jqXHR.status == 409){ // conflict
                    $('#feedback').html('<h4>Successfully Registered! Please <a href="/taft2GO/Login">Login</a> to continue</h4>');
                }
                else{
                    $('#feedback').html('<h4>Error procesing request.</h4>');
                }
            }

        });
    }

</script>

<?php endblock() ?>