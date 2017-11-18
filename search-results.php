<?php include 'base.php' ?>

<?php startblock('searchbar') ?>
    <input class="form-control mr-sm-2 baloo" type="text" placeholder="Find the right place...">
    <a href="/taft2GO/Search" class="btn btn-outline-primary baloo">Search</a>
<?php endblock() ?>

<?php startblock('content')?>
  <div class="py-5 gradient-overlay" style="background-image: url(&quot;https://pingendo.github.io/templates/sections/assets/cover_event.jpg&quot;);">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Explore taft2GO</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 text-white">
          <h2 class="">Condominiums</h2>
          <a class="btn btn-primary baloo" href="explore.html">Condos</a>
        </div>
        <div class="col-md-4 text-white">
          <h2 class="">Dormitories</h2>
          <a class="btn btn-primary baloo" href="explore.html">Dorms</a>
          <p class="lead"> </p>
        </div>
        <div class="col-md-4 text-white">
          <h2 class="">Transients</h2>
          <a class="btn btn-primary baloo" href="explore.html">Transients</a>
        </div>
      </div>
    </div>
  </div>
    <!--
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Top-rated Homes</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 1.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 2.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 3.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 3.png"> </a>
        </div>
      </div>
    </div>
  </div>
  -->

    <!-- CONDOS -->
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Condominiums
            <br> </h1>
        </div>
      </div>
      <div id="condos" class="row">
          <!--
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 1.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 2.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 3.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 3.png"> </a>
        </div>
          -->
      </div>
    </div>
  </div>

    <!-- DORMS -->
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Dormitories
            <br> </h1>
        </div>
      </div>
      <div id="dorms" class="row">

        <!--
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 1.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 2.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 3.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 3.png"> </a>
        </div>
        -->

      </div>
    </div>
  </div>

    <!--
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Transients</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 1.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 2.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 3.png"> </a>
        </div>
        <div class="col-md-3">
          <a href="room-page.html">
            <img class="img-fluid d-block" src="home 3.png"> </a>
        </div>
      </div>
    </div>
  </div>
  -->

    <script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/taft2GO/listing",
            dataType: "json",
            success: function(response){


                const studentJsonArray = response._embedded;
                var condos = '';
                var dorms = '';

                for(var i = 0; i < studentJsonArray.length; i++){
                    if(studentJsonArray[i].type == 'condo'){
                        condos += '<div class="col-md-3">'
                                + '<a href="room-page.php?listingID='+ studentJsonArray[i]._id.$oid +'">'
                                //+ '<a href="/taft2GO/Listings/'+ studentJsonArray[i].objID +'">'
                                + '<img class="img-fluid d-block" src="'+ studentJsonArray[i].photo +'">'
                                + '<p>'+ studentJsonArray[i].title +'</p>'
                                + '<p>Monthy Rate of Php'+ studentJsonArray[i].monthlyRate +'</p>'
                                + '<p>User Rating: '+ studentJsonArray[i].aveRating +'</p>'
                                + '</a>'
                                + '</div>';
                    }
                    else if(studentJsonArray[i].type == 'dorm'){
                        dorms += '<div class="col-md-3">'
                            + '<a href="room-page.php?listingID='+ studentJsonArray[i]._id.$oid +'">'
                            //+ '<a href="/taft2GO/Listings/'+ studentJsonArray[i].objID +'">'
                            + '<img class="img-fluid d-block" src="'+ studentJsonArray[i].photo +'">'
                            + '<p>'+ studentJsonArray[i].title +'</p>'
                            + '<p>Monthy Rate of Php'+ studentJsonArray[i].monthlyRate +'</p>'
                            + '<p>User Rating: '+ studentJsonArray[i].aveRating +'</p>'
                            + '</a>'
                            + '</div>';
                    }
                }
                $('#condos').html(condos);
                $('#dorms').html(dorms);
            },
            error: function(jqXHR, exception){
                console.log("Error");
                console.log(jqXHR.responseText);
            }
        });
    });
    </script>
<?php endblock() ?>
