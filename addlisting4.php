<div class="progress">
    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 100%" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100">100%</div>
  </div>
    <div id="feedback"></div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-secondary">
          <h1 class="text-dark">Last step!</h1>
          <p class="text-info">Let’s set up your pricing and figure out your hosting calendar. </p>
            <h4 class="text-info">Price your monthly space</h4>
            <h6 class="text-muted">Increase your chances of getting booked
                Set up Smart Pricing to automatically keep your nightly prices competitive as demand in your area changes.
            </h6>
            <br>
            <h5 class="text-muted">Set up the same base price for each month</h5>
            <p class="text-info"><b>Base Price </b>This will be your default nightly price for days when you decide to turn off Smart Pricing.</p>
            <input class="form-control  w-75" type="number" min="1" step="any" id="monthlyRate" placeholder="5000">
            <br>
        </div>
        <div class="col-md-6">
            <!--
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <h4 class="alert-heading">Your New Listing</h4>
            <p>Preview</p>
          </div>
            -->
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                <h4 class="alert-heading">Start with a lower price to attract bookings</h4>
                <h6>New hosts start with a lower price to attract their first few bookings. Hosts who set prices within 5% of price tips are nearly 4x more likely to get booked.</h6>
            </div>
        </div>
      </div>
      <br>
        <div class="row">
            <div class="col-md-3">
                <button class="btn btn-outline-primary mx-0 w-100" onclick="goBackTo3()">Back</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100" onclick="finish()">Finish </button>
            </div>
        </div>
      <br> </div>