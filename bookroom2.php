<h1 class="baloo"> Who's coming?</h1>

          </div>
        <div class="form-group" id="numOfGuests">

        </div>
        <p class="lead"> </p>
          <p class="lead" id="tell">Tell your host about your trip</p>
            <p id="hostPic"></p>
          <p class="">Sharing your trip details can help your host confirm your reservation more quickly.</p>
          <ul class="border border-secondary bg-light">
            <li>What brings you to the area?</li>
            <li>Who are you traveling with?</li>
            <li class="bg-light">What are your check-in details?</li>
          </ul>
          <input class="form-control mr-sm-2 h-50 text-left" id="tripDetails" type="text" placeholder="Answer it here">
          <br>
          <button class="btn btn-primary baloo w-50" onclick="goToBooking3()">Continue
            <br> </button>

<script>
    $(document).ready(function(){
        console.log('orayt booking 2 get session fname: '+sessionStorage.getItem('hostfname')+'pic: '+sessionStorage.getItem('hostPic'));
        $('#tell').html('Tell '+sessionStorage.getItem('hostfname')+' about your trip');
        $('#hostPic').html('<img width="50" src="'+sessionStorage.getItem('hostPic')+'">');
    });
</script>