<?php include 'search-results.php' ?>
<?php startblock('style')?><link rel="stylesheet" href="/taft2GO/style.css" type="text/css"><?php endblock()?>

<?php startblock('logo') ?><img src="/taft2GO/T2G Logo.png" width="" height="50" class="d-inline-block align-top m-0" alt=""><?php endblock()?>
<?php startblock('content') ?>
<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <!--
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"></ul>
        <a class="btn navbar-btn ml-2 btn-link baloo text-white" href="dashboard.html">Dashboard
            <br> </a>
        <a class="btn navbar-btn ml-2 text-white btn-link baloo" href="inbox.html">Inbox
            <br> </a>
        <a class="btn navbar-btn ml-2 btn-link baloo text-white" href="listing.html">Listings
            <br> </a>
        <a class="btn navbar-btn ml-2 text-white btn-link baloo" href="stays.html">Stays
            <br> </a>
        <a class="btn navbar-btn ml-2 btn-link baloo text-secondary" href="profile.html">Profile
            <br> </a>
        <a class="btn navbar-btn ml-2 text-white btn-link baloo" href="account.html">Account </a>
    </div>
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    </div>
    -->
    <h3 class="text-white baloo">Edit Listing</h3>
</nav>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="feedback"></div>
                <div class="card">
                    <div class="card-header"> Basics</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">Full Address of Listing</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                <input class="form-control mr-sm-2 baloo" type="text" id="address" placeholder="Full Address"> </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">Type of Place</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                <select id="type">
                                    <option value="condo" selected>Condominium</option>
                                    <option value="dorm">Dormitory</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">Capacity</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                <select id="capacity">
                                    <?php
                                    for($i = 1; $i < 16; $i++){
                                        echo "<option value=\"{$i}\">for {$i} guest</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">No. of Bathrooms</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                <input class="form-control  w-75" type="number" min="1" max="20" id="beds" placeholder="2">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">No. of Beds</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                <input class="form-control  w-75" type="number" min="1" max="20" step="0.5" id="bathrooms" placeholder="2">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">Amenities Offered</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                <textarea id="amenities" rows="5" cols="40" placeholder="Essentials: Towels, bed sheets, shampoo, soap, and toilet paper
Wifi, Closet/drawers, TV, gymnasium etc."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">Name of Place</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                <input id="title" class="form-control  w-75" type="text" placeholder="The Amazing Domicile">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">Description of Place</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                <textarea id="description" rows="5" cols="40" placeholder="Describe the decor light, what's nearby, etc."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">House Rules</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                <textarea id="rules" rows="5" cols="40" placeholder="Smoking not allowed, suitable for pets,  events or parties allowed, etc."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" style="transition: all 0.25s;">
                                <p class="lead text-right">Monthly Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ₱</p>
                            </div>
                            <div class="col-md-8" style="transition: all 0.25s;">
                                 <input class="form-control  w-75" type="number" min="1" step="any" id="monthlyRate" placeholder="5000">
                            </div>
                        </div>
                    </div>

                </div>
                <p class="lead">&nbsp;</p>
                <a class="btn btn-primary baloo text-white" onclick="saveListingDetails()">Save Listing Details</a><br><br>

                <div class="card">
                    <div class="card-header"> Photos of Listing</div>
                    <div class="card-body">


                    </div>
                </div>
                <h5 class="text-secondary">&nbsp; </h5>
                <a class="btn btn-primary baloo" href="">Save Photos</a>
            </div>
        </div>
    </div>
</div>


<?php endblock()?>

<script>
    function getURLParameter() {
        //return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
        var url = window.location.href;
        url = url.substr(url.lastIndexOf('s')+2);
        console.log(url);
        return url;
    }
    var listingID = getURLParameter();
    var verified = 0;
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/taft2GO/listing/?filter={'_id': {'$oid': '" + listingID +"'}}",
            dataType: "json",
            success: function(response){
                // get the object in listing
                console.log(response._embedded);
                var title = response._embedded[0].title;
                var description = response._embedded[0].description;
                var address = response._embedded[0].address;
                var type = response._embedded[0].type;
                //var photo = response._embedded[0].photo;
                var capacity = parseInt(response._embedded[0].capacity);
                var rules = response._embedded[0].rules;
                var beds = parseInt(response._embedded[0].beds);
                var bathrooms = parseFloat(response._embedded[0].bathrooms);
                var amenities = response._embedded[0].amenities;
                var monthlyRate = parseFloat(response._embedded[0].monthlyRate);
                var status = response._embedded[0].status;
                var aveRating = response._embedded[0].aveRating;
                verified = response._embedded[0].isVerified;
                var accountID = response._embedded[0].accountID;

                $('#address').val(address);
                $('#title').val(title);
                $('#description').val(description);
                $('#type').val(type);
                $('#capacity').val(capacity);
                $('#monthlyRate').val(monthlyRate);
                $('#rules').val(rules);
                $('#beds').val(beds);
                $('#bathrooms').val(bathrooms);
                $('#aveRating').val(aveRating);
                $('#amenities').val(amenities);

            },
            error: function(jqXHR, exception){
                console.log("Error");
                console.log(jqXHR.responseText);
            }
        });
    });

    function saveListingDetails(){
        console.log("save listing details");


        var address = document.getElementById("address").value;
        var type = document.getElementById("type");
        var capacity = document.getElementById("capacity");
        type = type.options[type.selectedIndex].value;
        capacity = capacity.options[capacity.selectedIndex].value;

        var beds = parseInt(document.getElementById("beds").value);
        var bathrooms = parseFloat(document.getElementById("bathrooms").value);
        var amenities = document.getElementById("amenities").value;
        var title = document.getElementById("title").value;
        var description = document.getElementById("description").value;
        var rules = document.getElementById("rules").value;
        var monthlyRate = parseFloat(document.getElementById("monthlyRate").value);

        // PATCHING TIME

        var patchData = '{"address":"'+ address + '"type:"'+ type +
            '"capacity:"'+ capacity + '"rules:"'+ rules + '"beds:"'+ beds + '"bathrooms:"'+ bathrooms +
            '"amenities:"'+ amenities + '"monthlyRate:"'+ monthlyRate + '"title:"'+ title +
            '"description:"'+ description + '"}';

        $.ajax({
            type: "PATCH",
            url: "http://localhost:8080/taft2GO/listing/" + listingID,
            processData: false,
            contentType: "application/json",
            data: patchData,
            complete: function (jqXHR, exception) {
                console.log(jqXHR.status);
                console.log(jqXHR.responseText);

                if (jqXHR.status == 200) { // created
                    console.log("listing " + listingID + " successfully edited.");
                    $('#feedback').html('<div class="col-md-12">'
                        + '<div class="alert alert-success" role="alert">'
                        + '<button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>'
                        + '<h4 class="alert-heading">Listing Edited! </h4>'
                        + '<p class="mb-0">You may now view your newly edited listing in the listings tab of your account.</p>'
                        + '</div>'
                        + '</div>');

                }
                else {
                    console.log("Error verifying");
                }
            }
        });
    }

</script>