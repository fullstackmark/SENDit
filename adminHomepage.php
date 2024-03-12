<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <!-- <meta http-equiv="refresh" content="8"> -->
   <meta http-equiv="X-UA-Compatible">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>SENDit</title>

   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">

   <!-- <script>
  // JavaScript code to display a notification message
  window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
      alert("Data has been saved successfully!");
    }
   };
   </script> -->

   <style>
      body {
         max-width: 500px;
         background-image: image("C:\xampp\htdocs\SENDit\Schweppes_truck2.jpeg");
         background-color: rgb(245, 242, 237);
         margin: 0 auto;
      }
       .hidden {
      display: none;
    }
      #userForm label, #userForm input {
      display: block;
      margin-bottom: 5px;
    }

    .button-container {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.button-container2 {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

  .side-by-side-btn {
  margin-right: 30px;
}




   </style>

</head>

<body>
  <?php if (isset($_GET['success']) && $_GET['success'] === 'true') : ?>
<div id="success-message" style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">
  <strong>Data has been saved successfully.</strong>
</div>
<script>
  // Remove the success message after 5 seconds
  setTimeout(function() {
    var successMessage = document.getElementById('success-message');
    if (successMessage) {
      successMessage.remove();
    }
  }, 3000);
</script>
<?php endif; ?>

   <form>

      <div class="container text-center">
         <img src="Schweppes_truck2.jpeg">

         <h2> <b>SENDit Schweppes Delivery</b></h2>
      </div>
      <hr />
      <hr />

      <div class="button-container">
      <a href="createWtripA.html" class="side-by-side-btn" <span><input type="button" value="Create Warehouse Trip"></span></a>
      <br>

      <a href="viewWtrips.php" class="side-by-side-btn" <span><input type="button" value="View Warehouse Trips"></span></a>
      <br>
      </div>
    </div>
    <br>

    <div class="button-container">
      <a href="createTrip2A.html" class="side-by-side-btn" <span><input type="button" value="Create Employee Trip"></span></a>
      <br>

      <a href="viewTrips.php" class="side-by-side-btn" <span><input type="button" value="View Employee Trips"></span></a>
      <br>
      </div>
    </div>
    <br>    

    <div class="button-container">
      <a href="requestTripA.html" class="side-by-side-btn2" <span><input type="button" value="       Request Trip       "></span></a>
      <br>

      <a href="viewRtrips.php" class="side-by-side-btn2" <span><input type="button" value="         View Requests    "></span></a>
      <br>

      <!-- <a href="#" class="side-by-side-btn" <span><input type="button" value="Cancel Trip"></span></a> -->
      <br>
      </div>
    </div>
    <br>

      <!-- <div style="margin-left: 45px;">
      <a href="requestTrip.html" style="display: inline-block;"> <span><input type="button" value="Request for Trip"></span></a>
      </div>
      <hr> -->

      <a href="homepage1.php" <span><input type="button" value="Log Out"></span></a>
      <br>
      </div>

  <footer>
  <div class="contact-info">
    <h3>Contact Us</h3>
    <p>IT Help Desk,  Phone ext: 2058</p>
  </div>
</footer>

</body>
</html>