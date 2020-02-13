<html lang="th">
    <head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	</head>
	<body>
<?
include ("userfunctions.php");

require_once("src/class.phpmailer.php");



include("dbCon.inc.php");	

/*
if(true == (addNewRequest($name,$empId,$username,$mail,$telephone,$depId,$sectionId,$assetId,$proItCode,$proAssId,$problems,$locationId,$sublocationId,$proTypeId,$serviceId)))
{
	echo "Insert OK";
	mailtoService($username,$department,$location);

}else
{
	echo "Insert Fail";
}
*/


$keyword = "ume";
 $result = searchNormal($keyword);
 $arrlength=count($result);
 echo "--->   ".$arrlength."<br/>";
 
 //while($objResult=mysql_fetch_array($result))
 
 for($x=0;$x<$arrlength;$x++)
  {
  echo " ccc <br> ";
  echo $result["REQ_NAME"];
  echo "<br>";
  }
?> 
 
?>
</body>
</html>