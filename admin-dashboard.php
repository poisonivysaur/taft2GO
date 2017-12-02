<!DOCTYPE html>
<?php require_once 'ti.php' ?>
<?php
if(!isset($_SESSION))
{
    session_start();
}
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isAdmin'] == 0)
    header("Location: http://".$_SERVER['HTTP_HOST'].  "/taft2GO/Logout");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css"> </head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="import" href="bower_components/paper-button/paper-button.html">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<!-- Data Table Libs  -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/responsive.bootstrap4.min.js"></script>

<body>
<?php startblock('navbar') ?>
<nav class="navbar navbar-expand-md navbar-dark bg-light m-0 style">
    <div class="container">
        <!--<a href="/taft2GO/Homepage">-->
            <img src="T2G Logo.png" width="" height="50" class="d-inline-block align-top m-0" alt="">
        <h3 class="text-primary baloo">Administrator Account</h3>
        <!--</a>--><!--
        <input class="form-control mr-sm-2 baloo" type="text" placeholder="Find the right place...">
        <a href="Search" class="btn btn-outline-primary baloo">Search</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
            <ul class="navbar-nav"></ul>
        </div>
    </div>

    <!--<a href="login.html">-->
    <div class="w3-dropdown-hover">
        <img src="https://poorishaadi.com/user-icon-png-pnglogocom.png" width="" height="50"
             class="d-inline-block align-top m-0" alt="">

        <div class="w3-dropdown-content w3-card-4">
            <!--<img src="img_london.jpg" alt="London" style="width:100%">-->
            <div class="w3-container">
                <p></p>
                <p><?php echo " ". $_SESSION['fname'] ." ". $_SESSION['lname'];?></p>
                <a href="#" class="w3-bar-item w3-button">Profile</a>
                <a href="/taft2GO/Logout" class="w3-bar-item w3-button">Logout</a>
            </div>
        </div>
    </div>

    <!--</a>-->
    <!--<a class="btn navbar-btn ml-2 btn-light text-primary body baloo" href="addlisting.html">Host
    <br> </a>-->
    <!--
    <a class="btn navbar-btn ml-2 btn-light text-primary baloo" href="Stays">Stays</a>
    <a class="btn navbar-btn ml-2 btn-light text-primary baloo" href="/taft2GO/Listings">Listings</a>
    <a class="btn navbar-btn ml-2 btn-light text-primary baloo" href="/taft2GO/Help">Help</a>
    -->
</nav>

<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <a href="login.html"> </a>
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <a href="login.html">
            <ul class="navbar-nav"></ul>
        </a>
        <?php startblock('dashboardlink') ?>
        <a class="btn navbar-btn ml-2 btn-link baloo text-secondary" href="/taft2GO/AdminDashboard">Accounts
            <br> </a><?php endblock() ?>
        <!--<a class="btn navbar-btn ml-2 text-white btn-link baloo" href="inbox.php">Inbox
          <br> </a>-->
        <?php startblock('listingslink') ?>
        <a class="btn navbar-btn ml-2 btn-link baloo text-white" href="/taft2GO/AdminListings">Listings
            <br> </a><?php endblock() ?>
        <!--
        <?php startblock('stayslink') ?>
        <a class="btn navbar-btn ml-2 text-white btn-link baloo" href="/taft2GO/Stays">Stays
            <br> </a><?php endblock() ?>
        <?php startblock('profilelink') ?>
        <a class="btn navbar-btn ml-2 text-white btn-link baloo" href="/taft2GO/Profile">Profile
            <br> </a><?php endblock() ?>
        <?php startblock('accountlink') ?>
        <a class="btn navbar-btn ml-2 text-white btn-link baloo" href="/taft2GO/Account">Account </a>
        <?php endblock() ?>
        -->
    </div>
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    </div>
</nav>
<?php endblock() ?>

