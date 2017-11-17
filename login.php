<!DOCTYPE html>
<?php include 'base.php' ?>

<?php startblock('content') ?>
    <div class="py-5 text-white opaque-overlay w-100 h-100" style="background-image: url(&quot;homepage bg.jpg&quot;);">
      <div class="container">
        <div class="row h-100">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <img class="img-fluid d-block mx-auto" src="T2GO Logo.png" width="350">
            <h1 class="text-gray-dark baloo">Log In</h1>
            <form class="" method="post" action="https://formspree.io/">
              <div class="form-group baloo"> <label class="baloo">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email"> </div>
              <div class="form-group baloo"> <label class="baloo">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password"> </div>
            </form>
            <a class="btn btn-primary baloo" href="dashboard.html">Log in</a>
            <p class="">&nbsp;</p>
            <p class="">Don't have an account?</p>
            <a href="signup.html" class="btn btn-outline-primary baloo">Sign up</a>
            <h1 class="display-1">&nbsp; &nbsp; &nbsp;&nbsp;</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
        </div>
      </div>
    </div>
<?php endblock() ?>
