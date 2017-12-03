<?php include 'search-results.php' ?>
<?php startblock('style')?>
    <link rel="stylesheet" href="/taft2GO/style.css" type="text/css">

    <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
    <link rel="import" href="my-carousel.html">
    <link rel="import" href="my-description.html">
    <link rel="import" href="bower_components/paper-button/paper-button.html">
    <link rel="import" href="bower_components/paper-input/paper-input.html">

    <script src="https://cdn.vaadin.com/vaadin-elements/master/mock-http-request/lib/mock.js"></script>
    <link rel="import" href="bower_components/vaadin-upload/vaadin-upload.html">
    <style>

        my-carousel {
            width: 100%;
        }

        my-carousel::after {
            display: block;
            content: '';
            padding-top: 40%; /* 4:3 = height is 75% of width */
        }

        my-carousel img {
            position: absolute;
            width: 100%;
            height: 300px;
        }

        paper-button.primary {
            color: #fff;
            background: limegreen;/*var(--primary-color);*/
        }

    </style>
    <style is="custom-style">

        vaadin-upload.thick-border {
            --primary-color: mediumslateblue;
            --dark-primary-color: #063;
            --light-primary-color: #6c9;
            --error-color: darkred;

            border: 2px solid mediumpurple;
            padding: 14px;
            background: lightgreen;
            border-radius: 0;
        }

        vaadin-upload.thick-border[dragover] {
            border-color: #396;
        }
    </style>
<?php endblock()?>

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
    <h1 class="text-white baloo">Edit Listing</h1>
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
                        <my-carousel id="images">
                            <img data-src="images/coverphoto.jpg">
                            <img data-src="images/home%201.png">
                            <img data-src="images/home%202.png">
                            <img data-src="images/manres.jpg">

                        </my-carousel>

                        <h1 class="baloo">Upload Image</h1>
                        <vaadin-upload id="vaadin" class="thick-border" accept="image/*"></vaadin-upload>

                        <div class="card">
                            <!--
                            <h4>Image directory: <paper-input id = "imgPath"></paper-input></h4>-->
                            <h4>Description: <paper-input id="imgDesc"></paper-input></h4>
                            <paper-button raised class="primary" onclick="addImage()">Submit</paper-button>
                        </div>
                    </div>
                </div>
                <h5 class="text-secondary">&nbsp; </h5>
                <a class="btn btn-primary text-white baloo" onclick="savePhotos()">Save Photos</a>
            </div>
        </div>
    </div>
</div>


<?php endblock()?>

<script>
    var files;  // PHOTOS THAT ARE UPLOADED IN THE VAADIN ELEMENT


    function getURLParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
        /*var url = window.location.href;
        url = url.substr(url.lastIndexOf('s')+2);
        console.log(url);
        return url;*/
    }
    var listingID = getURLParameter("listingID");
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

    const imgCarousel = document.querySelector('#images');
    setInterval(_ => imgCarousel.next(), 3000);

    function addImage() {

        //imgPath = 'images/' + document.querySelector('vaadin-upload').shadowRoot.innerHTML; //shadowRoot.querySelector('#name').value;
        files = document.querySelector('#vaadin').files;
        console.log(files);

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            let img = document.createElement('img');
            img.classList.add("obj");
            img.file = file;
            //img.setAttribute('data-src', imgPath);
            imgCarousel.appendChild(img);

            var reader = new FileReader();
            reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
            reader.readAsDataURL(file);
        }

        console.log(document.querySelector('#imgDesc').value);
        let imgDesc = document.querySelector('#imgDesc').value;
        let desc = document.createElement('p');
        desc.innerHTML = imgDesc;
        descCarousel.appendChild(desc);

    }/*
    function savePhotos(){
        console.log("saving time!");

        // PATCHING TIME

        var patchData = '{"photo":[';

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            if(i == files.length-1) {   // last file
                patchData += JSON.stringify(file);
            }
            else{
                patchData += JSON.stringify(file) + ',';
            }
        }
        patchData += ']}';

        console.log(patchData);


    }*/
    function savePhotos() {
        var imgs = document.querySelectorAll(".obj");

        for (var i = 0; i < imgs.length; i++) {
            new FileUpload(imgs[i], imgs[i].file);
        }
    }

    function FileUpload(img, file) {
        var reader = new FileReader();
        //this.ctrl = createThrobber(img);
        var xhr = new XMLHttpRequest();
        this.xhr = xhr;

        var self = this;/*
        this.xhr.upload.addEventListener("progress", function(e) {
            if (e.lengthComputable) {
                var percentage = Math.round((e.loaded * 100) / e.total);
                self.ctrl.update(percentage);
            }
        }, false);

        xhr.upload.addEventListener("load", function(e){
            self.ctrl.update(100);
            var canvas = self.ctrl.ctx.canvas;
            canvas.parentNode.removeChild(canvas);
        }, false);*/
        xhr.open("PATCH", "http://localhost:8080/taft2GO/listing/" + listingID,);
        xhr.overrideMimeType('application/json; charset=x-user-defined-binary');
        xhr.setRequestHeader("Content-type", "application/json");
        reader.onload = function(evt) {
            console.log("WHAT IT LOOKS LIKE: "+'{"photo": "'+evt.target.result+'"}');
            xhr.send(evt.target.result);
        };
        reader.readAsBinaryString(file);
    }

</script>
<script>// for the vaadin element
    function mockXhrGenerator(file) {
        var xhr = new MockHttpRequest();
        xhr.upload = {};
        xhr.onsend = function() {
            var total = file && file.size || 1024, done = 0;
            function start() {
                setTimeout(progress, 1000);
            }
            function progress() {
                xhr.upload.onprogress({total: total, loaded: done});
                if (done < total) {
                    setTimeout(progress, 200);
                    done = Math.min(total, done + 254000);

                } else if (!file.abort) {
                    setTimeout(finish, 1000);
                }
            }
            function finish() {
                xhr.receive(200, '{"message":"OK"}');
            }
            start();
        };
        return xhr;
    }

    window.addEventListener('WebComponentsReady', function() {
        // Monkey-patch vaadin-upload prototype to use MockHttpRequest
        Object.getPrototypeOf(document.createElement('vaadin-upload'))._createXhr = mockXhrGenerator;
        this.dispatchEvent(new CustomEvent('upload-success', {bubbles :  true, composed: true}));
    });
</script>