<div id="feedback"></div>
<h1 class="baloo"> Make Booking Reservation</h1>
          <p class="lead">Billing country</p>
          <div class="btn-group">
            <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"> Select country</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>
          <p class="lead"> </p>
          <p class="lead">Select payment method</p>
            <select id="payWith">
                <option value="cash">Pay with cash (on hand)</option>
                <option value="check">Pay with check (on hand)</option>
            </select>
          <br>
          <p class="lead"> </p>
          <div class="row">
            <div class="col-md-6">
              <p class="lead">First name</p>
              <input class="form-control mr-sm-2" type="text" id="fname" placeholder=""> </div>
            <div class="col-md-6">
              <p class="lead">Last name </p>
              <input class="form-control mr-sm-2" type="text" id="lname" placeholder=""> </div>
          </div>
          <p class="lead"> </p>

          <p class="lead"> </p>
          <div class="row">
            <div class="col-md-6">
              <p class="lead" id="billingInfo">Billing info</p>
              <input class="form-control mr-sm-2" type="text" placeholder="Zip code"> </div>
          </div>
          <p class="lead"> </p>

          <br>
          <p class="">I agree to the House Rules and agree to pay the total amount shown, which includes Occupancy Taxes and Service Fees. Taft2GO now collects and remits government-imposed Occupancy Taxes in
            this location.</p>
          <button class="btn btn-primary baloo w-50" onclick="makeReservation()">Make Reservation</button>