<?php
// Start the session
session_start();
?>
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

   <script>
  // JavaScript code to display a notification message when data successfully posted to Database

   function clearErrorMessage() {
            var errorMessage = document.getElementById('error-message');
            errorMessage.style.display = 'none';
        }

   </script>

   <style>
      body {
         max-width: 500px;
         background-image: image("C:\xampp\htdocs\SENDit\Schweppes_truck2.jpeg");
         background-color: rgb(245, 242, 237);
         margin: 0 auto;
         max-height: 200px;
      }
       .hidden {
      display: none;
    }
      #userForm label, #userForm input {
      display: block;
      margin-bottom: 5px;
    }

       .dragged-page {
     height: 100%;
     transition: transform 0.5s ease-in-out;
   }

   .page-dragged {
     transform: translateY(-30%);
   }
   </style>

</head>

<body onload="displayErrorMessage()">

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
         <img src="Schweppes_truck21.jpg" width="325" height="325">

         <h2> <b>SENDit Schweppes Delivery</b></h2>
      </div>
      <hr />
      <hr />

      <div id="ad">
         <a href="createTrip2.html" <h2 id="bt"><input type="button" value="Create Employee Trip">
            </h2>
         </a>
         
      </div>

      <a href="viewWtrips.php" <span><input type="button" value="View Warehouse Trips"></span></a>
      
      </div>

      <a href="requestTrip.html" <span><input type="button" value="Request for Trip"></span></a>
      </div>

      <!-- <a href="#" <span><input type="button" value="Admin Login"></span></a> -->
      <hr>
      </div>

      </div>
   <!-- <button id="Admin Login">Admin Login</button> -->
   </form>

  <button id="showFormButton" onclick="dragPage()">Admin Login</button>

  <form id="userForm" class="hidden" method="POST" action="login.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" oninput="clearErrorMessage()" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" oninput="clearErrorMessage()" required>
    <input type="submit" value="Login">
  </form>
<?php
    if (isset($_GET["error"]) && $_GET["error"] == 1) {
        echo '<p id="error-message"><strong style="color: red; font-size:18px;">Invalid username or password.</strong></p>';
    }
    ?>

  <script>
    document.getElementById('showFormButton').addEventListener('click', function() {
      document.getElementById('userForm').classList.remove('hidden');
    });

    function dragPage() {
  var pageElement = document.getElementsByTagName("html")[0];
  pageElement.classList.add("dragged-page");
  setTimeout(function() {
    pageElement.classList.add("page-dragged");
  }, 100);
  //adding clearErrorMessage function to remove error when Admin login button clicked
  clearErrorMessage();
}
  </script>
  <footer>
  <div class="contact-info">
    <h3>Contact Us</h3>
    <p>IT Help Desk,  Phone ext: 2058</p>
  </div>
</footer>

</body>
</html>