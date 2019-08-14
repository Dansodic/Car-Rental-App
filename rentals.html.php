<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		rentals.html.php
Purpose:	Allows the user to rent an available car
-->
<!doctype HTML>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link rel='icon' href='wheelzlogo.png' type='image/x-icon'/ > <!-- Adds an icon image to the tab -->
 <title>Rentals</title>
</head>
<body>
<script>
//Used for populating the company detail fields on screen
function populate1()
{

	var sel = document.getElementById("listbox1");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var companyDetails = result.split('/');
	document.getElementById("companyName").value = companyDetails[0];
	document.getElementById("street").value = companyDetails[1];
	document.getElementById("town").value = companyDetails[2];
	document.getElementById("county").value = companyDetails[3];
	document.getElementById("amountOwed").value = companyDetails[4];
	document.getElementById("creditLimit").value = companyDetails[5];
	document.getElementById("companyId").value = companyDetails[6];
	document.getElementById("listbox2").disabled = false;
}

//Used for populating the available cars detail fields on screen
function populate2()
{
	var sel2 = document.getElementById("listbox2");
	var result;
	result = sel2.options[sel2.selectedIndex].value;
	var carDetails = result.split('/');
	document.getElementById("carId").value = carDetails[0];
	document.getElementById("modelName").value = carDetails[1];
	document.getElementById("version").value = carDetails[2];
	document.getElementById("engineSize").value = carDetails[3];
	document.getElementById("rentalCategory").value = carDetails[4];
	document.getElementById("noOfDoors").value = carDetails[5];
	document.getElementById("standardCostPerDay").value = carDetails[6];
	document.getElementById("fiveDayDiscount").value = carDetails[7];
	document.getElementById("tenDayDiscount").value = carDetails[8];
	document.getElementById("returnDate").disabled = false;
}


//Used for calculating cost automatically
function calcCost()
{
	//Calculate the number of days between rental date and return date.
	var returnDate = new Date(document.getElementById("returnDate").value);
	var currentDate = new Date();
	//Setting the number of miliseconds in a day
	var oneDay=1000*60*60*24;
	//Math.ceil() is used to get the smallest integer greater than or equal to a number.
	var numerOfDays = (Math.ceil((returnDate.getTime()-currentDate.getTime())/(oneDay)));

	//Category values
	var costPD = parseFloat(document.getElementById("standardCostPerDay").value);
	var discount5 = parseFloat(document.getElementById("fiveDayDiscount").value);
	var discount10 = parseFloat(document.getElementById("tenDayDiscount").value);
	discount5 = (discount5 / 100);
	discount5 = 1.00 - discount5;
	discount10 = (discount10 / 100);
	discount10 = 1.00 - discount10;

	//Calculate the total cost of rental//
	var rentalCost;
	if(numerOfDays >= 11)
		{
			var daysAtDiscount10 = numerOfDays - 10;
			rentalCost = (5 * costPD) + (5 * costPD * discount5) + (daysAtDiscount10 * costPD * discount10);
		}
		else if(numerOfDays >= 6 && numerOfDays <= 10)
		{
			var daysAtDiscount5 = numerOfDays - 5;
			rentalCost = (5 * costPD) + (daysAtDiscount5 * costPD * discount5);
		}
		else
		{
			rentalCost = (numerOfDays * costPD);
		}

		document.getElementById("cost").value = rentalCost ;
		document.getElementById("submit").disabled = false;

}

