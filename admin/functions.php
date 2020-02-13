<?
	/* ##########################################
				TROBLESHOOT  Management
	   ##########################################  */

	   function mm()
	   {
	    echo "xxxxxxxxxxxxxxxxxxx";
	   }


	function updateUserRequest($id,$name,$employeeId,$username,$mail,$telephone,$departmentId,$sectionId,$assetId,$productItCode,$productAssetCode,$problemDetail,$solveDetail,$locationId,$sublocationId,$productTypeId,$serviceTypeId,$jobStatus)
	{
		 mysql_query("SET character_set_results=utf8");
		 mysql_query("SET character_set_client='utf8'");
         mysql_query("SET character_set_connection='utf8'");
         mysql_query("collation_connection = utf8_unicode_ci");
         mysql_query("collation_database = utf8_unicode_ci");
         mysql_query("collation_server = utf8_unicode_ci");

		$strSQL = "UPDATE  userrequest  SET ";
		$strSQL .="NAME = '".$name."', EMPLOYEEID = '".$employeeId."' ";
		$strSQL .=", USERNAME = '".trim($username)."' , EMAIL = '".$mail."' ";
		$strSQL .=",TELEPHONE = '".$telephone."' , DEPARTMENT_ID = '".$departmentId."' ";
		$strSQL .=",SECTION_ID = '".$sectionId."' , ASSET_TYPE = '".$assetId."' ";
		$strSQL .=", PRODUCT_ITCODE = '".$productItCode."' , PRODUCT_ASSETCODE = '".$productAssetCode."' ";
		$strSQL .=", Problem_detail = '".trim($problemDetail)."' , Solve_Detail = '".trim($solveDetail)."' ";
		$strSQL .=", LOCATION_ID = '".$locationId."' , SUBLOCATION_ID = '".$sublocationId."' ";
		$strSQL .=", Product_Type_ID = '".$productTypeId."' , Service_Type_ID = '".$serviceTypeId."' ";
		$strSQL .=", JOB_STATUS = '".$jobStatus."' , SOLVE_DATETIME =  now()  ";
	
	
		$strSQL .=" WHERE ID = ".$id;
		//echo "<br/> ".$strSQL;
		$objQuery = mysql_query($strSQL);
	
	}



    /* ##########################################
				SYSTEM  MANAGEMENT
	   ##########################################  */

	function addProduct($name,$description)
	{
		 mysql_query("SET character_set_results=utf8");
		 mysql_query("SET character_set_client='utf8'");
         mysql_query("SET character_set_connection='utf8'");
         mysql_query("collation_connection = utf8_unicode_ci");
         mysql_query("collation_database = utf8_unicode_ci");
         mysql_query("collation_server = utf8_unicode_ci");


		$strSQL = "INSERT INTO product_type ";
		$strSQL .="(Product_Type_Name,DESCRIPTION) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$name."','".$description."') ";
		//echo "<br/>".$strSQL."<br/>";
		$objQuery = mysql_query($strSQL);
	/*	if(!$objQuery)
		{
			echo "Error Update [".mysql_error()."]";
		}
		*/
	}

	
	function updateProduct($id,$name,$description)
	{
		 mysql_query("SET character_set_results=utf8");
		 mysql_query("SET character_set_client='utf8'");
         mysql_query("SET character_set_connection='utf8'");
         mysql_query("collation_connection = utf8_unicode_ci");
         mysql_query("collation_database = utf8_unicode_ci");
         mysql_query("collation_server = utf8_unicode_ci");


		$strSQL = "UPDATE product_type SET  ";
		$strSQL .=" Product_Type_Name ='".$name."' , ";
		$strSQL .=" DESCRIPTION =  '".$description."' ";
		$strSQL .=" WHERE  Product_Type_ID ='".$id."' ";	
		//echo "<br/>".$strSQL."<br/>";
		
		$objQuery = mysql_query($strSQL);		
	}
	


		function addService($name,$description)
	{
		 mysql_query("SET character_set_results=utf8");
		 mysql_query("SET character_set_client='utf8'");
         mysql_query("SET character_set_connection='utf8'");
         mysql_query("collation_connection = utf8_unicode_ci");
         mysql_query("collation_database = utf8_unicode_ci");
         mysql_query("collation_server = utf8_unicode_ci");


		$strSQL = "INSERT INTO services_type ";
		$strSQL .="(SERVICE_Type_Name,DESCRIPTION) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$name."','".$description."') ";
		//echo "<br/>".$strSQL."<br/>";
		$objQuery = mysql_query($strSQL);

	}

	
	
	function updateService($id,$name,$description)
	{
		 mysql_query("SET character_set_results=utf8");
		 mysql_query("SET character_set_client='utf8'");
         mysql_query("SET character_set_connection='utf8'");
         mysql_query("collation_connection = utf8_unicode_ci");
         mysql_query("collation_database = utf8_unicode_ci");
         mysql_query("collation_server = utf8_unicode_ci");


		$strSQL = "UPDATE services_type SET  ";
		$strSQL .=" Service_Type_Name ='".$name."' , ";
		$strSQL .=" DESCRIPTION =  '".$description."' ";
		$strSQL .=" WHERE  Service_Type_ID ='".$id."' ";	
		//echo "<br/>".$strSQL."<br/>";
		
		$objQuery = mysql_query($strSQL);		
	}


	
	function addLocation($name,$description)
	{
		/* 
		 mysql_query("SET character_set_results=utf8");
		 mysql_query("SET character_set_client='utf8'");
         mysql_query("SET character_set_connection='utf8'");
         mysql_query("collation_connection = utf8_unicode_ci");
         mysql_query("collation_database = utf8_unicode_ci");
         mysql_query("collation_server = utf8_unicode_ci");
		 */


		$strSQL = "INSERT INTO location ";
		$strSQL .="(LOCATION_NAME,DESCRIPTION) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$name."','".$description."') ";
		//echo "<br/>".$strSQL."<br/>";
					mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);
	/*	if(!$objQuery)
		{
			echo "Error Update [".mysql_error()."]";
		}
		*/
	}

	
	function updateLocation($id,$name,$description)
	{
		/*
		 mysql_query("SET character_set_results=utf8");
		 mysql_query("SET character_set_client='utf8'");
         mysql_query("SET character_set_connection='utf8'");
         mysql_query("collation_connection = utf8_unicode_ci");
         mysql_query("collation_database = utf8_unicode_ci");
         mysql_query("collation_server = utf8_unicode_ci");
		*/

		$strSQL = "UPDATE location SET  ";
		$strSQL .=" LOCATION_NAME ='".$name."' , ";
		$strSQL .=" DESCRIPTION =  '".$description."' ";
		$strSQL .=" WHERE  LOCATION_ID ='".$id."' ";	
		//echo "<br/>".$strSQL."<br/>";
					mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);		
	}

	function addSubLocation($locationId,$name,$description)
	{
		$strSQL = "INSERT INTO sublocation ";
		$strSQL .="(LOCATION_ID,SUB_LOCATION_NAME,DESCRIPTION) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$locationId."','".$name."','".$description."') ";
		//echo "<br/>".$strSQL."<br/>";
					mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);
	/*	if(!$objQuery)
		{
			echo "Error Update [".mysql_error()."]";
		}
		*/
	}

	
	function updateSubLocation($id,$name,$description,$locationId)
	{
		/*
		 mysql_query("SET character_set_results=utf8");
		 mysql_query("SET character_set_client='utf8'");
         mysql_query("SET character_set_connection='utf8'");
         mysql_query("collation_connection = utf8_unicode_ci");
         mysql_query("collation_database = utf8_unicode_ci");
         mysql_query("collation_server = utf8_unicode_ci");
		*/

		$strSQL = "UPDATE sublocation SET  ";
		$strSQL .=" SUB_LOCATION_NAME ='".$name."' , ";
		$strSQL .=" DESCRIPTION =  '".$description."' , ";
		$strSQL .=" LOCATION_ID =  '".$locationId."'  ";
		$strSQL .=" WHERE  SUB_LOCATION_ID ='".$id."' ";	
		//echo "<br/>".$strSQL."<br/>";
					mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);		
	}
	
	
	function addDepartment($name,$description)
	{
		/* 
		 mysql_query("SET character_set_results=utf8");
		 mysql_query("SET character_set_client='utf8'");
         mysql_query("SET character_set_connection='utf8'");
         mysql_query("collation_connection = utf8_unicode_ci");
         mysql_query("collation_database = utf8_unicode_ci");
         mysql_query("collation_server = utf8_unicode_ci");
		 */


		$strSQL = "INSERT INTO department ";
		$strSQL .="(DEPARTMENT_NAME,DESCRIPTION) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$name."','".$description."') ";
		//echo "<br/>".$strSQL."<br/>";
					mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);

	}

	
	function updateDepartment($id,$name,$description)
	{
		$strSQL = "UPDATE department SET  ";
		$strSQL .=" DEPARTMENT_NAME ='".$name."' , ";
		$strSQL .=" DESCRIPTION =  '".$description."' ";
		$strSQL .=" WHERE  DEPARTMENT_ID ='".$id."' ";	
		//echo "<br/>".$strSQL."<br/>";
					mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);		
	}


	function addSection($departmentId,$name,$description)
	{
		$strSQL = "INSERT INTO section ";
		$strSQL .="(Department_ID,Section_NAME,DESCRIPTION) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$departmentId."','".$name."','".$description."') ";
		//echo "<br/>".$strSQL."<br/>";
					mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);
	/*	if(!$objQuery)
		{
			echo "Error Update [".mysql_error()."]";
		}
		*/
	}

	
	function updateSection($id,$name,$description,$departmentId)
	{
		$strSQL = "UPDATE section SET  ";
		$strSQL .=" Section_NAME ='".$name."' , ";
		$strSQL .=" DESCRIPTION =  '".$description."' , ";
		$strSQL .=" Department_ID =  '".$departmentId."'  ";
		$strSQL .=" WHERE  Section_ID ='".$id."' ";	
		//echo "<br/>".$strSQL."<br/>";
					mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);		
	}
	



?>