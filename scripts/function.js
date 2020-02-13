
function  validateReqeust(form)
{
	if ( form.txtName.value == "")
	{
		alert ("Please fill in Name!");
		return false;
	}else if (form.txtEmployeeID.value =="")
	{
		alert ("Please fill in Employee ID / Passport ID !");
		return false;
	}else if (form.txtDepartmentID.value =="" || form.txtDepartmentID.value =="0"  )
	{
		alert ("Please fill in Department Choice!");
		return false;
	}else if (form.txtSectionId.value =="")
	{
		alert ("Please fill in Name!");
		return false;
	}else if (form.txtTelephone.value =="")
	{
		alert ("Please fill in Name!");
		return false;
	}else if (form.txtLocationID.value =="")
	{
		alert ("Please fill in Name!");
		return false;
	}else if (form.txtSubLocation.value =="")
	{
		alert ("Please fill in Name!");
		return false;
	}else if (form.txtProductTypeID.value =="")
	{
		alert ("Please fill in Name!");
		return false;
	}else if (form.txtServiceTypeID.value =="")
	{
		alert ("Please fill in Name!");
		return false;
	}
	
	return true;
}


