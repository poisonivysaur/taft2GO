<?php include 'listing.php' ?>

<?php startblock('sidemenu') ?>
<div class="col-md-4 text-secondary">
    <a class="btn navbar-btn ml-2 btn-link baloo text-dark text-left ml-auto menu" href="/taft2GO/Listing">Listings</a>
    <a class="btn navbar-btn ml-2 btn-link baloo ml-auto text-secondary text-left menu" href="/taft2GO/Listings-Reservations">Reservations</a>
    <!--
  <a class="btn navbar-btn ml-2 btn-link baloo text-dark ml-auto menu text-left" href="listing-requirements.html">Reservation Requirements</a>
  <a class="btn navbar-btn ml-2 btn-link baloo text-dark ml-auto menu text-left" href="listing-page.html">Listings Page</a>
    -->
    <a class="btn btn-primary baloo" href="/taft2GO/AddListing">Add New Listing
        <br> </a>
</div>
<?php endblock() ?>
<?php startblock('menucontent') ?>
<div id="reservations" class="col-md-8">

</div>

<?php endblock() ?>

<?php startblock('listingScript') ?>
<script>
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/taft2GO/listing/?filter={'accountID': '<?php echo $_SESSION['objID'] ?>'}",
        dataType: "json",
        success: function(response){

            const listings = response._embedded;
            console.log(listings);
            console.log(listings.length);
            var noReservations = true;
            var reservations = '<h1 class="text-dark">Your Reservations</h1>';

            for(var i = 0; i < listings.length; i++){   // for each listing, get bookings that corresponds to this listing
                $.ajax({
                    type: "GET",
                    url: "http://localhost:8080/taft2GO/booking/?filter={'listingID': '"+ listings[i]._id.$oid +"'}",
                    dataType: "json",
                    success: function(response){
                        console.log(response._embedded);
                        var bookings = response._embedded;
                        for(var j = 0; j < bookings.length; j++){
                            console.log('got booking length: '+(bookings.length));
                            noReservations = false;
                            var fname;
                            var lname;
                            $.ajax({
                                type: "GET",
                                url: "http://localhost:8080/taft2GO/account/?filter={'_id': {'$oid': '" + bookings[j].accountID +"'}}",
                                dataType: "json",
                                success: function(response){
                                    fname = response._embedded[0].fname;
                                    lname = response._embedded[0].lname;
                                },
                                async: false,
                                error: function(jqXHR, exception){
                                    console.log("Error");
                                    console.log(jqXHR.responseText);
                                }
                            });
                            reservations += '<div class="card">'
                                + '<div class="card-body">'
                                + '<div class="row">'
                                + '<div class="col-md-6">'
                                + '<div class="card">'
                                + '<img class="img-fluid d-block" src="'+ listings[i].photo +'"></div>'
                                + '</div>'
                                + '<div class="col-md-6">'
                                + '<p class="">' + listings[i].title + '</p>'
                                + '<p class="lead">Booking ID: ' + bookings[j]._id.$oid + '</p>'
                                + '<p>Booking by: '+ fname +' '+ lname + '</p>'
                                + '<p class=""> Check in date: ' + bookings[j].checkIn + '</p>'
                                + '<p class=""> Check out date: ' + bookings[j].checkOut + '</p>'
                                + '<a class="btn btn-outline-primary baloo" href="/taft2GO/Listings/'+ listings[i]._id.$oid +'">View Listing</a>'
                                + '</div>'
                                + '</div>'
                                + '</div>'
                                + '</div><br>';
                        }
                    },
                    async: false,
                    error: function(jqXHR, exception){
                        console.log("Error");
                        console.log(jqXHR.responseText);
                    }
                });
            }
            if(noReservations == true){
                console.log('after for loop: '+noReservations);
                reservations = '<div class="col-md-6">'
                            + '<div class="card">'
                            + '<div class="card-body">'
                            + '<p class="lead">You have no upcoming reservations.</p>'
                            + '</div>'
                            + '</div>'
                            + '</div>';
            }

             $('#reservations').html(reservations);
        },
        async: false,
        error: function(jqXHR, exception){
            console.log("Error");
            console.log(jqXHR.responseText);
        }
    });
</script>
<?php endblock() ?>
