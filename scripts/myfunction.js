function getXMLHTTP() { //fuction to return the xml http object
			var xmlhttp=false;	
			try{
				xmlhttp=new XMLHttpRequest();
			}
			catch(e)	{		
				try{			
					xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e){
					try{
					xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
					}
					catch(e1){
						xmlhttp=false;
					}
				}
			}
				
			return xmlhttp;
		}
		
	function getState(stateid) {		
		
		var strURL="src/findLocation.php?state="+stateid;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}

	function getDepartment(departmentid) {		
		
		var strURL="src/findSection.php?department="+departmentid;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('departmentdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
		
	function getProductType() {		
		
		var strURL="src/findLocation.php";
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadyproductchange = function() {
				if (req.readyProduct == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}



function  validateReqeust(form)
{
		

	if ( form.txtName.value == "")
	{
		alert ("Please fill in Name!");
		form.txtName.focus();
		return false;
	}if (form.txtEmployeeID.value =="")
	{
		alert ("Please fill in Employee ID / Passport ID !");
		form.txtEmployeeID.focus();
		return false;
	}if (form.txtDepartmentID.value =="" || form.txtDepartmentID.value =="0" )
	{
		alert ("Please fill in Department Choice!");
		return false;
	}
	/*
	if (form.txtSectionId.value =="" || form.txtSectionId.value =="0")
	{
		alert ("Please fill in Section Choice!!");
		return false;
	}
	*/
	if (form.txtTelephone.value =="")
	{
		alert ("Please fill in Telephone or Contact No.!");
		form.txtTelephone.focus();
		return false;
	}if (form.txtLocationID.value =="" || form.txtLocationID.value=="0")
	{
		alert ("Please fill in Location!");
		form.txtLocationID.focus();
		return false;
	}
	if (form.txtProductTypeID.value == "0")
	{
		alert ("Please fill in Product Type!");
		return false;
	}
	if (form.txtServiceTypeID.value == "0")
	{
		alert ("Please fill in Service Type!");
		return false;
	}

	//if (form.txtSubLocation.value =="" || form.txtSubLocation.value =="0")
	if(form.txtSubLocation.value =="0")
	{
		alert ("Please fill in SUB-Location!");
		form.txtServiceTypeID.focus();
		return false;
	}
	if (form.txtProductTypeID.value == "0" || form.txtProductionTypeID.value== "0")
	{
		alert ("Please fill in Product Type!");
		//txtProductTypeID.value.focus();
		return false;
	}
	if (form.txtProblemDetail.value.trim()=="")
	{
		alert ("Please fill in You'r Problem!");
		form.txtProblemDetail.focus();
		return false;
	}
	//alert ("xxx");
	//alert (form.txtProductTypeID.value);
	return true;
}


function test(form)
{

 alert (xxxx);
}
