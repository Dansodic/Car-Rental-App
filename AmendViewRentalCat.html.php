<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		AmendViewRentalCat.html.php
Purpose:	To amend the details of a rental category
-->
<!doctype HTML>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link rel='icon' href='wheelzlogo.png' type='image/x-icon'/ >
 <title>Amend/View a Rental Category</title>
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
function toggleLock() //Used to enable and disable form fields based on button input
	{	
		if (document.getElementById("amendViewbutton").value == "Amend Details")
		{
			document.getElementById("costpd").disabled = false;
			document.getElementById("discount5").disabled = false;
			document.getElementById("discount10").disabled = false;
			document.getElementById("amendViewbutton").value = "View Details";
		}
		else
		{
			document.getElementById("costpd").disabled = true;
			document.getElementById("discount5").disabled = true;
			document.getElementById("discount10").disabled = true;
			document.getElementById("amendViewbutton").value = "Amend Details";
		}
	}

function confirmCheck() //Prompts the user to confirm the action and enables the relevent form fields to post them
	{
		var response;
		response = confirm('Are you sure you want to save these changes?');
			if (response)
			{	
				document.getElementById("catid").disabled = false;
				document.getElementById("cat").disabled = false;
				document.getElementById("costpd").disabled = false;
				document.getElementById("discount5").disabled = false;
				document.getElementById("discount10").disabled = false;
				return true;
			 }
			else 
			 {
				populate();
				toggleLock();
				return false;
			 }
	} 
</script> 
<?php include 'nav.html';?>
<div class="parallax">
	<div class="centered-text"><h1>Amend/View a Rental Category</h1></div>
</div>

<div class="parrallax-container">
<div class="formStyling">
			<input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
			<form action="AmendViewRentalCat.php" onsubmit="return confirmCheck()" method="post">
				<fieldset>
				<br>	
						<legend>Amend/View a Rental Category</legend>
						<label> Select Car Category
						<?php include 'listboxRentalCat.php'; ?>
						</label>
					
						<label> Rental Category ID
						<input type="text" name="catid" id="catid" disabled >
						</label>
					
						<label> Standard Cost per Day
						<input type="number" name="costpd" id="costpd" min=1 oninput="validity.valid||(value='');" title = "Please enter an int value" autocomplete="off" step=".01" required disabled>
						</label>

						<label> Five-Day Discount (%)
						<input type="number" name="discount5" id="discount5" min=0 max=100 oninput="validity.valid||(value='');" autocomplete="off" step=".01" required disabled>
						</label>

						<label> Ten-Day Discount (%)
						<input type="number" name="discount10" id="discount10" min=0 max=100 oninput="validity.valid||(value='');" autocomplete="off" step=".01" required disabled>
						</label>
					
					<input type="text" name="cat" id="cat" disabled hidden >

						<input type="submit" value="Save Changes">  
				</fieldset>
			</form>		
			</div>
</div>

<div class="parallax-bottom"></div>

</body>
</html>