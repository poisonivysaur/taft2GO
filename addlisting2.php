    <div class="progress">
          <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
      </div>

  <div class="py-5 ">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-secondary">
          <h1 class="text-dark">Great progress!</h1>
          <p class="text-info">Now let's get some details about your place so you can publish your listing.</p>
          <p class="text-secondary">STEP 2</p>
          <h4 class="text-info">Set the Scene</h4>
          <h6 class="text-muted">Beds, bathrooms, amenities, etc.</h6>

            <p class="p-y-1 text-dark">How many beds can guests use?</p>
            <input class="form-control  w-75" type="number" min="1" max="20" id="beds" placeholder="2">
            <br>

            <p class="p-y-1 text-dark">How many bathrooms?</p>
            <input class="form-control  w-75" type="number" min="1" max="20" step="0.5" id="bathrooms" placeholder="2">
            <br>

            <p class="p-y-1 text-dark">What amenities do you offer?</p>
            <textarea id="amenities" rows="5" cols="50" placeholder="Essentials: Towels, bed sheets, shampoo, soap, and toilet paper
Wifi, Closet/drawers, TV, gymnasium etc."></textarea>
            <br>
            <!--
          <p class="p-y-1 text-dark">Show travelers what you space looks like.</p>
          <a href="#" class="btn btn-primary baloo">Upload Photos</a>
          -->
        </div>

          <div class="col-md-4">
              <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  <h4>The number and type of beds you have determines how many guests can stay comfortably.</h4>
              </div>
              <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  <h4>If you have a toilet separate from the shower, count it as a 0.5 bathroom.</h4>
              </div>
          </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3">
          <button class="btn btn-outline-primary mx-0 w-100" onclick="goBackTo1()">Back</button>
        </div>
        <div class="col-md-3">
          <button class="btn btn-primary w-100" onclick="goNextTo3()">Next </button>
        </div>
      </div>
      <br> </div>