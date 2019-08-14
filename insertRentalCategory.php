<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		insertRentalCategory.php
Purpose:	Updates the database with the details posted for a new rental category
-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Category Confirm Screen</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<link rel='icon' href='wheelzlogo.png' type='image/x-icon'/ >
</head>

<body>
<?php include 'nav.html';?>
<div class="parallax">
	<div class="centered-text"><h1></h1></div>
</div>

<div class="parrallax-container">
			<div class="phpreply">
			<?php
include 'db.inc.php'; //file needed to establish a connection to the database
date_default_timezone_set("UTC");
echo "The details of the new Rental Category are: <br>";
//Echo out the posted details for the user
echo "Rental Category ID is " . $_POST['catid'] . "<br>";
echo "Standard Cost per Day is " . $_POST['daycost'] . "<br>";
echo "Five-Day Discount is " . $_POST['discount5'] . "<br>";
echo "Ten-Day Discount is " . $_POST['discount10'] . "<br>";

//SQL needed to add a new rental category saved to a php variable
$sql = "Insert into rentalCategory (rentalCategory, standardCostPerDay, fiveDayDiscount, tenDayDiscount)
VALUES ('$_POST[catid]','$_POST[daycost]','$_POST[discount5]','$_POST[discount10]')";

if(!mysqli_query ($con,$sql))
    {
        die ("An error occured with the sql query " . mysqli_error($con)); //Error checking for the connection and SQL
    }

echo "<br> A record has been added for Category " . $_POST['catid'] . ".";

mysqli_close($con);
			?>
			
				<div class="formStyling">
				<form action="insertRentalCategory.html.php" method="post">
				<input type="submit" value="Return to previous screen"/>
				</form>
				</div>
				</div>
		</div>
		<div class="parallax-bottom"></div>
</body>
</html>