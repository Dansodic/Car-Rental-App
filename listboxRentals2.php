<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		listboxRentals2.php
Purpose:	Display the available cars in a listbox
-->
<?php
include "db.inc.php"; //file needed to establish a connection to the database

//SQL needed to select the required details saved to a php variable
$sql2 = "SELECT car.carId, carType.modelName, carType.version, carType.engineSize, carType.rentalCategory, car.noOfDoors, car.availableFlag, rentalCategory.rentalCategory, rentalCategory.standardCostPerDay, rentalCategory.fiveDayDiscount, rentalCategory.tenDayDiscount FROM carType INNER JOIN car ON carType.carTypeId = car.carTypeId INNER JOIN rentalCategory ON rentalCategory.rentalCategory = carType.rentalCategory WHERE car.availableFlag = 0 AND rentalCategory.deletedFlag =0";


if (!$result2 = mysqli_query($con, $sql2))
{
    die('Error in querying the database' . mysqli_error($con)); //Error checking for the connection and SQL
}
//Echo out a html listbox element used to display details of rental category
echo "<br><select disabled name = 'listbox2' id = 'listbox2' onclick = 'populate2(); calcCost(); '>";

//Saving the results of the returned sql array to php variables
while ($row2 = mysqli_fetch_array($result2))
{
    $carId = $row2['carId'];
    $modelName = $row2['modelName'];
    $version = $row2['version'];
    $engineSize = $row2['engineSize'];
    $rentalCategory = $row2['rentalCategory'];
    $noOfDoors = $row2['noOfDoors'];
    $standardCostPerDay = $row2['standardCostPerDay'];
    $fiveDayDiscount = $row2['fiveDayDiscount'];
    $tenDayDiscount = $row2['tenDayDiscount'];

    $allText2 = "$carId/$modelName/$version/$engineSize/$rentalCategory/$noOfDoors/$standardCostPerDay/$fiveDayDiscount/$tenDayDiscount/";
    echo "<option value = '$allText2'>$modelName</option>";
    
}

echo "</select>";
mysqli_close($con);

?>