<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		listboxRentals1.php
Purpose:	Displays the companies that have not been deleted or blacklisted in a listbox
-->
<?php
//Include the php file required to connect to the database
include "db.inc.php";

//sql query required in order to get the details of any company that has not been flaged as deleted. sql is put in a php variable
$sql1 = "SELECT companyName, street, town, county, amountOwed, creditLimit, companyId FROM company
WHERE blacklistFlag = 0 AND deletedFlag = 0";

//check to see if we can connect to the database and if the sql is valid. If either fail, return an error
if (!$result1 = mysqli_query($con, $sql1))
{
    die('Error in querying the database for company' . mysqli_error($con));
}

//echo html code for a select element to the page. This is where we will populate the company
//details upon calling a javascript function using onclick
echo "<br><select name = 'listbox1' id = 'listbox1' onclick = 'populate1(); calcCost();'>";

//use while loop to assign the resluting information to php variables
while ($row = mysqli_fetch_array($result1))
{
    $compName = $row['companyName'];
    $street = $row['street'];
    $town = $row['town'];
    $county = $row['county'];
    $owed = $row['amountOwed'];
    $creditLimit = $row['creditLimit'];
	$companyId = $row['companyId'];
	
	//all variable details are now stored in a single variable called alltext
    $allText = "$compName/$street/$town/$county/$owed/$creditLimit/$companyId/";
    echo "<option value = '$allText'>$compName</option>";
    
}

echo "</select>";
//close the connection to the database when finished
mysqli_close($con);

?>