<html>
<head>
<script>
function greeting(form)
{
	
	//	alert("Welcome " + document.forms["frm1"]["fname"].value + "!")
			if ( form.fname.value == "")

	{
		alert ('You didn\'t choose any of the checkboxes!');
		return false;
	} else { 
		alert("Welcome " + document.forms["frm1"]["fname"].value + "!")
		alert ("Go to Next Page");
		return true;
	}
	
}
</script>
</head>
<body>

What is your name?<br>
<form name="frm1" action="request.php" method="post" onsubmit="return greeting(this);">
<input type="text" name="fname">
<input type="text" name="lname">
<input type="submit" value="Submit">
</form>

</body>
</html> 