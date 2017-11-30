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