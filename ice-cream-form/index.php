<?php

//Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--

       Author Name: Samantha Gabriel
       Date: October 9, 2018
       Modified: November 15, 2018
       File Name: index.php

       This is the Ice Cream Parlor order form.

       References:

       https://stackoverflow.com/questions/19287767/making-my-drop-downs-sticky
       https://stackoverflow.com/questions/26935072/cannot-make-radio-buttons-sticky
       https://stackoverflow.com/questions/2488960/how-to-remember-checkbox-input-in-php-forms

    -->
    <meta charset="UTF-8">
    <title>Ice Cream Parlor</title>
    <link rel="stylesheet" href="ice-cream-form.css" />
</head>
<body>

    <div id="home">
    <h1>Welcome to the Ice Cream Parlor!</h1>

    <?php
    //Initialize variables
    $fname = "";
    $lname = "";
    $numScoops = "";

    //If form is submitted, process the data
    if (!empty($_POST)) {
        require('confirmation.php');
    }

    ?>

    <form method="post" action="">

        <!-- Customer name -->
        <fieldset>
            <legend>Contact Info</legend>
            <label>First Name:&nbsp;
                <input type="text" size="20" maxlength="20"
                       name="fname" id="fname" value="<?php echo $fname; ?>">
            </label><br>
            <label>Last Name:&nbsp;
                <input type="text" size="20" maxlength="20"
                       name="lname" id="lname" value="<?php echo $lname; ?>">
            </label><br><br>
        </fieldset>

        <!-- Number of scoops -->
        <fieldset>
            <legend>Number of Scoops</legend>
            <!-- Referred to stackoverflow regarding how to make drop down lists sticky -->
            <select name="scoops" id="scoops">
                <option <?php if ($numScoops == "none") echo "selected = 'selected'"; ?> value="none">Select a number</option>
                <option <?php if ($numScoops == "one") echo "selected = 'selected'"; ?> value="one">1 scoop</option>
                <option <?php if ($numScoops == "two") echo "selected = 'selected'"; ?> value="two">2 scoops</option>
                <option <?php if ($numScoops == "three") echo "selected = 'selected'"; ?> value="three">3 scoops</option>
            </select>
        </fieldset>

        <!-- Type of cone -->
        <fieldset>
            <legend>Type of Cone</legend>
                <!-- Referred to stackoverflow regarding how to make radio buttons sticky -->
                <label><input <?php if (isset($_POST['cone']) && $_POST['cone'] == "sugar") echo "checked"; ?>
                       type="radio" value="sugar" name="cone" id="cone1">&nbsp;Sugar Cone<br></label>
                <label><input <?php if (isset($_POST['cone']) && $_POST['cone'] == "waffle") echo "checked"; ?>
                       type="radio" value="waffle" name="cone" id="cone2"> Waffle Cone<br></label>
                <label><input <?php if (isset($_POST['cone']) && $_POST['cone'] == "regular") echo "checked"; ?>
                       type="radio" value="regular" name="cone" id="cone3">&nbsp;Regular Cone<br></label>
                <label><input <?php if (isset($_POST['cone']) && $_POST['cone'] == "bowl") echo "checked"; ?>
                       type="radio" value="bowl" name="cone" id="cone4">&nbsp;Bowl<br></label>
        </fieldset>

        <!-- Preferred flavor(s) -->
        <fieldset>
            <legend>Pick One or More Flavors</legend>
            <!-- Referred to stackoverflow regarding how to make multiple checkboxes sticky -->
            <label>
                <input <?php echo (isset($_POST['flavors']) && in_array("vanilla", $_POST['flavors'])) ? "checked = 'checked'" : ''; ?>
                    type="checkbox" value="vanilla" name="flavors[]">&nbsp;Vanilla
            </label><br>
            <label>
                <input <?php echo (isset($_POST['flavors']) && in_array("chocolate", $_POST['flavors'])) ? "checked = 'checked'" : ''; ?>
                    type="checkbox" value="chocolate" name="flavors[]">&nbsp;Chocolate
            </label><br>
            <label>
                <input <?php echo (isset($_POST['flavors']) && in_array("strawberry", $_POST['flavors'])) ? "checked = 'checked'" : ''; ?>
                    type="checkbox" value="strawberry" name="flavors[]">&nbsp;Strawberry
            </label><br>
            <label>
                <input <?php echo (isset($_POST['flavors']) && in_array("mint", $_POST['flavors'])) ? "checked = 'checked'" : ''; ?>
                    type="checkbox" value="mint" name="flavors[]">&nbsp;Mint Chocolate Chip
            </label><br>
            <label>
                <input <?php echo (isset($_POST['flavors']) && in_array("cookie", $_POST['flavors'])) ? "checked = 'checked'" : ''; ?>
                    type="checkbox" value="cookie" name="flavors[]">&nbsp;Cookie Dough
            </label><br>
            <label>
                <input <?php echo (isset($_POST['flavors']) && in_array("cake", $_POST['flavors'])) ? "checked = 'checked'" : ''; ?>
                    type="checkbox" value="cake" name="flavors[]">&nbsp;Cake Batter
            </label><br>
        </fieldset>

        <!-- Submit order -->
        <input type="submit" value="Order">
    </form>

    <!-- Link to order summary page -->
    <br><a href = "summary.php">Ice Cream Orders</a>
    </div>

</body>
</html>