<!DOCTYPE html>
<?php header('Access-Control-Allow-Origin: *'); ?>
<html>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

First name: <input type="text" id="fname" name="fname" value="Mickey"><br>
Last name: <input type="text" id="lname" name="lname" value="Mouse"><br>
email: <input type="email" id="email" name="email" value="Mouse"><br>

	<button type="button" onclick="insertDocument(fname.val, lname.val)">Submit</button>


<p>Click the "Submit" button and the form-data will be sent to a page on the server called "/action_page.php".</p>


<script>
	function insertDocument(){

		var postData = '{"fname":"'+ fname + ', "lname:"'+ lname + ', "email:"'+ email +  '"}';
        
        
		$.ajax({
          type: "POST",
          url: "http://localhost:8080/orayt/oraytest1", 
          processData: false,
          contentType: "application/json",
          data: postData,
          complete: function(jqXHR, exception){
              console.log(jqXHR.status);
              console.log(jqXHR.responseText);
          }

        });
/*
         $.ajax({
          type: "GET",
          url: "http://localhost:8080/taft2GO/account",
          dataType: "jsonp",
          success: function(response){
            console.log(response);
          },

          error: function(jqXHR, exception){
            console.log(jqXHR);
          }
        });
*/
	}
</script>
</body>
</html>


db.listing.insertOne( {
        objID: "5a0f02887eeafaba61cff980",
        address:"Manila Residences Tower II, Taft Avenue, Manila, Philippines",
        type:"condo",
        photo:"https://d38dwrpoohadw1.cloudfront.net/public/preselling/project_1437462310_7978_3844.jpg",
        capacity: 4,
        rules: "no smoking",
        beds: 4,
        bathroom: 2,
        amenities:"swimming pool, gym",
        monthlyRate: 12000,
        status: "available",
        description: "amazing"
});