<?php include 'dashboard.php' ?>


<?php startblock('dashboardlink') ?>
<!--<a class="btn navbar-btn ml-2 btn-link baloo text-white" href="/taft2GO/Dashboard">Dashboard-->
    <br> </a><?php endblock() ?>
<?php startblock('listingslink') ?>
<a class="btn navbar-btn ml-2 btn-link baloo text-secondary" href="/taft2GO/Listings">Listings
    <br> </a><?php endblock() ?>

<?php startblock('content') ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
            <?php startblock('sidemenu') ?>
          <br>
                <div class="col-md-4 text-secondary">
          <a class="btn navbar-btn ml-2 btn-link baloo ml-auto text-secondary text-left menu" href="/taft2GO/Listing">Listings</a>
          <a class="btn navbar-btn ml-2 btn-link baloo text-dark text-left ml-auto menu" href="/taft2GO/Listings-Reservations">Reservations</a>
            <!--
          <a class="btn navbar-btn ml-2 btn-link baloo text-dark ml-auto menu text-left" href="listing-requirements.html">Reservation Requirements</a>
          <a class="btn navbar-btn ml-2 btn-link baloo text-dark ml-auto menu text-left" href="listing-page.html">Listings Page</a>
            -->
          <a class="btn btn-primary baloo" href="/taft2GO/AddListing">Add New Listing
            <br> </a>
        </div>
            <?php endblock() ?>


            <?php startblock('menucontent') ?>
            <div id="listings" class="col-md-8">

            </div>
            <?php endblock() ?>
      </div>
    </div>
  </div>
<?php startblock('listingScript')?>
<script>
    $(document).ready(function(){
        console.log('<?php echo "objID: ".$_SESSION['objID'] ?>');
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/taft2GO/listing/?filter={'accountID': '<?php echo $_SESSION['objID'] ?>'}",
            dataType: "json",
            success: function(response){

                const jsonArray = response._embedded;
                console.log(jsonArray);
                console.log(jsonArray.length);

                var listings = '<h1 class="text-dark baloo">Your Listings</h1>';

                if(jsonArray.length == 0){
                    listings = '<div class="card">'
                            + '<div class="card-body">'
                            + '<p class="lead">You don\'t have any listings yet.</p>'
                            + '<p class="">Make money by renting out your extra space on taft2GO. You’ll also get to meet interesting people from around the country!</p>'
                            + '<a href="/taft2GO/AddListing" class="btn btn-outline-primary baloo">Post a new listing</a>'
                            + '</div>'
                            + '</div>';
                }
                else{
                    //console.log("yay may listings");
                    for(var i = 0; i < jsonArray.length; i++){
                        listings += '<div class="card">'
                                + '<div class="card-body">'
                                + '<div class="row">'
                                + '<div class="col-md-6">'
                                + '<div class="card">'
                                + '<img class="img-fluid d-block" src="'+ jsonArray[i].photo +'"></div><br><br>'
                                + '<a class="btn btn-outline-primary baloo" href="/taft2GO/Listings/'+ jsonArray[i]._id.$oid +'">View Listing</a><br><br>'
                                + '<a class="btn btn-outline-primary baloo" href="/taft2GO/EditListings/'+ jsonArray[i]._id.$oid +'">Edit Listing</a>'
                                + '</div>'
                                + '<div class="col-md-6">'
                                + '<p class="lead">' + jsonArray[i].title + '</p>'
                                + '<p class="">' + jsonArray[i].description + '</p>'
                                + '<p class=""> Monthly rate of: ' + jsonArray[i].monthlyRate + '</p>'
                                + '<p class=""> User rating: ' + jsonArray[i].aveRating + '</p>'
                                //+ '<a href="/taft2GO/Listings/'+ jsonArray[i]._id.$oid +'">'

                                + '</div>'
                                + '</div>'
                                + '</div>'
                                + '</div><br>';

                    }
                }
                $('#listings').html(listings);
            },
            error: function(jqXHR, exception){
                console.log("Error");
                console.log(jqXHR.responseText);
            }
        });
    });
</script>
<?php endblock()?>

<?php endblock() ?>
