<html>
<head>
<title>Product and Service Management</title>
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
		/*
		echo " Press SUBMIT ";
		echo "<br/> id  = ".$_POST["txtProID"]."<br/>";
		echo " id       = ".$_POST["txtName"]."<br/>";
		echo "name      = ".$_POST["txtDescription"]."<br/>";
		*/
		updateProduct($_POST["txtProID"],$_POST["txtName"],$_POST["txtDescription"]);
		  
	   }
	   else if($_POST['submit']=="ADD")  
	   {
		echo " Press ADD ";
		addProduct($_POST["txtName"],$_POST["txtDescription"]);
		
	   }
	   else 
	   {
		//	echo " NO Press  ";
	   }
	  
	






	
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
	$strSQL .=" order  by PRO_ID  LIMIT $Page_Start , $Per_Page";
	//echo "<br/><br/>".$strSQL."<br/></br>";
	$objQuery  = mysql_query($strSQL);
	$showNo = 1;

	?>
	
	<table width="1000px" border="1">
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
		<td align="center"><a href="product.php?proId=<?=$objResult["PRO_ID"];?>">Edit</a></td>
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

			$strSQL  = " SELECT Product_Type_ID as PRO_ID ,Product_Type_NAME as PRO_NAME , DESCRIPTION as PRO_DESCRIPTION  ";
			$strSQL .= " FROM product_type  ";
			//$strSQL .= " WHERE  Product_Type_ID = 1 ";
	
						
		//	$objQuery = mysql_query($strSQL);
		//	$objResult = mysql_fetch_array($objQuery);

			//echo "<br/>".$strSQL."<br/>";

			echo "<form action='product.php' method='post'>";

			//echo "<form name='ReqFrm' method='post' action='product.php' >";
			echo "<table width='1000px' border='1'>";
			//echo "<tr><td>NAME</td>";
			//echo "<td>DESCRIPTION</td></tr>";
			//echo "</table>";
			//$proId ="x";
			if (null!=isset($_GET["proId"]))
			{

				$strSQL .= " WHERE  Product_Type_ID = '".$_GET["proId"]."'";
							mysql_query("SET NAMES UTF8");
				$objQuery = mysql_query($strSQL);
				$objResult = mysql_fetch_array($objQuery);

				echo "<tr><td align='center'>NAME</td>";
				echo "<td align='left'><input name='txtName' type='text' size='50' maxlength='50' value='".$objResult['PRO_NAME']." ' ></td></tr>";
			//	echo "</tr>";
				echo "<tr><td align='center'>DESCRIPTION</td>";
				echo "<td align='left'><TEXTAREA name='txtDescription' type='text' COLS='50' ROWS='2'>".$objResult['PRO_DESCRIPTION']."</TEXTAREA></td>";
				echo "</tr>";
				echo "<tr><td colspan='2' ><input name='txtProID' type='hidden' value=' ".$objResult['PRO_ID']."' ></td></tr> ";
			//	echo "<tr><td colspan='2' ><input name='txtCheck' type='hidden' value='UADATE' ></td></tr> ";
				echo "<tr><td colspan='2' ><input name='submit' type='submit' value='UPDATE'>";
				//echo "<tr><td colspan='2' ><input name='submit' type='submit' value='SUBMIT'> <input name='reset' type='reset' value='Cancel'></td></tr> ";
			}else
			{
				//echo "<tr>";
				echo "<tr><td align='center'>NAME</td>";
				echo "<td align='left'><input name='txtName' type='text' size='50' maxlength='50' value='' ></td></tr>";
			//	echo "</tr>";
				echo "<tr><td align='center'>DESCRIPTION</td>";
				echo "<td align='left'><TEXTAREA name='txtDescription' type='text' COLS='50' ROWS='2'></TEXTAREA></td>";
				echo "</tr>";
				//echo "<tr><td colspan='2' ><input name='txtCheck' type='hidden' value='ADD' ></td></tr> ";
				echo "<tr><td colspan='2' ><input name='submit' type='submit' value='ADD'><input name='reset' type='reset' value='Cancel'></td></tr> ";
				
			}
			echo  "<table>";
			echo  "</form>";

	?>

	




</center>
</body>
</html>
