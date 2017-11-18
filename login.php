<?php include 'base.php' ?>

<?php startblock('content') ?>
    <div class="py-5 text-white opaque-overlay w-100 h-100" style="background-image: url(&quot;homepage bg.jpg&quot;);">
      <div class="container">
        <div class="row h-100">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <img class="img-fluid d-block mx-auto" src="T2GO Logo.png" width="350">
            <h1 class="text-gray-dark baloo">Log In</h1>

              <div class="text-gray-dark baloo" id="feedback"></div>

            <form class="" method="POST" id="loginForm" action="/taft2GO/Session">
              <div class="form-group baloo"> <label class="baloo">Email address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email"> </div>
              <div class="form-group baloo"> <label class="baloo">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"> </div>


                <input type="hidden" value="" name="isAdmin" id="isAdmin">
                <input type="hidden" value="" name="objID" id="objID">

            </form>
            <button class="btn btn-primary baloo" onclick="login(email.value, password.value)">Log in</button>
            <p class="">&nbsp;</p>
            <p class="">Don't have an account?</p>
            <a href="/taft2GO/Signup" class="btn btn-outline-primary baloo">Sign up</a>
            <h1 class="display-1">&nbsp; &nbsp; &nbsp;&nbsp;</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
        </div>
      </div>
    </div>
<script>
    function login(email, pw) {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/taft2GO/account/?filter={'email': '" + email + "','password':'" + pw +"'}",
            dataType: "json",
            success: function(response){
                console.log(response);
                if(response._returned == 1){
                    response = response._embedded;
                    $('#isAdmin').val(response[0].isAdmin);
                    $('#objID').val(response[0]._id.$oid);
                    $('#loginForm').submit();
                    //$('#feedback').html('<h4>Email & password FETCHED.</h4>');
                }
                else{
                    $('#feedback').html('<h4>Email & password does not match.</h4>');
                    $('#email').val("");
                    $('#password').val("");
                }
            },

            error: function(jqXHR, exception){
                console.log(jqXHR);
            }
        });
    }
</script>
<?php endblock() ?>
