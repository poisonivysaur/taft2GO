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
        (function update(){
            $.ajax({
                type: "GET",
                url: "http://localhost:8080/taft2GO/listing",
                dataType: "json",
                success: function(response){

                    const jsonArray = response._embedded;
                    console.log(jsonArray);
                    console.log(jsonArray.length);
                    var condos = '';
                    var dorms = '';

                    for(var i = 0; i < jsonArray.length; i++){
                        console.log("looped");
                        console.log(jsonArray[i].type);
                        if(jsonArray[i].type == 'condo'){
                            console.log("added condo");
                            condos += '<div class="col-md-3">'
                                //+ '<a href="room-page.php?listingID='+ jsonArray[i]._id.$oid +'">'
                                + '<a href="/taft2GO/Listings/'+ jsonArray[i]._id.$oid +'">'
                                + '<img class="img-fluid d-block" src="'+ jsonArray[i].photo +'">'
                                + '<p>'+ jsonArray[i].title +'</p>'
                                + '<p>Monthy Rate of Php'+ jsonArray[i].monthlyRate +'</p>'
                                + '<p>User Rating: '+ jsonArray[i].aveRating +'</p>'
                                + '</a>'
                                + '</div>';
                        }
                        else if(jsonArray[i].type == 'dorm'){
                            console.log("added dorm");
                            dorms += '<div class="col-md-3">'
                                //+ '<a href="room-page.php?listingID='+ jsonArray[i]._id.$oid +'">'
                                + '<a href="/taft2GO/Listings/'+ jsonArray[i]._id.$oid +'">'
                                + '<img class="img-fluid d-block" src="'+ jsonArray[i].photo +'">'
                                + '<p>'+ jsonArray[i].title +'</p>'
                                + '<p>Monthy Rate of Php'+ jsonArray[i].monthlyRate +'</p>'
                                + '<p>User Rating: '+ jsonArray[i].aveRating +'</p>'
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
            }).then(function(){
                console.log('orayt called set timeout');
                setTimeout(update, 5000);
            });
        })();

    });
    </script>
<?php endblock() ?>
