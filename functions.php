

<?


// Connect to DABASE
$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("itservices");

	  mysql_query("SET character_set_results=utf8");
      mysql_query("SET character_set_client='utf8'");
      mysql_query("SET character_set_connection='utf8'");
      mysql_query("collation_connection = utf8_unicode_ci");
      mysql_query("collation_database = utf8_unicode_ci");
      mysql_query("collation_server = utf8_unicode_ci");

/**  CHECK CONDITION  INSERT UPDATE DATA 
     INTO DATABASE
**/

if ($_POST["txtID"] == "" || $_POST["txtID"] == null )
{
	echo " INSERT  into DATABASE";
	/**
		INSERT  DATA INTO DATEBASE
	**/

	$strSQL = "INSERT INTO userrequest ";
	$strSQL .="(Name,EMPLOYEEID,USERNAME,EMAIL,TELEPHONE,DEPARTMENT_ID,PRODUCT_ITCODE,PRODUCT_ASSETCODE,Problem_detail,LOCATION_ID,Product_Type_ID,Service_Type_ID,JOB_STATUS,REQ_DATETIME) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["txtName"]."','".$_POST["txtEmployeeID"]."' ";
	$strSQL .=",'".$_POST["txtUsername"]."' ,'".$_POST["txtEmail"]."' ";
	$strSQL .=",'".$_POST["txtTelephone"]."' ,'".$_POST["txtDepartmentID"]."' ";
	$strSQL .=",'".$_POST["txtProductItCode"]."' ,'".$_POST["txtProductAssetCode"]."' ";
	$strSQL .=",'".$_POST["txtProblemDetail"]."' ,'".$_POST["txtLocationID"]."' ";
	$strSQL .=",'".$_POST["txtProductTypeID"]."' ";
	$strSQL .=",'".$_POST["txtServiceTypeID"]."','1',now()) ";


}
else
{
	echo " UPDATE  into DATABASE";
	/**
		UPDATE  DATA INTO DATEBASE
	**/

	$strSQL = "UPDATE  userrequest  SET ";
	//$strSQL .="(Name,EMPLOYEEID,USERNAME,EMAIL,TELEPHONE,DEPARTMENT_ID,SECTION_ID,PRODUCT_ITCODE,PRODUCT_ASSETCODE,Problem_detail,LOCATION_ID,Product_Type_ID,Service_Type_ID,JOB_STATUS,SOLVE_DATETIME) ";
	//$strSQL .="VALUES ";
	$strSQL .="NAME = '".$_POST["txtName"]."', EMPLOYEEID = '".$_POST["txtEmployeeID"]."' ";
	$strSQL .=", USERNAME = '".$_POST["txtUsername"]."' , EMAIL = '".$_POST["txtEmail"]."' ";
	$strSQL .=",TELEPHONE = '".$_POST["txtTelephone"]."' , DEPARTMENT_ID = '".$_POST["txtDepartmentID"]."' ";
	$strSQL .=",SECTION_ID = '".$_POST["txtSectionId"]."' , ASSET_TYPE = '".$_POST["txtAssetType"]."' ";
	$strSQL .=", PRODUCT_ITCODE = '".$_POST["txtProductItCode"]."' , PRODUCT_ASSETCODE = '".$_POST["txtProductAssetCode"]."' ";
	$strSQL .=", Problem_detail = '".$_POST["txtProblemDetail"]."' , Solve_Detail = '".$_POST["txtSolveProblemDetail"]."' ";
	$strSQL .=", LOCATION_ID = '".$_POST["txtLocationID"]."' , SUBLOCATION_ID = '".$_POST["txtSubLocationId"]."' ";
	$strSQL .=", Product_Type_ID = '".$_POST["txtProductTypeID"]."' , Service_Type_ID = '".$_POST["txtServiceTypeID"]."' ";
	$strSQL .=", JOB_STATUS = '".$_POST["txtJobStatus"]."' , SOLVE_DATETIME =  now()  ";
	
	//$strSQL .=", Solve_Detail = '".$_POST["txtSolveProblemDetail"]."' , Product_Type_ID = '".$_POST["txtProductTypeID"]."' ";
	//$strSQL .=",'".$_POST["txtProductTypeID"]."' ";
	//$strSQL .=", Service_Type_ID = '".$_POST["txtServiceTypeID"]."',JOB_STATUS = '1', SOLVE_DATETIME = now() ";
	$strSQL .=" WHERE ID = ".$_POST["txtID"];
	
	//echo $strSQL;

}

	/**
		EXECUTE  DATABASE 
	**/


	$objQuery = mysql_query($strSQL);
//	echo "xxxxx<br/>".$strSQL;

	if(!$objQuery)
	{
		echo "<br/> Save Done.";
	}
	else
	{
		echo "<br/>Error Save [".mysql_error()."]";
	}



	//redirect to another Page
//echo "<meta http-equiv=refresh content=1;url=requestShow.php>";
	//header('Location: $_SERVER["requestlist.php"]');
	//header("location:$_SERVER[PHP_SELF]");
	//exit();


mysql_close($objConnect);
?>
