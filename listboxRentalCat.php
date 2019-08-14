<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		listboxRentalCat.php
Purpose:	Used to display the categories in a listbox
-->
<?php
include "db.inc.php"; //file needed to establish a connection to the database

//SQL needed to select the required details saved to a php variable
$sql = "SELECT rentalCategoryId, rentalCategory, standardCostPerDay, fiveDayDiscount, tenDayDiscount FROM rentalCategory
WHERE deletedFlag = 0";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database' . mysqli_error($con)); //Error checking for the connection and SQL
}
//Echo out a html listbox element used to display details of rental category
echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

//Saving the results of the returned sql array to php variables
while ($row = mysqli_fetch_array($result))
{
    $id = $row['rentalCategoryId'];
    $category = $row['rentalCategory'];
    $costpd = $row['standardCostPerDay'];
    $discount5 = $row['fiveDayDiscount'];
    $discount10 = $row['tenDayDiscount'];

    $allText = "$id/$category/$costpd/$discount5/$discount10";
    echo "<option value = '$allText'>$category</option>";
    
}

echo "</select>";
mysqli_close($con);

?>