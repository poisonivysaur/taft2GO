<?php include 'base.php' ?>

<?php

    session_start();
    if (isset($_POST['email'])){
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['isAdmin'] = $_POST['isAdmin'];
        $_SESSION['objID'] = $_POST['objID'];
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];

        header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF']).$_POST['roompage']);
    }

?>
<?php startblock('searchbar') ?>
<input class="form-control mr-sm-2 baloo" type="text" placeholder="Find the right place...">
<a href="/taft2GO/Search" class="btn btn-outline-primary baloo">Search</a>
<?php endblock() ?>

<?php startblock('content') ?>
    <div class="py-5 text-white opaque-overlay w-100 h-100" style="background-image: url(&quot;homepage bg.jpg&quot;);">
      <div class="container">
        <div class="row h-100">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <img class="img-fluid d-block mx-auto" src="T2GO Logo.png" width="350">
            <h1 class="text-gray-dark baloo">Log In</h1>
              <p><?php //echo " ".$_SESSION['email']." "; ?></p>
              <div class="text-gray-dark baloo" id="feedback"></div>

            <form class="" method="POST" id="loginForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="form-group baloo"> <label class="baloo">Email address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email"> </div>
              <div class="form-group baloo"> <label class="baloo">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"> </div>


                <input type="hidden" value="" name="isAdmin" id="isAdmin">
                <input type="hidden" value="" name="objID" id="objID">
                <input type="hidden" value="" name="fname" id="fname">
                <input type="hidden" value="" name="lname" id="lname">
                <input type="hidden" value="/Dashboard" name="roompage" id="roompage">

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

    $(document).ready(function(){
        var roomURL = sessionStorage.getItem('roompage');
        if(roomURL !== null){
            console.log('session roompage is not null yay');
            console.log('ROOM URL '+roomURL);
            $('input[name="roompage"]').val(roomURL);

        }
    });
    function login(email, pw) {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/taft2GO/account/?filter={'email': '" + email + "','password':'" + pw +"'}",
            dataType: "json",
            success: function(response){
                console.log(response);
                if(response._returned > 0){
                    response = response._embedded;
                    $('#isAdmin').val(response[0].isAdmin);
                    $('#objID').val(response[0]._id.$oid);
                    $('#fname').val(response[0].fname);
                    $('#lname').val(response[0].lname);
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
