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
          <form class="" method="post" action="https://formspree.io/">
            <div class="form-group baloo"> <label class="baloo">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email"> </div>
            <div class="form-group baloo text-white"> <label class="baloo">First Name</label>
              <input type="text" name="firstname" class="form-control" placeholder="First Name"> </div>
            <div class="form-group baloo"> <label class="baloo">Last Name</label>
              <input type="text" name="lastname" class="form-control" placeholder="Last Name"> </div>
            <div class="form-group baloo"> <label class="baloo">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Create Password"> </div>
            <div class="form-group baloo"> <label class="baloo">Verify Password</label>
              <input type="password" name="password" class="form-control" placeholder="Create Password"> </div>
          </form>
          <a class="btn btn-primary baloo" href="">Sign up</a>
          <p class="">&nbsp; &nbsp;&nbsp;</p>
          <p class="">Already have a taft2GO account?&nbsp;</p>
          <a href="login.html" class="btn btn-outline-primary baloo">Log in</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12"></div>
      </div>
    </div>
  </div>

<?php endblock() ?>