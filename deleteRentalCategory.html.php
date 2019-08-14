<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		deleteRentalCategory.html.php
Purpose:	Allows the user to delete a rental category
-->
<!doctype HTML>
<html>

<head>
 <link rel="stylesheet" type="text/css" href="mystyle.css">
 <link rel='icon' href='wheelzlogo.png' type='image/x-icon'/ >
 <title>Delete a Rental Category</title>
</head>
<body>
<script>
function populate() //Used to populate a listbox with the categories and fill a form with the details based on the selection
{
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var catDetails = result.split('/');
	document.getElementById("catid").value = catDetails[0];
	document.getElementById("cat").value = catDetails[1];
	document.getElementById("costpd").value = catDetails[2];
	document.getElementById("discount5").value = catDetails[3];
	document.getElementById("discount10").value = catDetails[4];
}


function confirmCheck() //Prompts the user to confirm the action and enables the relevent form fields to post them
{
	var response;
	response = confirm('Are you sure you want to delete this category?');
	if (response)
		{	document.getElementById("cat").disabled = false;
			document.getElementById("catid").disabled = false;

			return true;
		 }
		else 
		 {
			return false;
		 }
}

/*function confirmSubmit() {
  confirm("Confirm that you want to delete this category");
} */
	</script> 
<?php include 'nav.html';?>
<div class="parallax">
	<div class="centered-text"><h1>Delete A Category</h1></div>
</div>

<div class="parrallax-container">
<div class="formStyling">
		
			<form action="deleteRentalCategory.php" method="post">
				<fieldset>
				<br>
						<legend>Select A Category To View Details Before Deletion</legend>
						<label> Select Car Category
						<?php include 'deleteRentalCategorylistbox.php'; ?>
						</label>
					
						<label> Rental Category ID
						<input type="text" name="catid" id="catid" disabled >
						</label>

						<label for="costpd">Standard Cost per Day</label>
						<input type="number" name="costpd" id="costpd" disabled>

						<label> Five-Day Discount(%)
						<input type="number" name="discount5" id="discount5" disabled>
						</label>

						<label> Ten-Day Discount(%)
						<input type="number" name="discount10" id="discount10" disabled>
						</label>
					
						
						<input type="text" name="cat" id="cat" disabled hidden >
						

						<input id= "submit" type="submit" onclick="return confirmCheck()" value="Delete Category">  
				</fieldset>
			</form>		
			</div>
</div>

<div class="parallax-bottom"></div>

</body>
</html>