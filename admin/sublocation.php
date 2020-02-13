<html>
<head>
<title>Location Management</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
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
			updateSubLocation($_POST["txtSubID"],$_POST["txtName"],$_POST["txtDescription"],$_POST["txtLocationId"]);
		  
	   }
	   else if($_POST['submit']=="ADD")  
	   {
		//echo " Press ADD ";
			addSubLocation($_POST["txtLocationId"],$_POST["txtName"],$_POST["txtDescription"]);
		
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

	//$strSQL  = " SELECT SUB_LOCATION_ID as SUB_ID,LOCATION_ID as LO_ID ,SUB_LOCATION_NAME as SUB_NAME , DESCRIPTION as LO_DESCRIPTION  ";
	//$strSQL .= " FROM sublocation ";

	  $strSQL   = " SELECT sublocation.SUB_LOCATION_ID as SUB_ID , ";
	  $strSQL  .=" sublocation.LOCATION_ID as LO_ID ,sublocation.SUB_LOCATION_NAME as SUB_NAME , ";
	  $strSQL  .=" sublocation.DESCRIPTION as SUB_DESCRIPTION , location.location_NAME as LO_NAME ";
	  $strSQL  .=" FROM sublocation , location ";
	  $strSQL  .=" WHERE ";
	  $strSQL  .=" sublocation.LOCATION_ID = location.location_ID ";
	  $strSQL  .=" GROUP BY SUB_ID ";
	
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
	$strSQL .=" ORDER BY SUB_LOCATION_ID  LIMIT $Page_Start , $Per_Page";
	//echo "<br/><br/>".$strSQL."<br/></br>";
	$objQuery  = mysql_query($strSQL);
	$showNo = 1;

	?>
	
	<table width="1000px" border="1">
	  <tr>
		<td colspan='5' align='center'><font size='5'><b>SUB-LOCATION MANAGEMENT</b></font></td>	 
	  <tr>
		<th > <div align="center">NO </div></th>
		<th > <div align="center">SUB LOCATION NAME</div></th>
		<th > <div align="center">MAIN LOCATION</div></th>
		<th > <div align="center">DESCRIPTION </div></th>		
		<th > <div align="center">Edit/View </div></th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?=$showNo++;?></div></td>				
		<td align="center"><?=$objResult["SUB_NAME"];?></td>
		<td align="center"><?=$objResult["LO_NAME"];?></td>
		<td align="center"><?=$objResult["SUB_DESCRIPTION"];?></td>
		<td align="center"><a href="sublocation.php?subId=<?=$objResult["SUB_ID"];?>">Edit</a></td>
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
					GET ALL  LOCATION
			######################################################
			**/

			$strSQLLO  = " SELECT LOCATION_ID as LO_ID ,LOCATION_NAME as LO_NAME , DESCRIPTION as LO_DESCRIPTION  ";
			$strSQLLO .= " FROM location ";
						 mysql_query("SET NAMES UTF8");
			$objQueryLo = mysql_query($strSQLLO);
			//$objLocation = mysql_fetch_array($objQueryLo);


			/*
			######################################################
				GET SUB LOCATION
			######################################################
			**/
			$strSQL   = " SELECT SUB_LOCATION_ID as SUB_ID , ";
			$strSQL  .=" LOCATION_ID as LO_ID , SUB_LOCATION_NAME as SUB_NAME , ";
			$strSQL  .=" DESCRIPTION as SUB_DESCRIPTION  ";
			$strSQL  .=" FROM sublocation  ";
		//	$strSQL  .=" WHERE ";
		//	$strSQL  .=" sublocation.LOCATION_ID = location.location_ID ";
		//	$strSQL  .=" GROUP BY SUB_ID ";
	
						
		//	$objQuery = mysql_query($strSQL);
		//	$objResult = mysql_fetch_array($objQuery);

			//echo "<br/>".$strSQL."<br/>";

			echo "<form action='sublocation.php' method='post'>";

			//echo "<form name='ReqFrm' method='post' action='product.php' >";
			echo "<table width='1000px' border='1'>";
			//echo "<tr><td>NAME</td>";
			//echo "<td>DESCRIPTION</td></tr>";
			//echo "</table>";
			//$proId ="x";
			if (null!=isset($_GET["subId"]))
			{

				$strSQL .= " WHERE  SUB_LOCATION_ID = '".$_GET["subId"]."'";
							mysql_query("SET NAMES UTF8");
				$objQuery = mysql_query($strSQL);
				$objResult = mysql_fetch_array($objQuery);

				echo "<tr><td align='center'>NAME</td>";
				echo "<td align='left'><input name='txtName' type='text' size='50' maxlength='50' value='".$objResult['SUB_NAME']." ' ></td></tr>";
				//echo "</tr>";
				echo "<tr><td align='center'>DESCRIPTION</td>";
				echo "<td align='left'><TEXTAREA name='txtDescription' type='text' COLS='50' ROWS='2'>".$objResult['SUB_DESCRIPTION']."</TEXTAREA></td>";
				echo "</tr>";
				echo "<tr><td colspan='2' ><input name='txtSubID' type='hidden' value=' ".$objResult['SUB_ID']."' ></td></tr> ";

				// Show  LOCATION HERE

				echo "<tr><td align='center'>MAIN LOCATION</td>";
				echo "<td align='left'><select name='txtLocationId' >";
				//echo "<option value=''>Select Location First</option>";
					while($objLocation=mysql_fetch_array($objQueryLo)) 
						{ 
							if ($objLocation['LO_ID'] == $objResult['LO_ID'] )
							{
								echo "<option value='".$objLocation['LO_ID']."' selected = 'selected'  > ".$objLocation['LO_NAME']."</option>";
							}
							else
							{
								echo "<option value='".$objLocation['LO_ID']."' > ".$objLocation['LO_NAME']."</option>";
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
				echo "<tr><td align='center'>MAIN LOCATION</td>";
				echo "<td align='left'><select name='txtLocationId' >";
				//echo "<option value=''>Select Location First</option>";
					while($objLocation=mysql_fetch_array($objQueryLo)) 
						{ 
							if ($objLocation['LO_ID'] == $objResult['LO_ID'] )
							{
								echo "<option value='".$objLocation['LO_ID']."' selected = 'selected'  > ".$objLocation['LO_NAME']."</option>";
							}
							else
							{
								echo "<option value='".$objLocation['LO_ID']."' > ".$objLocation['LO_NAME']."</option>";
							}
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
