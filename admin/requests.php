<html>
<head>
<title>Show  All  User Requirement</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor='#CCFFCC' marginheight="0" marginwidth="0">
<center>
<?
   include("header.php");
   include("menu.php");
   include("dbconfig.inc.php");

	/**
		###########################################################
			SELECT TEBLE FROM DATABASE  
			AND  CHECK JOB STATUS NOT COMPLETE
		###########################################################
		**/

	$strSQL  ="SELECT  ";
	$strSQL .="userrequest.id as REQ_ID , ";
	$strSQL .="userrequest.NAME as REQ_NAME , ";
	$strSQL .="userrequest.TELEPHONE as REQ_TELEPHONE , ";
	$strSQL .="DATE_FORMAT(userrequest.REQ_DATETIME, '%d/%m/%Y') as REQ_DATE , ";
	$strSQL .="department.Department_NAME  as REQ_DEPTNAME , ";
	$strSQL .="location.location_NAME  as REQ_LOCATION , ";
	$strSQL .="product_type.Product_Type_NAME  as REQ_PRODUCTTYPE , ";
	$strSQL .="services_type.Service_Type_NAME as REQ_SERVICETYPE , ";
	$strSQL .="job_status.JOB_STATUS_NAME as REQ_STATUS ";
	$strSQL .=" FROM  ";
	$strSQL .="userrequest ,department ,location ,product_type ,services_type ,job_status ";
	$strSQL .=" WHERE ";
	$strSQL .="userrequest.Department_ID = department.department_ID  ";
	$strSQL .="AND userrequest.LOCATION_ID = location.Location_ID ";
	$strSQL .="AND userrequest.Product_Type_ID = product_type.Product_Type_ID ";
	$strSQL .="AND  userrequest.Service_Type_ID = services_type.Service_Type_ID ";
	$strSQL .="AND userrequest.JOB_STATUS = job_status.JOB_STATUS_ID ";
	// SELECT STATUS  NOT  COMPLETE (ID=6) ONLY
	$strSQL .="AND userrequest.JOB_STATUS <> '6' ";
	$strSQL .="GROUP BY  userrequest.id  ";
	

// QUERY FOR CHECK TOTAL RECORD IN DATABASE
			mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL);


	$Num_Rows = mysql_num_rows($objQuery);

	$Per_Page = 30;   // Per Page

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
	$strSQL .=" order  by ID DESC LIMIT $Page_Start , $Per_Page";
	//echo "<br/><br/>".$strSQL."<br/></br>";
	$objQuery  = mysql_query($strSQL);
	$showNo = 1;

	?>
	
	<table width="1000px" border="1">
	 <tr>
		<td colspan='8' align='center'><font size='5'><b>SHOW ALL REQUESTS</b></font></td>
	  </tr>
	  <tr>
		<th > <div align="center">NO </div></th>
		<th > <div align="center">DATE RECORD</div></th>
		<th > <div align="center">Name </div></th>
		<th > <div align="center">LOCATION</div></th>
		<th > <div align="center">PRODUCT TYPE</div></th>
		<th > <div align="center">TELEPHONE NO</div></th>
		<th > <div align="center">JOB STATUS</div></th>
		<th > <div align="center">Edit/View </div></th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?=$showNo++;?></div></td>
		<td><div align="center"><?=$objResult["REQ_DATE"];?></div></td>
		<td><?=$objResult["REQ_NAME"];?></td>
		<td><div align="center"><?=$objResult["REQ_LOCATION"];?></div></td>
		<td align="center"><?=$objResult["REQ_PRODUCTTYPE"];?></td>
		<td align="center"><?=$objResult["REQ_TELEPHONE"];?></td>
		<td align="center"><?=$objResult["REQ_STATUS"];?></td>
		<td align="center"><a href="reqedit.php?reqID=<?=$objResult["REQ_ID"];?>">Edit</a></td>
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
	//mysql_close($objConnect);
	?>
	
	</center>
	</body>
	</html>