<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		updateRentals.php
Purpose:	Updates the database with the posted details of a rental
-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rental Confirm Screen</title>
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

$sql1 = "UPDATE company SET amountOwed = '$_POST[amountOwed]', totalRentals = totalRentals + 1 WHERE companyName = '$_POST[companyName]'";
$sql2 = "UPDATE car SET availableFlag = 1, cumulativeRentals = cumulativeRentals + 1 WHERE car.carId = '$_POST[carId]'";
$sql3 = "Insert into rental (companyId, carId, rentalDate, proposedReturnDate, cost) VALUES ('$_POST[companyId]','$_POST[carId]','$_POST[rentalDate]','$_POST[returnDate]','$_POST[cost]')";

if(! mysqli_query($con,$sql1))
{
    echo "Error" . mysqli_error($con);
}
else
{
    if(mysqli_affected_rows($con) != 0)
    {
        echo mysqli_affected_rows($con) . " record(s) updated on company table <br>";
    }
    else
    {
        echo "No records were changed";
    }
}

if(! mysqli_query($con,$sql2))
{
    echo "Error" . mysqli_error($con);
}
else
{
    if(mysqli_affected_rows($con) != 0)
    {
        echo mysqli_affected_rows($con) . " record(s) updated on car table <br>";
    }
    else
    {
        echo "No records were changed";
    }
}

if(! mysqli_query($con,$sql3))
{
    echo "Error" . mysqli_error($con);
}
else
{
    if(mysqli_affected_rows($con) != 0)
    {
        echo mysqli_affected_rows($con) . " record(s) updated on rental table <br>";
    }
    else
    {
        echo "No records were changed";
    }
}
mysqli_close($con);
			?>
			
				<div class="formStyling">
				<form action="rentals.html.php" method="post">
				<input type="submit" value="Return to previous screen"/>
				</form>
				</div>
				</div>
		</div>
		<div class="parallax-bottom"></div>
</body>
</html>