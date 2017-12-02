<?php include 'admin-dashboard.php' ?>

<?php startblock('sidemenu') ?>
<div class="col-md-4 text-secondary">
    <a class="btn navbar-btn ml-2 btn-link baloo ml-auto text-secondary text-left menu" href="/taft2GO/AdminListings">Unverified Listings</a>
    <!--<a class="btn navbar-btn ml-2 btn-link baloo text-dark text-left ml-auto menu" href="/taft2GO/Listings-Reservations">Deactivated Accounts</a>-->
</div>
<?php endblock() ?>

<?php startblock('menucontent') ?>
    <div id="listings" class="col-md-8">

    </div>
<?php endblock() ?>

<?php startblock('adminScript') ?>
<script>
    $(document).ready(function(){
        getListings();
    });

    function getListings(){
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/taft2GO/listing?filter={'isVerified': '" + 0 + "'}",
            dataType: "json",
            success: function (response) {
                var response = response._embedded;
                console.log(response);
                var tableData = '<h2 class="baloo">Unverified Listings</h2><div class="row mb-3">'
                    + '<div class="col-md-12">'
                    + '<div class="table-responsive">'
                    + '<table class="table table-hover table-bordered nowrap material-shadow" cellspacing="0" width="100%" id="table">'
                    + '<thead class="thead-inverse">'
                    + '<tr><th>Listing Place</th><th>Address</th><th>Type</th><th>Capacity</th><th>Beds</th><th>Bathrooms</th><th>Amenities</th><th>Status</th><th>Verify Listing</th></tr></thead><tbody>';

                for(var i = 0; i < response.length; i++){
                    var id = response[i]._id.$oid;
                    console.log(id);
                    tableData += '<tr>'
                        + '<td onmouseover="this.style.cursor=\'pointer\'">' + '<img class="img-fluid d-block" src="'+ response[i].photo +'"><br><p>'+ response[i].title +'</p>' + '</td>'
                        + '<td>' + response[i].address + '</td>'
                        + '<td>' + response[i].type + '</td>'
                        + '<td>' + response[i].capacity + '</td>'
                        + '<td>' + response[i].beds + '</td>'
                        + '<td>' + response[i].bathrooms + '</td>'
                        + '<td>' + response[i].amenities + '</td>'
                        + '<td>' + response[i].status + '</td>'
                        + '<td><paper-button raised class="btn btn-primary baloo" onclick=verify("'+ id +'")>Verify</paper-button></td>'
                        + '</tr>';
                }
                tableData += '</tbody></table></div></div></div>';
                $('#listings').html(tableData);
                $('#table').DataTable({
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal( {
                                header: function ( row ) {
                                    var data = row.data();
                                    return 'Details for '+data[1]+' '+data[2];
                                }
                            } ),
                            renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                                tableClass: 'table'
                            } )
                        }
                    }
                });
            },

            error: function (jqXHR, exception) {
                console.log(jqXHR);
            }
        });
    }
    function verify(id){
        console.log("verify "+id);
        var patchData = "{'isVerified':'1'}";
        $.ajax({
            type: "PATCH",
            url: "http://localhost:8080/taft2GO/listing/" + id,
            processData: false,
            contentType: "application/json",
            data: patchData,
            complete: function (jqXHR, exception) {
                console.log(jqXHR.status);
                console.log(jqXHR.responseText);

                if (jqXHR.status == 200) { // created
                    console.log("listing " + id + " successfully verified.");
                }
                else {
                    console.log("Error verifying");
                }

                getListings();
            }
        });
    }

</script>
<?php endblock() ?>
