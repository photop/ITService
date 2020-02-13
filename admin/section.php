<html>
<head>
<title>Location Management</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor='#CCFFCC' marginheight="0" marginwidth="0">
<center>
<?
   include("header.php");
   include("menu.php");
   include("dbconfig.inc.php");
   include("functions.php");

		/**
		##############################################
					EVENT FROM USER
			- SUBMIT  = UPDATA DATABASE
			- ADD     = INSERT INTO DATABASE
		##############################################
		**/
	
	   if($_POST['submit']=="UPDATE")  
	   {		
			updateSection($_POST["txtSubID"],$_POST["txtName"],$_POST["txtDescription"],$_POST["txtDeptId"]);
		  
	   }
	   else if($_POST['submit']=="ADD")  
	   {
		//echo " Press ADD ";
			addSection($_POST["txtDeptId"],$_POST["txtName"],$_POST["txtDescription"]);
		
	   }
	   else 
	   {
		//	echo " NO Press  ";
	   }
	  
	






	
	/**
		##############################################
					SHOW  SUB-LOCATION
		##############################################
		**/
	// QUERY FOR CHECK TOTAL RECORD IN DATABASE

	  $strSQL   =" SELECT section.Section_ID as SEC_ID , section.Section_NAME as SEC_NAME , ";
	  $strSQL  .=" section.DESCRIPTION as SEC_DESCRIPTION , department.Department_NAME as DEP_NAME ";
	  $strSQL  .=" FROM section , department ";
	  $strSQL  .=" WHERE ";
	  $strSQL  .=" section.department_ID = department.department_ID ";
	  //$strSQL  .=" GROUP BY SEC_ID ";


	 // echo "<br/>".$strSQL."<br/>";
	
			mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL);


	$Num_Rows = mysql_num_rows($objQuery);

	$Per_Page = 20;   // Per Page

	$Page = $_GET["Page"];
	if(!$_GET["Page"])
	{
		$Page=1;
	}

	$Prev_Page = $Page-1;
	$Next_Page = $Page+1;

	$Page_Start = (($Per_Page*$Page)-$Per_Page);
	if($Num_Rows<=$Per_Page)
	{
		$Num_Pages =1;
	}
	else if(($Num_Rows % $Per_Page)==0)
	{
		$Num_Pages =($Num_Rows/$Per_Page) ;
	}
	else
	{
		$Num_Pages =($Num_Rows/$Per_Page)+1;
		$Num_Pages = (int)$Num_Pages;
	}

	 // QUERY SHOW LIMIT PAGE FROM DATABASE
	$strSQL .=" ORDER BY SEC_ID  LIMIT $Page_Start , $Per_Page";
	//echo "<br/><br/>".$strSQL."<br/></br>";
	$objQuery  = mysql_query($strSQL);
	$showNo = 1;

	?>
	
	<table width="1000px" border="1">
	  <tr>
		<td colspan='5' align='center'><font size='5'><b>SECTION MANAGEMENT</b></font></td>	 
	  <tr>
		<th > <div align="center">NO </div></th>
		<th > <div align="center">SECTION NAME</div></th>
		<th > <div align="center">DEPRTMENT NAME</div></th>
		<th > <div align="center">DESCRIPTION </div></th>		
		<th > <div align="center">Edit/View </div></th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?=$showNo++;?></div></td>				
		<td align="center"><?=$objResult["SEC_NAME"];?></td>
		<td align="center"><?=$objResult["DEP_NAME"];?></td>
		<td align="center"><?=$objResult["SEC_DESCRIPTION"];?></td>
		<td align="center"><a href="section.php?secId=<?=$objResult["SEC_ID"];?>">Edit</a></td>
	  </tr>
	  
	<?
		//$showNo ++;
	}
	?>
	</table>
	


	<br>
	Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
	<?
	if($Prev_Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
		if($i != $Page)
		{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
		}
		else
		{
			echo "<b> $i </b>";
		}
	}
	if($Page!=$Num_Pages)
	{
		echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
	}
	//

  ?>
   <br><br><br>

    <?
		/** 
			######################################################
				 INSERT OR UPDATE INFORMATION FOR PRODUCT
		    ######################################################
			**/

			/*
			######################################################
					GET ALL  DEPARTMENT
			######################################################
			**/

			$strSQLDEP  = " SELECT Department_ID as DEPT_ID ,Department_NAME as DEPT_NAME , DESCRIPTION as DEPT_DESCRIPTION  ";
			$strSQLDEP .= " FROM department ";
						 mysql_query("SET NAMES UTF8");
			$objQueryDep = mysql_query($strSQLDEP);
			//$objLocation = mysql_fetch_array($objQueryLo);


			/*
			######################################################
				GET SECTION
			######################################################
			**/
			$strSQL   =" SELECT Section_ID as SEC_ID ,Section_NAME as SEC_NAME , ";
			$strSQL  .=" DESCRIPTION as SEC_DESCRIPTION , Department_ID as DEP_ID ";
			$strSQL  .=" FROM section  ";
		//	$strSQL  .=" WHERE ";
		//	$strSQL  .=" sublocation.LOCATION_ID = location.location_ID ";
		//	$strSQL  .=" GROUP BY SUB_ID ";
				
						
		//	$objQuery = mysql_query($strSQL);
		//	$objResult = mysql_fetch_array($objQuery);

			//echo "<br/>".$strSQL."<br/>";

			echo "<form action='section.php' method='post'>";

			//echo "<form name='ReqFrm' method='post' action='product.php' >";
			echo "<table width='1000px' border='1'>";
			//echo "<tr><td>NAME</td>";
			//echo "<td>DESCRIPTION</td></tr>";
			//echo "</table>";
			//$proId ="x";
			if (null!=isset($_GET["secId"]))
			{

				$strSQL .= " WHERE  Section_ID = '".$_GET["secId"]."'";
							mysql_query("SET NAMES UTF8");
				$objQuery = mysql_query($strSQL);
				//echo "<br/>".$strSQL."<br/>";
				$objResult = mysql_fetch_array($objQuery);

				echo "<tr><td align='center'>NAME</td>";
				echo "<td align='left'><input name='txtName' type='text' size='50' maxlength='50' value='".$objResult['SEC_NAME']." ' ></td></tr>";
				//echo "</tr>";
				echo "<tr><td align='center'>DESCRIPTION</td>";
				echo "<td align='left'><TEXTAREA name='txtDescription' type='text' COLS='50' ROWS='2'>".$objResult['SEC_DESCRIPTION']."</TEXTAREA></td>";
				echo "</tr>";
				echo "<tr><td colspan='2' ><input name='txtSubID' type='hidden' value=' ".$objResult['SEC_ID']."' ></td></tr> ";

				// Show  LOCATION HERE

				echo "<tr><td align='center'>DEPARTMENT</td>";
				echo "<td align='left'><select name='txtDeptId' >";
				//echo "<option value=''>Select Location First</option>";
					while($objDepartment=mysql_fetch_array($objQueryDep)) 
						{ 
							if ($objDepartment['DEPT_ID'] == $objResult['DEP_ID'] )
							{
								echo "<option value='".$objDepartment['DEPT_ID']."' selected = 'selected'  > ".$objDepartment['DEPT_NAME']."</option>";
							}
							else
							{
								echo "<option value='".$objDepartment['DEPT_ID']."' > ".$objDepartment['DEPT_NAME']."</option>";
							}
						} 
				echo "</select></td></tr>";




			//	echo "<tr><td colspan='2' ><input name='txtCheck' type='hidden' value='UADATE' ></td></tr> ";
				echo "<tr><td colspan='2' ><input name='submit' type='submit' value='UPDATE'></td></tr> ";
				//echo "<tr><td colspan='2' ><input name='submit' type='submit' value='SUBMIT'> <input name='reset' type='reset' value='Cancel'></td></tr> ";
			}else
			{
				//echo "<tr>";
				echo "<tr><td align='center'>NAME</td>";
				echo "<td align='left'><input name='txtName' type='text' size='50' maxlength='50' value='' ></td></tr>";
				//echo "</tr>";
				echo "<tr><td align='center'>DESCRIPTION</td>";
				echo "<td align='left'><TEXTAREA name='txtDescription' type='text' COLS='50' ROWS='2'></TEXTAREA></td>";
				echo "</tr>";
				
				// Show  LOCATION HERE
				echo "<tr><td align='center'>DEPARTMENT</td>";
				echo "<td align='left'><select name='txtDeptId' >";
				//echo "<option value=''>Select Location First</option>";
					while($objDepartment=mysql_fetch_array($objQueryDep)) 
						{ 
						/*	if ($objDepartment['DEPT_ID'] == $objResult['LO_ID'] )
							{
								echo "<option value='".$objDepartment['DEPT_ID']."' selected = 'selected'  > ".$objDepartment['DEPT_NAME']."</option>";
							}
							else
							{  */
								echo "<option value='".$objDepartment['DEPT_ID']."' > ".$objDepartment['DEPT_NAME']."</option>";
						//	}
						} 
				echo "</select></td></tr>";

				echo "<tr><td colspan='2' ><input name='submit' type='submit' value='ADD'><input name='reset' type='reset' value='Cancel'></td></tr> ";
				
			}
			echo  "<table>";
			echo  "</form>";

	?>


</center>
</body>
</html>
