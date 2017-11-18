<?php include 'search-results.php' ?>

<?php startblock('content') ?>

        <div id="changeable">
          <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
          </div>
          <div class="py-5">
            <div class="container">
              <div class="row">
                  <div class="col-md-6 text-secondary">

                      <h1 id="greeting" class="text-dark"></h1>
                      <p class="text-secondary">STEP 1 </p>
                      <h4 class="text-info">Start with the basics.</h4>
                      <h6 class="text-muted">Address, capacity, type of place.</h6>
                      <p class="p-y-1 text-dark">Where is your place located?</p>
                      <input class="form-control  w-75" type="text" id="address" placeholder="Full address">
                      <br>
                      <!--
                      <p class="p-y-1 text-dark">Street Address</p>
                      <input class="form-control  w-75" type="text" placeholder="Full address">-->
                      <br>
                      <p class="p-y-1 text-dark">What type of property is this?</p>
                      <div class="btn-group w-50">
                          <select id="type">
                              <option value="condo" selected>Condominium</option>
                              <option value="dorm">Dormitory</option>
                              <!--<option value="apartment">Apartment</option>-->
                              <!--<option value="transient">Transient</option>-->
                          </select>
                          <!--
                          <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"> Select One </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Condominium</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Dormitory</a>
                          </div>
                          -->
                      </div>
                      <br><br>
                      <p class="p-y-1 text-dark">Capacity:</p>
                      <div class="btn-group w-50">
                          <select id="capacity">
                              <?php
                                for($i = 1; $i < 16; $i++){
                                    echo "<option value=\"{$i}\">for {$i} guest</option>";
                                }
                              ?>

                          </select>
                      </div>
                  </div>


                <div class="col-md-4">
                  <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    <h4>Your exact address will only be shared with confirmed guests.</h4>
                  </div>
                </div>


              </div>

                <br>

              <div class="row">
                <div class="col-md-3">
                  <button class="btn btn-primary w-100" id="addlisting1" onclick="goNextTo2()">Continue </button>
                </div>
              </div>
              <br>
            </div>
            </div>
        </div>  <!-- CHANGEABLE -->



    <script>
        // variables to be inserted to listing collection later
            var accountID = '<?php echo $_SESSION['objID']  ?>';
            var title = '';
            var description = '';
            var address = '';
            var aveRating = 0.0;
            var monthlyRate = 0.0;

            var type = '';
            var photo = '';
            var capacity = 0;
            var rules = '';
            var beds = 0;
            var bathrooms = 0;
            var amenities = '';
            var status = '';


          //$(document).ready(function(){

              function getName(){
                  $.ajax({  // get the first name of the user that is logged in
                      type: "GET",
                      url: "http://localhost:8080/taft2GO/account/?filter={'_id': {'$oid': '<?php echo $_SESSION['objID']  ?>'}}",
                      dataType: "json",
                      success: function(response){
                          console.log(response);
                          var fname = response._embedded[0].fname;

                          $('#greeting').html("Hi, "+ fname +"! Let's get started listing your space.");

                      },

                      error: function(jqXHR, exception){
                          console.log(jqXHR);
                      }
                  });
              }

                getName();

          //});
            function goNextTo2(){   // gets address and type
                address = document.getElementById("address").value;
                type = document.getElementById("type");
                capacity = document.getElementById("capacity");
                console.log(address);
                console.log(type.options[type.selectedIndex].value);
                console.log(capacity.options[type.selectedIndex].value);


                 $.ajax({
                     type: "POST",
                     url: 'addlisting2.php',
                     dataType: "html",
                     success: function(result){
                     $('#changeable').html(result);
                     // $('#ajaxPostal').html(result);
                     }
                 });
            }

            function goBackTo1(){
                $.ajax({
                    type: "POST",
                    url: 'addlisting1.php',
                    dataType: "html",
                    success: function(result){
                        $('#changeable').html(result);
                        // $('#ajaxPostal').html(result);
                    }
                });
                getName();
            }
            function goNextTo3(){
                beds = parseInt(document.getElementById("beds").value);
                bathrooms = parseFloat(document.getElementById("bathrooms").value);
                amenities = document.getElementById("amenities").value;
                console.log("address: "+address);
                console.log("type: " +type.options[type.selectedIndex].value);
                console.log("capacity: "+capacity.options[type.selectedIndex].value);
                console.log("beds: "+beds);
                console.log("bathrooms: "+bathrooms);
                console.log("amenitites: "+amenities);

                $.ajax({
                    type: "POST",
                    url: 'addlisting3.php',
                    dataType: "html",
                    success: function(result){
                        $('#changeable').html(result);
                        // $('#ajaxPostal').html(result);
                    }
                });
            }


            function goBackTo2(){
                $.ajax({
                    type: "POST",
                    url: 'addlisting2.php',
                    dataType: "html",
                    success: function(result){
                        $('#changeable').html(result);
                        // $('#ajaxPostal').html(result);
                    }
                });
                getName();
            }
            function goNextTo4(){
                title = document.getElementById("title").value;
                description = document.getElementById("description").value;
                rules = document.getElementById("rules").value;
                console.log("address: "+address);
                console.log("type: " +type.options[type.selectedIndex].value);
                console.log("capacity: "+capacity.options[type.selectedIndex].value);
                console.log("beds: "+beds);
                console.log("bathrooms: "+bathrooms);
                console.log("amenitites: "+amenities);
                console.log("title: "+title);
                console.log("description: "+description);
                console.log("rules: "+rules);

                $.ajax({
                    type: "POST",
                    url: 'addlisting4.php',
                    dataType: "html",
                    success: function(result){
                        $('#changeable').html(result);
                        // $('#ajaxPostal').html(result);
                    }
                });
            }
      </script>
<?php  endblock() ?>