<!--
Author:		Daniel Kenny 
Date:		March 2019
Name:		insertRentalCategory.html.php
Purpose:	Allows the user to enter details for a new rental category they wish to add
-->
<!doctype HTML>
<html>

<head>
 <link rel="stylesheet" type="text/css" href="mystyle.css">
 <link rel='icon' href='wheelzlogo.png' type='image/x-icon'/ >
 <title>Add A Rental Category</title>
</head>
<body>
<script>
function confirmSubmit() //Prompts the user to confirm befor submitting the details
	{
	  confirm("Confirm Addition of Rental Category");
	}
</script> 
<?php include 'nav.html';?>
<div class="parallax">
	<div class="centered-text"><h1>Add A Rental Category</h1></div>
</div>

<div class="parrallax-container">
<div class="formStyling">
		
			<form action="insertRentalCategory.php" method="post">
				<fieldset>
				<br>
						<legend>Enter Rental Category Details</legend>
						<label> Rental Category
						<input type="text" name="catid" id="catid" autofocus pattern="[A-Z]{1}" required placeholder = "A" title = "Please enter a single uppercase letter" autocomplete="off" required/>
						</label>
					
						<label> Standard Cost per Day
						<input type="number" name="daycost" id="daycost" min=1 oninput="validity.valid||(value='');" required placeholder = "&euro; 100" title = "Please enter an int value" autocomplete="off" step=".01" required/>
						</label>

						<label> Five-Day Discount (%)
						<input type=number name="discount5" id="discount5" min=0 max=100 oninput="validity.valid||(value='');" placeholder = "10%" autocomplete="off" step=".01" required/>
						</label>

						<label> Ten-Day Discount (%)
						<input type=number name="discount10" id="discount10" min=0 max=100 oninput="validity.valid||(value='');" placeholder = "15%" autocomplete="off" step=".01" required/>
						</label>

						<input type="submit" onclick="confirmSubmit()" value="Submit"/>
     					<input type="reset" value="Clear"/>   
				</fieldset>
			</form>		
			</div>
</div>

<div class="parallax-bottom"></div>

</body>
</html>