

<?
   include("header.php");
   //include("menu.php");
  // include("dbconfig.inc.php");	
   include("dbCon.inc.php");	
   include("userfunction.php");


    // echo $_POST["txtName"];
			echo "<br/> txtName  :  ".$_POST["txtName"];
			echo "<br/> txtEmployeeID  :  ".$_POST["txtEmployeeID"];
			echo "<br/> txtDepartmentID : ".$_POST["txtDepartmentID"];
			echo "<br/> txtSectionId : ".$_POST["txtSectionId"];
			echo "<br/> txtUsername : ".$_POST["txtUsername"];
			echo "<br/> txtEmail : ".$_POST["txtEmail"];
			echo "<br/> txtTelephone : ".$_POST["txtTelephone"];
			echo "<br/> txtAssetTypeId : ".$_POST["txtAssetTypeID"];
			echo "<br/> txtProductItCode : ".$_POST["txtProductItCode"];
			echo "<br/> txtProductAssetCode : ".$_POST["txtProductAssetCode"];
			echo "<br/> txtLocationID : ".$_POST["txtLocationID"];
			echo "<br/> txtSubLocation : ".$_POST["txtSubLocationId"];
			echo "<br/> txtProductTypeID : ".$_POST["txtProductTypeID"];
			echo "<br/> txtServiceTypeID : ".$_POST["txtServiceTypeID"];
			echo "<br/> txtProblemDetail : ".$_POST["txtProblemDetail"];
		
	// function addNewRequest($name,$empId,$username,$mail,$telephone,$depId,$sectionId,$assetId,$proItCode,$proAssId,$problems,$locationId,$sublocationId,$proTypeId,$serviceId)
//	addNewRequest($_POST["txtName"],$_POST["txtEmployeeID"],$_POST["txtUsername"],$_POST["txtEmail"],$_POST["txtTelephone"],$_POST["txtDepartmentID"],$_POST["txtSectionId"],$_POST["txtAssetTypeID"],$_POST["txtProductItCode"],$_POST["txtProductAssetCode"],$_POST["txtProblemDetail"],$_POST["txtLocationID"],$_POST["txtSubLocationId"],$_POST["txtProductTypeID"],$_POST["txtServiceTypeID"]);
	//selectRequest();
	// printx();
	// sendMail();
//	 sendMail($_POST["txtName"],"USER  Department","User LOCATION");

?>