<html>
<head>
<title>Show  All  User Requirement</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
 <!--
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no";win=window.open(mypage,myname,settings);
win.focus();}
// -->
</script>
<body>
<?
include("dbCon.inc.php");	
/*
$objConnect = mysql_connect("localhost","root","ckldbpass") or die("Error Connect to Database");
$objDB = mysql_select_db("ckl_itservices");
*/
$strSQL = "SELECT * FROM userrequest";
mysql_query("SET NAMES UTF8");

$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
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

$strSQL .=" order  by ID DESC LIMIT $Page_Start , $Per_Page";

$objQuery  = mysql_query($strSQL);
?>
<table width="1000" border="1">
  <tr bgcolor="CCCCCC">
    <th width="5%" > <div align="center">Job_ID </div></th>
    <th width="15%"> <div align="center">Name </div></th>
    <th width="10%"> <div align="center">รหัสพนักงาน </div></th>
    <th width="10%"> <div align="center">เบอร์โทร </div></th>
    <th width="15%">IT-Code</th>
    <th width="15%">ประเภทอุปกรณ์</th>
    <th width="22%"> <div align="center">รายละเอียด</div></th>
    <th width="8%">Status</th>
  </tr>
<?
while($objResult = mysql_fetch_array($objQuery))
{
?>

  <tr>
    <td><div align="center"><?=$objResult["ID"];?></div></td>
    <td><?=$objResult["NAME"];?></td>
    <td><?=$objResult["EMPLOYEEID"];?></td>
    <td align="right"><?=$objResult["TELEPHONE"];?></td>
    <td align="right"><?=$objResult["PRODUCT_ITCODE"];?></td>
	<? $serviceID=$objResult["Service_Type_ID"];
		 $strSQL3 ="SELECT*FROM services_type where Service_Type_ID='$serviceID' ";
		  $objQuery3 = mysql_query($strSQL3);
		  $Num_Rows3 = mysql_num_rows($objQuery3);

	      while($objResult3 = mysql_fetch_array($objQuery3))

			{
			?>
    <td align="right"><?=$objResult3["SERVICE_Type_NAME"];?></td>
			<?	
			}
	  $job_id = $objResult["ID"];
      $job_detail=$objResult["Problem_Detail"];
	    echo substr("<td><a href=\"javascript:NewWindow('viewjob.php?id_edit=$job_id','acepopup','1000','480','center','front');\">$job_detail",0,200)."...</a></td>";
		?>		
	<? $StatusID=$objResult["JOB_STATUS"];
			$strSQL4 ="SELECT*FROM job_status where JOB_STATUS_ID='$StatusID' ";
		  $objQuery4 = mysql_query($strSQL4);
		  $Num_Rows4 = mysql_num_rows($objQuery4);

	      while($objResult4 = mysql_fetch_array($objQuery4))

			{ 
					
			?>

    <td align="right"><?=$objResult4["JOB_STATUS_NAME"];?>
   
    </td>
			<?	
			}
			?>	
  </tr> 

<?
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
</body>
</html>