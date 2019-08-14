<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		deleteRentalCategorylistbox.php
Purpose:	Creates a listbox of the details returned from the sql query
-->
<?php
include "db.inc.php"; //file needed to establish a connection to the database

//The SQL querry needed to get the details saved to a php variable
$sql = "SELECT rentalCategoryId, rentalCategory, standardCostPerDay, fiveDayDiscount, tenDayDiscount FROM rentalCategory
WHERE deletedFlag = 0";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database' . mysqli_error($con)); //Error checking for the connection and SQL
}

//Echos out a html listbox element that will be populated with details from the sql
echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

//Saving the results of array returned by the sql to php variables
while ($row = mysqli_fetch_array($result))
{
    $id = $row['rentalCategoryId'];
    $category = $row['rentalCategory'];
    $costpd = $row['standardCostPerDay'];
    $discount5 = $row['fiveDayDiscount'];
    $discount10 = $row['tenDayDiscount'];

    $allText = "$id/$category/$costpd/$discount5/$discount10";
    echo "<option value = '$allText'>$category</option>";//Echo out a html option element with details saved from the array
    
}
echo "</select>";
mysqli_close($con);
?>