<?php include 'dashboard.php' ?>


<?php startblock('dashboardlink') ?>
<a class="btn navbar-btn ml-2 btn-link baloo text-white" href="/taft2GO/Dashboard">Dashboard
    <br> </a><?php endblock() ?>
<?php startblock('listingslink') ?>
<a class="btn navbar-btn ml-2 btn-link baloo text-secondary" href="/taft2GO/Listings">Listings
    <br> </a><?php endblock() ?>

<?php startblock('content') ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
            <?php startblock('sidemenu') ?>
                <div class="col-md-4 text-secondary">
          <a class="btn navbar-btn ml-2 btn-link baloo ml-auto text-secondary text-left menu">Listings</a>
          <a class="btn navbar-btn ml-2 btn-link baloo text-dark text-left ml-auto menu" href="listing-reservation.html">Reservations</a>
          <a class="btn navbar-btn ml-2 btn-link baloo text-dark ml-auto menu text-left" href="listing-requirements.html">Reservation Requirements</a>
          <a class="btn navbar-btn ml-2 btn-link baloo text-dark ml-auto menu text-left" href="listing-page.html">Listings Page</a>
          <a class="btn btn-primary baloo" href="/taft2GO/AddListing">Add New Listing
            <br> </a>
        </div>
            <?php endblock() ?>


            <?php startblock('menucontent') ?>
                <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <p class="lead">You don't have any listings yet.</p>
              <p class="">Make money by renting out your extra space on taft2GO. You’ll also get to meet interesting people from around the country!</p>
              <a href="/taft2GO/AddListing" class="btn btn-outline-primary baloo">Post a new listing</a>
            </div>
          </div>
        </div>
            <?php endblock() ?>
      </div>
    </div>
  </div>
<?php endblock() ?>
