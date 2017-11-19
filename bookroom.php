<?php include 'search-results.php' ?>

<?php startblock('content') ?>



<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
      <ul class="navbar-nav"></ul>
      <a class="btn navbar-btn ml-2 btn-link baloo text-white">1. Review house rules
        <br> </a>
      <a class="btn navbar-btn ml-2 text-white btn-link baloo" href="inbox.html">&gt;
        <br> </a>
      <a class="btn navbar-btn ml-2 btn-link text-white baloo" href="bookroom2.php">2. Who's coming?
        <br> </a>
      <a class="btn navbar-btn ml-2 text-white btn-link baloo" href="stays.html">&gt;
        <br> </a>
      <a class="btn navbar-btn ml-2 text-white btn-link baloo" href="bookroom3.php">3. Confirm &amp; Pay
        <br> </a>
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
          <h1 class="baloo"> Review house rules </h1>
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
          <br>
          <a class="btn btn-primary baloo w-50" href="bookroom2.php">Agree and Continue
            <br> </a>
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-header">9 nights in Green Residences Taft
              <br> </div>
            <div class="card-body">
              <h4>Condo Unit 19-63</h4>
              <h6 class="text-muted">2 guests</h6>
              <p class=" p-y-1">November 3, 2017 - Novermber 11, 2017</p>
            </div>
          </div>
          <br>
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
        </div>
      </div>
    </div>
  </div>


<script>
    $(document).ready(function(){
        console.log('session checkin: ' + sessionStorage.getItem('checkin'));
        console.log('session checkout: ' + sessionStorage.getItem('checkout'));
        console.log('session numPersons: ' + sessionStorage.getItem('numPersons'));
        console.log('session listingID: ' + sessionStorage.getItem('listingID'));

        var listingID = sessionStorage.getItem('listingID');

        $.ajax({
            type: "GET",
            url: "http://localhost:8080/taft2GO/listing/?filter={'_id': {'$oid': '" + listingID +"'}}",
            dataType: "json",
            success: function(response){
                console.log(response);
            },
            error: function(jqXHR, exception){
                console.log("Error");
                console.log(jqXHR.responseText);
            }
        });
    });
</script>

<?php endblock() ?>