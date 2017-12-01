<?php include 'base.php' ?>

<?php startblock('content') ?>

    <div class="py-5 text-white opaque-overlay w-100 h-100" style="background-image: url(&quot;homepage bg.jpg&quot;);">
        <div class="container">
            <div class="row h-100">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <img class="img-fluid d-block mx-auto" src="T2GO Logo.png" width="350">
                    <h1 class="text-gray-dark baloo">Sign Up</h1>

                    <div class="text-gray-dark baloo" id="feedback"></div>

                    <!--<form class="">--><!---->
                    <div class="form-group baloo"> <label class="baloo">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required autofocus> </div>

                    <div class="form-group baloo text-white"> <label class="baloo">First Name</label>
                        <input type="text" id="fname" name="firstname" class="form-control" placeholder="First Name" required> </div>

                    <div class="form-group baloo"> <label class="baloo">Last Name</label>
                        <input type="text" id="lname" name="lastname" class="form-control" placeholder="Last Name" required> </div>

                    <div class="form-group baloo"> <label class="baloo">Password</label>
                        <input type="password" id="password" name="password" class="form-control" onkeyup='check();' placeholder="Create Password" required> </div>

                    <div class="form-group baloo"> <label class="baloo">Verify Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" onkeyup='check()' placeholder="Retype Password" required> <span id='message'></span></div>


                    <!--<button class="btn btn-primary baloo" id="test">Sign up</button>-->
                    <button class="btn btn-primary baloo" type="submit" onclick="createNewAccount();">Sign up</button>
                    <p class="">&nbsp; &nbsp;&nbsp;</p>
                    <p class="">Already have a taft2GO account?&nbsp;</p>
                    <a href="/taft2GO/Login" class="btn btn-outline-primary baloo">Log in</a>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>

        function check() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'lightgreen';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('message').style.color = 'red';
            }

        }

        function validateEmail(email) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        function checkUniqueEmail(email){
            var isUnique = true;
            $.ajax({
                type: "GET",
                url: "http://localhost:8080/taft2GO/account/?filter={'email': '" + email +"'}",
                dataType: "json",
                success: function(response){
                    console.log(response);
                    if(response._returned > 0){
                        response = response._embedded;
                        isUnique = false;
                    }
                },
                async: false,
                error: function(jqXHR, exception){
                    console.log(jqXHR);
                }
            });
            return isUnique;
        }

        function createNewAccount(){

            var email = $('#email').val();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var password = $('#password').val();
            var confirm = $('#confirm_password').val();
            var username = "";
            var isActive = 1;
            var isAdmin = 0;
            var profilePic = "";

            if(email == "" || fname == "" || lname == "" || password == "" || confirm == ""){
                $('#feedback').html('<h4>Please fill out all fields.</h4>');
            }
            else if(password != confirm){
                $('#feedback').html('<h4>Passwords do not match.</h4>');
                $('#password').val('');
                $('#confirm_password').val('');
            }
            else if(validateEmail(email) == false){
                $('#feedback').html('<h4>Please enter a valid email address.</h4>');
                $('#password').val('');
                $('#confirm_password').val('');
            }
            else if(checkUniqueEmail(email) == false){
                $('#feedback').html('<h4>Email address already exists.</h4>');
                $('#password').val('');
                $('#confirm_password').val('');
            }
            else {
                var postData = '{"fname":"' + fname + '"lname:"' + lname + '"email:"' + email + '"username:"' + username + '"password:"' + password +
                    '"isActive:"' + isActive + '"isAdmin:"' + isAdmin + '"profilePic:"' + profilePic + '"}';


                $.ajax({
                    type: "POST",
                    url: "http://localhost:8080/taft2GO/account",
                    processData: false,
                    contentType: "application/json",
                    data: postData,
                    complete: function (jqXHR, exception) {
                        console.log(jqXHR.status);
                        console.log(jqXHR.responseText);

                        if (jqXHR.status == 201) { // created
                            $('#feedback').html('<h4>Successfully Registered! Please <a href="/taft2GO/Login">Login</a> to continue</h4>');
                            $('#email').val('');
                            $('#fname').val('');
                            $('#lname').val('');
                            $('#password').val('');
                            $('#confirm_password').val('');
                        }

                        else {
                            $('#feedback').html('<h4>Error procesing request.</h4>');
                        }
                    }

                });

            }

        }


    </script>
<?php endblock() ?>