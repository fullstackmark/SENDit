<!DOCTYPE html>
<html lang="en" ng-app="Rescue System">

<head>
   <meta charset="utf-8">
   <!-- <meta http-equiv="refresh" content="8"> -->
   <meta http-equiv="X-UA-Compatible">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>SENDit Logged Trips</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">

<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }
        th {
            background-color: #f2f2f2;
            position: relative;
        }
        th.sorted-asc {
            background-color: orange;
            color: white;
        }
        th.sorted-desc {
            background-color: darkorange;
            color: white;
        }
        th::after {
            content: '';
            display: inline-block;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.5;
        }
        .asc::after {
            border-bottom: 6px solid blue;
        }
        .desc::after {
            border-top: 6px solid blue;
        }
        td:not(:last-child) {
            border-right: 3px double #ddd;
        }
        .dropdown-container {
            display: inline-block;
            margin-right: 10px;
        }

        body{
            background-image: url('schweppes_truck111.jpg');
            background-size: 200px;
            background-repeat: no-repeat;
            background-color: whites;
        }

    </style>

   <script>
        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchCount = 0;
            table = document.getElementById("myTable");
            switching = true;
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("TD")[columnIndex];
                    if (dir === "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir === "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchCount++;
                } else {
                    if (switchCount === 0 && dir === "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
            resetArrowIndicators();
            toggleArrowIndicator(columnIndex, dir);
            updateHeaderStyle(columnIndex, dir);
        }

        function resetArrowIndicators() {
            var headers = document.getElementsByTagName("TH");
            for (var i = 0; i < headers.length; i++) {
                headers[i].classList.remove("asc", "desc");
            }
        }

        function toggleArrowIndicator(columnIndex, dir) {
            var header = document.getElementsByTagName("TH")[columnIndex];
            if (dir === "asc") {
                header.classList.remove("desc");
                header.classList.add("asc");
            } else if (dir === "desc") {
                header.classList.remove("asc");
                header.classList.add("desc");
            }
        }

        function updateHeaderStyle(columnIndex, dir) {
            var headers = document.getElementsByTagName("TH");
            for (var i = 0; i < headers.length; i++) {
                headers[i].classList.remove("sorted-asc", "sorted-desc");
            }

            var header = headers[columnIndex];
            if (dir === "asc") {
                header.classList.add("sorted-asc");
            } else if (dir === "desc") {
                header.classList.add("sorted-desc");
            }
        }
     function filterByOriginAndDestination() {
    var originInput, destinationInput, originFilter, destinationFilter, table, tr, tdOrigin, tdDestination, i;
    originInput = document.getElementById("originSelect");
    destinationInput = document.getElementById("destinationSelect");
    originFilter = originInput.value.toUpperCase();
    destinationFilter = destinationInput.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    var noRecordsFound = true; // Flag to track if any matching records are found
    for (i = 0; i < tr.length; i++) {
        tdOrigin = tr[i].getElementsByTagName("td")[2]; // Index 2 corresponds to the Origin column
        tdDestination = tr[i].getElementsByTagName("td")[3]; // Index 3 corresponds to the Destination column
        if (tdOrigin && tdDestination) {
            if (tdOrigin.innerHTML.toUpperCase().indexOf(originFilter) > -1 && tdDestination.innerHTML.toUpperCase().indexOf(destinationFilter) > -1) {
                tr[i].style.display = "";
                noRecordsFound = false; // Matching record found, set the flag to false
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    if (noRecordsFound) {
        alert("No records found for the applied filter.");
        for (i = 0; i < tr.length; i++) {
            tr[i].style.display = ""; // Reset the display of all table rows
        }
    }
}
    </script>

</head>

<body>

    <h1><strong>WAREHOUSE TRIPS<strong></h1>
    <div class="container">
    <button onclick="goToPreviousPage()">Back</button>

    </div>
    <?php
    include 'db_connect.php';

    // Retrieve data from the travel table
    $sql = "SELECT * FROM wtrips";
    $result = mysqli_query($conn, $sql);

    // Check if there are any records
    if (mysqli_num_rows($result) > 0) {
       // Display the data in a table
        echo "<table id='myTable'>";
        echo "<tr>
                  <th onclick='sortTable(0)'>Name</th>
                  <th onclick='sortTable(1)'>Contact Number</th>
                  <th onclick='sortTable(2)'>Origin</th>
                  <th onclick='sortTable(3)'>Destination</th>
                  <th onclick='sortTable(4)'>Date of Travel</th>
                  <th onclick='sortTable(5)'>Space Available</th>
              </tr>";


        // Fetch and display each row of data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["ContactNumber"] . "</td>";
            echo "<td>" . $row["Origin"] . "</td>";
            echo "<td>" . $row["Destination"] . "</td>";
            echo "<td>" . $row["DateOfTravel"] . "</td>";
            echo "<td>" . $row["SpaceAvailable"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<h2><strong>No records found.</strong><h2>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    <br>
     <h2>Search for Trip</h2>
    <form>
        <div class="dropdown-container">
            <label for="originSelect">Origin:</label>
            <select id="originSelect">
                <option value="">All Origins</option>
                <option value="Harare">Harare</option>
                <option value="Bulawayo">Bulawayo</option>
                <option value="Gweru">Gweru</option>
                <option value="Masvingo">Masvingo</option>
                <option value="Victoria Falls">Victoria Falls</option>
                <option value="Bindura">Bindura</option>
                <option value="Mutare">Mutare</option>
                <option value="Chinhoyi">Chinhoyi</option>
                <option value="Showgrounds">Showgrounds</option>
            </select>
        </div>  

        <div class="dropdown-container">
            <label for="destinationSelect">Destination:</label>
            <select id="destinationSelect">
                <option value="">All Destinations</option>
                <option value="Harare">Harare</option>
                <option value="Bulawayo">Bulawayo</option>
                <option value="Gweru">Gweru</option>
                <option value="Masvingo">Masvingo</option>
                <option value="Chiredzi">Chiredzi</option>
                <option value="Bindura">Bindura</option>
                <option value="Mutare">Mutare</option>
                <option value="Chinhoyi">Chinhoyi</option>
                <option value="Showgrounds">Showgrounds</option>
            </select>
        </div>
        <br>
        <button type="button" onclick="filterByOriginAndDestination()">Filter</button>
    </form>

    <script>
  function goToPreviousPage() {
    window.history.back();
  }
</script>
</body>
</html>