function confirmCheck() //Asks the user to confirm the details of the rental
						//Checks if the rental is valid before prompting the confirmation
{
	//Company Credit
	var compCredit = parseFloat(document.getElementById("creditLimit").value);
	var amountOwed = parseFloat(document.getElementById("amountOwed").value);
	var creditLeft;
	var rentalCost = parseFloat(document.getElementById("cost").value);
	if(amountOwed == 0.00 && rentalCost > compCredit)
	   {
		alert("Rental cost exceeds credit limit");
		  return false;
	   }

	if(compCredit <= 0.00)
	   {
		alert("This company does not yet have a credit limit. Can't proceed with rental");
		  return false;
	   }
	if(amountOwed == 0.00)
	   {
		creditLeft = compCredit;
	   }
	else
	{
		creditLeft = compCredit - amountOwed;
	}

	if(rentalCost > creditLeft)
	{
	   alert("Pay off balance owed first");
		return false;
	}

	//Calculate the number of days between rental date and return date.
	var returnDate = new Date(document.getElementById("returnDate").value);
	var currentDate = new Date();
	if(returnDate < currentDate)
	{
		alert("Return date can not be the present or past date");
		return false;
	}

	var response;
	response = confirm('Are you sure you want to proceed with this rental?');
	if (response)
	{	
		var cost = parseInt(document.getElementById("cost").value);
		document.getElementById("amountOwed").value = parseInt(document.getElementById("amountOwed").value) + cost;
		document.getElementById("amountOwed").disabled = false;
		document.getElementById("companyName").disabled = false;
		document.getElementById("carId").disabled = false;
		document.getElementById("rentalDate").disabled = false;
		document.getElementById("cost").disabled = false;
		document.getElementById("companyId").disabled = false;
		return true;
	 }
	else 
	 {
		return false;
	 }
}
</script> 
<?php include 'nav.html';?>
<div class="parallax">
	<div class="centered-text"><h1>Rentals</h1></div>
</div>

<div class="parrallax-container">
<div class="formStyling">
		
			<form action="updateRentals.php" onsubmit="return confirmCheck()" method="post">
				<fieldset>
				<br>
						<legend>Select Details To Make A Rental</legend>
						<label> Select A Company
						<?php include 'listboxRentals1.php'; ?>
						</label>
					
						<label> Company Name
						<input type="text" name="companyName" id="companyName"  disabled> 
						</label>

						<label> Street
						<input type="text" name="street" id="street" disabled >
						</label>

						<label> Town
						<input type="text" name="town" id="town" disabled>
						</label>

						<label> County
						<input type="text" name="county" id="county" disabled>
						</label>
					
						<label> Amount Owed
						<input type="number" name="amountOwed" id="amountOwed" disabled >
						</label>
					
						<label> Credit Limit
						<input type="number" name="creditLimit" id="creditLimit" disabled>
						</label>
					<br>
					
						<label> Select A Car
						<?php include 'listboxRentals2.php'; ?>
						</label>
					
						<label> Car ID
						<input type="text" name="carId" id="carId" disabled >
						</label>
					
						<label> Model Name
						<input type="text" name="modelName" id="modelName" disabled >
						</label>
					
						<label> Version
						<input type="text" name="version" id="version" disabled>
						</label>
					
						<label> Engine Size
						<input type="text" name="engineSize" id="engineSize" disabled>
						</label>
					
						<label> Rental Category
						<input type="text" name="rentalCategory" id="rentalCategory" disabled>
						</label>
					
						<label> Number of Doors
						<input type="number" name="noOfDoors" id="noOfDoors" disabled>
						</label>
					
						<label> Rental Date
						<input type="date" name="rentalDate" id="rentalDate" value = "<?php $date = new DateTime(); $today = $date->format('Y-m-d'); echo $today;?>" disabled>
						</label>
					
						<label> Proposed Return Date
						<input type="date" name="returnDate" id="returnDate" oninput="calcCost()" disabled onkeydown="return false" >
						</label>
					<br>
					
						<label> Cost
						<input type="number" name="cost" id="cost" disabled >
						</label>
					<!--Hidden fields are not displayed to the user. Used for storing values used in cost calculation -->
						<input type="hidden" name="standardCostPerDay" id="standardCostPerDay" disabled>
						<input type="hidden" name="fiveDayDiscount" id="fiveDayDiscount" disabled>
						<input type="hidden" name="tenDayDiscount" id="tenDayDiscount" disabled>
						<input type="hidden" name="companyId" id="companyId" disabled>

						<input id="submit" type="submit" value="Rent Car" disabled>  
				</fieldset>
			</form>		
			</div>
</div>

<div class="parallax-bottom"></div>

</body>
</html>