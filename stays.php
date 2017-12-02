<?php include 'dashboard.php' ?>

<?php startblock('dashboardlink') ?>
<!--<a class="btn navbar-btn ml-2 btn-link baloo text-white" href="/taft2GO/Dashboard">Dashboard
    <br> </a><?php endblock() ?>-->
<?php startblock('stayslink') ?>
<a class="btn navbar-btn ml-2 btn-link baloo text-secondary" href="/taft2GO/Stays">Stays
    <br> </a><?php endblock() ?>


<?php startblock('content') ?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <?php startblock('sidemenu') ?>
            <div class="col-md-4 text-secondary">
                <a class="btn navbar-btn ml-2 btn-link baloo ml-auto text-secondary text-left menu" href="/taft2GO/Stays">Upcoming Stays</a>
                <a class="btn navbar-btn ml-2 btn-link baloo text-dark text-left ml-auto menu" href="/taft2GO/Stays-Past">Booking History</a>
                <!--
              <a class="btn navbar-btn ml-2 btn-link baloo text-dark ml-auto menu text-left" href="listing-requirements.html">Reservation Requirements</a>
              <a class="btn navbar-btn ml-2 btn-link baloo text-dark ml-auto menu text-left" href="listing-page.html">Listings Page</a>

                <a class="btn btn-primary baloo" href="/taft2GO/AddListing">Add New Listing
                    <br> </a>-->
            </div>
            <?php endblock() ?>


            <?php startblock('menucontent') ?>
            <div id="upcoming" class="col-md-8">

            </div>

            <?php endblock() ?>
        </div>
    </div>
</div>
<?php startblock('staysScript')?>
    <script>
        $(document).ready(function(){
            var noBookings = true;
            var upcoming = '<h1 class="text-dark baloo">Upcoming Stays</h1>';
            $.ajax({
                type: "GET",
                url: "http://localhost:8080/taft2GO/booking/?filter={'accountID': '<?php echo $_SESSION['objID'] ?>'}",
                dataType: "json",
                success: function(response){
                    console.log(response);
                    var bookings = response._embedded;

                    for(var j = 0; j < bookings.length; j++){

                        var today = new Date();
                        console.log(today);
                        var checkinDate = new Date(bookings[j].checkIn);
                        console.log(checkinDate);
                        if(today < checkinDate) {
                            noBookings = false;
                            $.ajax({
                                type: "GET",
                                url: "http://localhost:8080/taft2GO/listing/?filter={'_id': {'$oid': '" + bookings[j].listingID + "'}}",
                                dataType: "json",
                                success: function (response) {
                                    console.log(response);
                                    listings = response._embedded;
                                    upcoming += '<div class="card">'
                                        + '<div class="card-body">'
                                        + '<div class="row">'
                                        + '<div class="col-md-6">'
                                        + '<div class="card">'
                                        + '<img class="img-fluid d-block" src="' + listings[0].photo + '"></div>'
                                        + '</div>'
                                        + '<div class="col-md-6">'
                                        + '<p class="">' + listings[0].title + '</p>'
                                        + '<p class="lead">Booking ID: ' + bookings[j]._id.$oid + '</p>'
                                        //+ '<p>Booking by: '+ fname +' '+ lname + '</p>'
                                        + '<p class=""> Check in date: ' + bookings[j].checkIn + '</p>'
                                        + '<p class=""> Check out date: ' + bookings[j].checkOut + '</p>'
                                        + '<a class="btn btn-outline-primary baloo" href="/taft2GO/Listings/' + listings[0]._id.$oid + '">View Listing</a>'
                                        + '</div>'
                                        + '</div>'
                                        + '</div>'
                                        + '</div><br>';
                                },
                                async: false,
                                error: function (jqXHR, exception) {
                                    console.log("Error");
                                    console.log(jqXHR.responseText);
                                }
                            });
                        }   // upcoming date
                    }
                    if(noBookings == true){
                        upcoming += '<div class="py-5">'
                                + '<div class="container">'
                                + '<div class="row">'
                                + '<div class="col-md-12">'
                                + '<div class="card">'
                                + '<div class="card-body">'
                                + '<h1 class="">Choose your next stay.</h1>'
                                + '<a class="btn btn-primary baloo" href="/taft2GO/Search">Go to search</a>'
                                + '</div>'
                                + '</div>'
                                + '</div>'
                                + '</div>'
                                + '</div>'
                                + '</div>';
                    }
                    $('#upcoming').html(upcoming);
                },
                async: false,
                error: function(jqXHR, exception){
                    console.log("Error");
                    console.log(jqXHR.responseText);
                }
            });
        });
    </script>
<?php endblock()?>

<?php endblock() ?>
