<?php

    /*

       Author Name: Samantha Gabriel
       Date: October 9, 2018
       Modified: November 15, 2018
       File Name: confirmation.php

       This is the confirmation page for Arendelle Ice Cream Parlor's order form.

       References:

       Shared ideas with Ellen

    */

    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require '/home/sgabriel/db.php';

    // Variable used in error checking
    $isValid = true;

    // Checks if a first name was entered
    $fname = $_POST['fname'];
    if(empty($fname)) {

        echo "<p>Please provide a first name.</p>";
        $isValid = false;
    }

    // Checks if a last name was entered
    $lname = $_POST['lname'];
    if(empty($lname)) {

        echo "<p>Please provide a last name.</p>";
        $isValid = false;
    }

    // Validates flavor choices
    // Array of valid flavors
    $validFlavors = array("vanilla", "chocolate", "strawberry", "mint", "cookie", "cake");
    // Error message if customer does not pick at least one flavor
    if (!isset($_POST['flavors'])) {

        echo "<p>Please pick at least one flavor.</p>";
        $isValid = false;
    }

    else {

        // Iterates through array of the customer flavor choices
        // Shared ideas with Ellen regarding how validate that the choice is an actual flavor from the form.
        foreach ($flavors = $_POST['flavors'] as $flavor) {

            // Error message if customer picks an invalid flavor
            if (!in_array($flavor, $validFlavors)) {

                echo "<p>Please pick a valid flavor.</p>";
                $isValid = false;
            }

            // Creates list of flavor choices if choices are valid.
            else if (isset($flavors)) {

                $flavors = $_POST['flavors'];
                $flavors = implode(", ", $flavors);
            }
        }
    }

    // Validates number of scoops
    $validScoops = array("none", "one", "two", "three");
    if (!isset($_POST['scoops']) ||
        !in_array($_POST['scoops'], $validScoops) ||
        $_POST['scoops'] == 'none') {

        echo "<p>Invalid number of scoops.</p>";
        $isValid = false;
    }

    else {

        $numScoops = $_POST['scoops'];
    }

    // Validates cone selection
    $validCone = array("sugar", "waffle", "regular", "bowl");
    if (!isset($_POST['cone']) || !in_array($_POST['cone'], $validCone)) {

        echo "<p>Invalid cone selection.</p>";
        $isValid = false;
    }

    else {

        $coneType = $_POST['cone'];
    }


    // if all input is valid
    if ($isValid) {

        // Escape the data
        $fname = mysqli_real_escape_string($cnxn, $fname);
        $lname = mysqli_real_escape_string($cnxn, $lname);
        $numScoops = mysqli_real_escape_string($cnxn, $numScoops);
        $coneType = mysqli_real_escape_string($cnxn, $coneType);
        $flavors = mysqli_real_escape_string($cnxn, $flavors);

        // Define the query
        $order = "INSERT INTO icecream (first_name, last_name, num_scoops, cone_type, flavors) 
                    VALUES ('$fname', '$lname', '$numScoops', '$coneType', '$flavors')";

        // Send query to database
        $result = @mysqli_query($cnxn, $order);

        // Error message if query fails
        if (!$result) {

            echo "<p> Error: " . mysqli_error($cnxn) . "</p>";
        }

        // Confirm that order has been sent
       echo "<p>You're all set! Thank you for your order!</p>";
    }

?>