<?php startblock('content') ?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <?php startblock('sidemenu') ?>
            <div class="col-md-4 text-secondary">
                <a class="btn navbar-btn ml-2 btn-link baloo ml-auto text-secondary text-left menu" href="/taft2GO/AdminAccounts">Active Accounts</a>
                <!--<a class="btn navbar-btn ml-2 btn-link baloo text-dark text-left ml-auto menu" href="/taft2GO/Listings-Reservations">Deactivated Accounts</a>-->
            </div>
            <?php endblock() ?>


            <?php startblock('menucontent') ?>
            <div id="accounts" class="col-md-8">

            </div>
            <?php endblock() ?>
        </div>
    </div>
</div>

<?php endblock() ?>

<?php startblock('footer') ?>
<div class="bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="p-4 col-md-3">
                <img src="T2GO Logo.png" width="" height="50" class="d-inline-block align-top m-0" alt="">
                <p class="text-white">A website where you can find the right place for you to stay.</p>
            </div>
            <div class="p-4 col-md-3">
                <h2 class="mb-4 baloo">Mapsite</h2>
                <ul class="list-unstyled">
                    <a href="#" class="text-white">Home</a>
                    <br>
                    <a href="#" class="text-white">About us</a>
                    <br>
                    <a href="#" class="text-white">Our services</a>
                    <br>
                    <a href="#" class="text-white">Stories</a>
                </ul>
            </div>
            <div class="p-4 col-md-3">
                <h2 class="mb-4 baloo">Contact</h2>
                <p>
                    <a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>+63 - 999 550 5462</a>
                </p>
                <p>
                    <a href="mailto:info@pingendo.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>info@taft2GO.com</a>
                </p>
                <p>
                    <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>2401 Taft Ave., MNL</a>
                </p>
            </div>
            <div class="p-4 col-md-3">
                <h2 class="mb-4 text-light baloo">Subscribe</h2><i class="fa fa-fw fa-facebook fa-3x text-white"></i><i class="fa fa-fw fa-twitter fa-3x text-white"></i><i class="fa fa-fw fa-instagram text-white fa-3x"></i> </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <p class="text-center text-white">© Copyright 2017 Taft2GO - All rights reserved. </p>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('adminScript') ?>
