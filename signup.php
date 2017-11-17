<!DOCTYPE html>
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
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required> </div>

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

    function createNewAccount(){

        var email = $('#email').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var password = $('#password').val();
        var username = "";
        var isActive = 1;
        var isAdmin = 0;
        var profilePic = "";

        var postData = '{"fname":"'+ fname + ', "lname:"'+ lname + ', "email:"'+ email + ', "password:"'+ password + 
                        ', "isActive:"'+ isActive + ', "isAdmin:"'+ isAdmin + ', "profilePic:"'+ profilePic + '"}';
        
        $.ajax({
          type: "POST",
          url: "http://127.0.0.1:8080/browser/taft2GO/account",
          processData: false,
          contentType: "application/json",
          data: postData,
          complete: function(jqXHR, exception){
              console.log(jqXHR.status);
              console.log(jqXHR.responseText);

              if(jqXHR.status == 201){ // created
                  $('#feedback').html('<h3>Successfully Registered! Please <a href="/taft2GO/Login">Login</a> to continue</h3>');
                  $('#email').val('');
                  $('#fname').val('');
                  $('#lname').val('');
                  $('#password').val('');
                  $('#confirm_password').val('');
              }
              else if(jqXHR.status == 409){ // conflict
                $('#feedback').html('<h3>Successfully Registered! Please <a href="/taft2GO/Login">Login</a> to continue</h3>');
              }
              else{
                $('#feedback').html('<h3>Error procesing request.</h3>');
              }
          }

        });
        
    }

    /*
    $(document).ready(function() {

      $('#').click(function () { // Stop movement
            
        });

    });
*/
</script>
<?php endblock() ?>