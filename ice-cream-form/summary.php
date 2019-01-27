<?php

    /*

      Author Name: Samantha Gabriel
      Date: November 15, 2018
      File Name: summary.php

      This is the order summary page for the Ice Cream Parlor's order form.

    */

    //Turn on error reporting
    //ini_set('display_errors', 1);
    //error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="ice-cream-form.css" />
    <title>Ice Cream Parlor</title>
</head>
<body>

    <h1>Ice Cream Orders</h1>

    <pre>

        <?php

            // Connect to database
            require '/home/sgabriel/db.php';

            // Display order summary
            // Define the SELECT query
            $display = "SELECT * from icecream";

            // Send query to database
            $summary = @mysqli_query($cnxn, $display);

            // Create HTML table to display order summary
            echo "<table><tr><th>Customer Name</th><th>Number of Scoops</th><th>Cone Type</th><th>Flavors</th></tr>";

            // Process rows
            while ($row = mysqli_fetch_assoc($summary)) {

                $first = $row['first_name'];
                $last = $row['last_name'];
                $custScoops = $row['num_scoops'];
                $custCone = $row['cone_type'];
                $custFlavors = $row['flavors'];

                echo "<tr><td>$first $last</td><td>$custScoops</td><td>$custCone</td><td>$custFlavors</td></tr>";
            }

            echo "</table>";
        ?>
    </pre>

    <!-- Link to home page -->
    <br><a href = "index.php">Back to the Home page</a>

</body>
</html>