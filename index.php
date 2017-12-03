<!DOCTYPE html>
<?php include 'base.php' ?>

<?php startblock('content') ?>
  <div class="py-5 text-center opaque-overlay" style="background-image: url(&quot;homepage bg.jpg&quot;);">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12 text-white">
          <img class="img-fluid d-block mx-auto" src="T2GO Logo.png" width="500">
          <p class="lead mb-5">Find the right place to stay.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <input class="form-control mr-sm-2 baloo border border-dark form-control-lg" type="text" placeholder="Search"> </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-primary baloo" href="/taft2GO/Search">Search</a>
          <h1 class="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</h1>
          <h1 class="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</h1>
        </div>
      </div>
    </div>
  </div>

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
                                + '<a href="room-page.php?listingID='+ jsonArray[i]._id.$oid +'">'
                                //+ '<a href="/taft2GO/Listings/'+ jsonArray[i]._id.$oid +'">'
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
                                + '<a href="room-page.php?listingID='+ jsonArray[i]._id.$oid +'">'
                                //+ '<a href="/taft2GO/Listings/'+ jsonArray[i]._id.$oid +'">'
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