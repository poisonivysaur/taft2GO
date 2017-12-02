


<script>
    function getURLParameter() {
        //return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
        var url = window.location.href;
        url = url.substr(url.lastIndexOf('s')+2);
        console.log(url);
        return url;
    }
    var accountID;
    var listingID = getURLParameter();
    var checkin = '';
    var checkout = '';
    var days = 0;
    var total = '';
    $(document).ready(function(){

        console.log(listingID);

        var hostfname;
        var profPic;
        var monthlyRate = 0;
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
                var photo = response._embedded[0].photo;
                var capacity = parseInt(response._embedded[0].capacity);
                var rules = response._embedded[0].rules;
                var beds = parseInt(response._embedded[0].beds);
                var bathrooms = parseFloat(response._embedded[0].bathrooms);
                var amenities = response._embedded[0].amenities;
                monthlyRate = parseFloat(response._embedded[0].monthlyRate);
                var status = response._embedded[0].status;
                var aveRating = response._embedded[0].aveRating;
                var verified = response._embedded[0].isVerified;
                var verifiedPic = "http://www.iconarchive.com/download/i103471/paomedia/small-n-flat/sign-check.ico";
                accountID = response._embedded[0].accountID;

                $('#title').html(title);
                $('#description').html(description);
                $('#type').html('Listing Type: '+type);
                $('#capacity').html('Capacity: '+capacity);
                $('#monthlyRate').html('Monthly Rate: ₱'+monthlyRate);
                $('#rules').html('House Rules: <br>'+rules);
                $('#beds').html('No. of beds: '+beds);
                $('#bathrooms').html('No. of bathrooms: '+bathrooms);
                $('#aveRating').html('Rating: '+aveRating);
                $('#amenities').html('Amenities: <br>'+amenities);
                $('#coverphoto').css("background-image","url("+ photo +")");
                $('#dailyRate').html('<span class="baloo" style="font-size: 36px">₱'+(monthlyRate/30).toFixed(2)+'</span> per night');
                if(verified == 1){
                    $('#verified').html('<img width="50" src="'+verifiedPic+'"><p>  Verified Place</p>');
                }

                var numOfPeople = '<label>People Staying</label><br><select id="numPersons">';
                for(var i = 1; i <= capacity; i++){
                    numOfPeople += '<option value="' + i + '">' + i + ' person(s)</option>';
                }
                numOfPeople += '</select>';
                $('#numOfPeople').html(numOfPeople);


                // get the host first name and photo
                (function () {
                    $.ajax({
                        type: "GET",
                        url: "http://localhost:8080/taft2GO/account/?filter={'_id': {'$oid': '" + accountID +"'}}",
                        dataType: "json",
                        success: function(response){
                            console.log(response._embedded);
                            hostfname = response._embedded[0].fname;
                            profPic = 'https://cdn1.iconfinder.com/data/icons/mix-color-4/502/Untitled-1-512.png';
                            sessionStorage.setItem('hostfname', hostfname);
                            sessionStorage.setItem('hostPic', profPic);
                            $('#host').html('<img width="50" src="'+profPic+'"><br><p>Hosted by '+hostfname+'</p>');
                        },
                        error: function(jqXHR, exception){
                            console.log("Error");
                            console.log(jqXHR.responseText);
                        }
                    });
                })();
            },
            error: function(jqXHR, exception){
                console.log("Error");
                console.log(jqXHR.responseText);
            }
        });



        $('#checkin').on("input change", function (e) {
            console.log("Date changed: ", e.target.value);
            checkin = e.target.value;
            console.log("checkin date: "+checkin);

            if(checkin != '' && checkout != '') {
                console.log('yay not empty for both');
                showDays(checkout, checkin);
                total = '<h4><b>Total: ₱'+ (monthlyRate/30*days).toFixed(2)+ '</b></h4> <p>('+ (monthlyRate/30).toFixed(2) +' x '+ days +' days) </p>';
                $('#total').html(total);
            }

        });
        $('#checkout').on("input change", function (e) {
            console.log("Date changed: ", e.target.value);
            checkout = e.target.value;
            console.log("checkout date: "+checkout);

            if(checkin != '' && checkout != '') {
                console.log('yay not empty for both');
                showDays(checkout, checkin);
                total = '<h4><b>Total: ₱'+ (monthlyRate/30*days).toFixed(2)+ '</b></h4> <p>('+ (monthlyRate/30).toFixed(2) +' x '+ days +' days) </p>';
                $('#total').html(total);
            }
        });
        function showDays(firstDate,secondDate){

            var startDay = new Date(firstDate);
            var endDay = new Date(secondDate);
            var millisecondsPerDay = 1000 * 60 * 60 * 24;

            var millisBetween = startDay.getTime() - endDay.getTime();
            days = millisBetween / millisecondsPerDay;

            // Round down.
            console.log( Math.floor(days));

        }



        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

        var disqus_config = function () {
            this.page.url = "localhost/taft2GO/room-page.php?listingID=";  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = listingID; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://taft2go.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    });

    function BOOK() {
        //document.getElementById('bookingForm').submit();

        console.log('in set session');
        sessionStorage.setItem('listingID', listingID);
        sessionStorage.setItem('checkin', checkin);
        sessionStorage.setItem('checkout', checkout);
        var numPersons = document.getElementById("numPersons");
        numPersons = numPersons.options[numPersons.selectedIndex].value;
        sessionStorage.setItem('numPersons', numPersons);
        sessionStorage.setItem('total', total);
        var url = window.location.href;
        url = url.substr(0, url.indexOf('O')+1);
        console.log(url);

        var isLoggedIn = <?php if(!empty($_SESSION['isLoggedIn'])) echo 'true'; else echo 'false';?>;
        console.log(isLoggedIn);

        if(isLoggedIn == true){

            if(accountID == "<?php if(isset($_SESSION['objID'])) echo $_SESSION['objID']; else echo '';?>"){
                alert('You cannot book your own place.');
                window.location.href = url + '/Listings';
            }
            else{
                var noConflict = true;
                $.ajax({
                    type: "GET",
                    url: "http://localhost:8080/taft2GO/booking/?filter={'listingID': '"+listingID+"'}",
                    dataType: "json",
                    success: function(response){
                        console.log('get bookings');
                        console.log(response._embedded);

                        var mgaBookings = response._embedded;
                        var checkin2;
                        var checkout2;
                        for(var k = 0; k < mgaBookings.length; k++){
                            checkin1 = new Date(checkin);
                            checkout1 = new Date(checkout);
                            checkin2 = new Date(mgaBookings[k].checkIn);
                            checkout2 = new Date(mgaBookings[k].checkOut);
                            console.log(checkin2);
                            if(checkin1 <= checkout2 && checkout1 >= checkin2) {
                                noConflict = false;
                            }

                        }
                    },
                    async: false,
                    error: function(jqXHR, exception){
                        console.log("Error");
                        console.log(jqXHR.responseText);
                    }
                });
                if(noConflict) { // no conflict
                    window.location.href = url + '/Booking';
                }
                else{
                    total = '<h4><b>Sorry, but those dates are unavailable.</b></h4>';
                    $('#total').html(total);
                }
            }

        }
        else{
            var roompageURL = window.location.href;
            roompageURL = roompageURL.substr(roompageURL.indexOf('O')+1)
            console.log(roompageURL);
            sessionStorage.setItem('roompage', roompageURL);
            window.location.href = url + '/Login';
        }
    }

    function areDatesAvailable(){

    }

</script>