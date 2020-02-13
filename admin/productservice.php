<html>
<head>
<title>Product and Service Management</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<center>
<?
   include("dbconfig.inc.php");
	
	/**
		##############################################
					SHOW  PRODUCT TYPE
		##############################################
		**/
	// QUERY FOR CHECK TOTAL RECORD IN DATABASE

	$strSQL  = " SELECT Product_Type_ID as PRO_ID ,Product_Type_NAME as PRO_NAME , DESCRIPTION as PRO_DESCRIPTION  ";
	$strSQL .= " FROM product_type ";
	
			mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL);


	$Num_Rows = mysql_num_rows($objQuery);

	$Per_Page = 10;   // Per Page

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
	$strSQL .=" order  by PRO_ID  LIMIT $Page_Start , $Per_Page";
	echo "<br/><br/>".$strSQL."<br/></br>";
	$objQuery  = mysql_query($strSQL);
	$showNo = 1;

	?>
	
	<table width="650" border="1">
	  <tr>
		<td colspan='4' align='center'><font size='5'><b>PRODUCT OF SERVICE</b></font></td>	 
	  <tr>
		<th > <div align="center">NO </div></th>
		<th > <div align="center">NAME</div></th>
		<th > <div align="center">DESCRIPTION </div></th>
		<th > <div align="center">Edit/View </div></th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?=$showNo++;?></div></td>				
		<td align="center"><?=$objResult["PRO_NAME"];?></td>
		<td align="center"><?=$objResult["PRO_DESCRIPTION"];?></td>
		<td align="center"><a href="#">Edit</a></td>
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


    <?
		/** 
			######################################################
				 INSERT OR UPDATE INFORMATION FOR PRODUCT
		    ######################################################
			**/







	?>






    <?
		/** 
			#######################################################
						SERVICE TYPE
			#######################################################
			**/

				$strSQL  = " SELECT SERVICE_Type_ID as SER_ID ,SERVICE_Type_NAME as SER_NAME , DESCRIPTION as SER_DESCRIPTION  ";
	$strSQL .= " FROM services_type ";
	
			mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL);


	$Num_Rows = mysql_num_rows($objQuery);

	$Per_Page = 10;   // Per Page

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
	$strSQL .=" order  by SER_ID  LIMIT $Page_Start , $Per_Page";
	echo "<br/><br/>".$strSQL."<br/></br>";
	$objQuery  = mysql_query($strSQL);
	$showNo = 1;

	?>
	
	<table width="650" border="1">
	  <tr>
		<td colspan='4' align='center'><font size='5'><b>SERVICE TYPE</b></font></td>	 
	  <tr>
		<th > <div align="center">NO </div></th>
		<th > <div align="center">NAME</div></th>
		<th > <div align="center">DESCRIPTION </div></th>
		<th > <div align="center">Edit/View </div></th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?=$showNo++;?></div></td>				
		<td align="center"><?=$objResult["SER_NAME"];?></td>
		<td align="center"><?=$objResult["SER_DESCRIPTION"];?></td>
		<td align="center"><a href="#">Edit</a></td>
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

	?>



</center>
</body>
</html>