<script>
    $(document).ready(function(){
        getAccounts();
    });

    function getAccounts(){
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/taft2GO/account?filter={'isAdmin': '" + 0 + "','isActive':'" + 1 + "'}",
            dataType: "json",
            success: function (response) {
                var response = response._embedded;
                console.log(response);
                var tableData = '<h2 class="baloo">Active Accounts</h2><div class="row mb-3">'
                    + '<div class="col-md-12">'
                    + '<div class="table-responsive">'
                    + '<table class="table table-hover table-bordered nowrap material-shadow" cellspacing="0" width="100%" id="table">'
                    + '<thead class="thead-inverse">'
                    + '<tr><th>Account ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Delete Account</th></tr></thead><tbody>';

                for(var i = 0; i < response.length; i++){
                    var id = response[i]._id.$oid;
                    console.log(id);
                    tableData += '<tr>'
                        + '<td onmouseover="this.style.cursor=\'pointer\'">' + response[i]._id.$oid + '</td>'
                        + '<td>' + response[i].fname + '</td>'
                        + '<td>' + response[i].lname + '</td>'
                        + '<td>' + response[i].email + '</td>'

                        + '<td><paper-button raised class="btn btn-primary baloo" onclick=deactivate("'+ id +'")>Deactivate</paper-button></td>'
                        + '</tr>';
                }
                tableData += '</tbody></table></div></div></div>';
                $('#accounts').html(tableData);
                $('#table').DataTable({
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal( {
                                header: function ( row ) {
                                    var data = row.data();
                                    return 'Details for '+data[1]+' '+data[2];
                                }
                            } ),
                            renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                                tableClass: 'table'
                            } )
                        }
                    }
                });
            },

            error: function (jqXHR, exception) {
                console.log(jqXHR);
            }
        });
    }
    
    function deactivate(id) {
        console.log("deactivate "+id);

        $.ajax({
            type: "DELETE",
            url: "http://localhost:8080/taft2GO/account/" + id,
            processData: false,
            contentType: "application/json",
            complete: function (jqXHR, exception) {
                console.log(jqXHR.status);
                console.log(jqXHR.responseText);

                if (jqXHR.status == 204) { // created
                    console.log("account "+id+" successfully deleted.");
                    // ########################################### DELETE ALL LISTINGS UNDER THAT ACCOUNT ######################
                    (function () {
                        $.ajax({
                            type: "GET",
                            url: "http://localhost:8080/taft2GO/listing/?filter={'accountID': '"+ id +"'}",
                            dataType: "json",
                            success: function(response){
                                console.log(response._embedded);
                                var listings = response._embedded;

                                // loop around each listing, deleting them in the db
                                for(var i = 0; i < listings.length; i++){
                                    var listingID = listings[i]._id.$oid;
                                    $.ajax({
                                        type: "DELETE",
                                        url: "http://localhost:8080/taft2GO/listing/" +listingID,
                                        processData: false,
                                        contentType: "application/json",
                                        complete: function(jqXHR, exception){
                                            console.log(jqXHR.status);
                                            console.log(jqXHR.responseText);
                                            if(jqXHR.status == 204){
                                                console.log("listing "+listingID + "successfully deleted.");

                                                // ########################################### DELETE ALL BOOKINGS FOR THAT LISING ######################
                                                // delete all bookings from the listing as well
                                                $.ajax({
                                                    type: "GET",
                                                    url: "http://localhost:8080/taft2GO/booking/?filter={'listingID': '"+ listingID +"'}",
                                                    dataType: "json",
                                                    success: function(response){
                                                        console.log(response._embedded);
                                                        var bookings = response._embedded;

                                                        // loop around each booking, deleting them in the db
                                                        for(var i = 0; i < bookings.length; i++){
                                                            var bookingID = bookings[i]._id.$oid;
                                                            $.ajax({
                                                                type: "DELETE",
                                                                url: "http://localhost:8080/taft2GO/booking/" +bookingID,
                                                                processData: false,
                                                                contentType: "application/json",
                                                                complete: function(jqXHR, exception){
                                                                    console.log(jqXHR.status);
                                                                    console.log(jqXHR.responseText);
                                                                    if(jqXHR.status == 204){
                                                                        console.log("booking "+bookingID + "successfully deleted.");

                                                                    }
                                                                    else{
                                                                        console.log("Error deleting");
                                                                    }
                                                                }
                                                            });
                                                        }
                                                    },
                                                    async: false,
                                                    error: function(jqXHR, exception){
                                                        console.log("Error");
                                                        console.log(jqXHR.responseText);
                                                    }
                                                });

                                            }
                                            else{
                                                console.log("Error deleting");
                                            }
                                        }
                                    });
                                }
                            },
                            async: false,
                            error: function(jqXHR, exception){
                                console.log("Error");
                                console.log(jqXHR.responseText);
                            }
                        });
                    })();

                    // ########################################### DELETE ALL BOOKINGS UNDER THAT ACCOUNT ######################
                    (function () {
                        $.ajax({
                            type: "GET",
                            url: "http://localhost:8080/taft2GO/booking/?filter={'accountID': '"+ id +"'}",
                            dataType: "json",
                            success: function(response){
                                console.log(response._embedded);
                                var bookings = response._embedded;

                                // loop around each booking, deleting them in the db
                                for(var i = 0; i < bookings.length; i++){
                                    var bookingID = bookings[i]._id.$oid;
                                    $.ajax({
                                        type: "DELETE",
                                        url: "http://localhost:8080/taft2GO/booking/" +bookingID,
                                        processData: false,
                                        contentType: "application/json",
                                        complete: function(jqXHR, exception){
                                            console.log(jqXHR.status);
                                            console.log(jqXHR.responseText);
                                            if(jqXHR.status == 204){
                                                console.log("booking "+bookingID + "successfully deleted.");


                                                // delete all bookings from the listing as well

                                            }
                                            else{
                                                console.log("Error deleting");
                                            }
                                        }
                                    });
                                }
                            },
                            async: false,
                            error: function(jqXHR, exception){
                                console.log("Error");
                                console.log(jqXHR.responseText);
                            }
                        });
                    })();

                    // ########################################### UPDATE Table ########################################
                    getAccounts();
                }
                else {
                    console.log("Error deleting");
                }
            },
            async: false

        });
    }
</script>
<?php endblock() ?>
</body>

</html>