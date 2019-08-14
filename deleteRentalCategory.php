<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		deleteRentalCategory.php
Purpose:	Updates the database to reflect a deleted category
-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Category Confirm</title>
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

//The SQL used to delete a category saved to a php variable
$sql = "UPDATE rentalCategory SET deletedFlag = 1 WHERE rentalCategoryId = '$_POST[catid]'";

if(! mysqli_query($con,$sql))
{
    echo "Error" . mysqli_error($con); //Error checking for the connection and SQL
}
else
{
    if(mysqli_affected_rows($con) != 0)
    {
		//Informs the user that the update was successful
        echo mysqli_affected_rows($con) . " record(s) updated <br>";
        echo "Rental Category " . $_POST['catid'].", ".$_POST['cat']. " has been deleted";
    }
    else
    {
        echo "No records were changed";
    }
}
mysqli_close($con);
			?>
			
				<div class="formStyling">
				<form action="deleteRentalCategory.html.php" method="post">
				<input type="submit" value="Return to previous screen"/>
				</form>
				</div>
				</div>
		</div>
		<div class="parallax-bottom"></div>
</body>
</html>