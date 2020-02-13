
<?
	/**
		######################################
		Show  Location Select from Database
		#######################################
	**/

//echo $state;

$state=intval($_GET['state']);
/*
$link = mysql_connect('localhost', 'root', 'ckldbpass'); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('ckl_itservices') or die('cant select database');

*/

include("../dbCon.inc.php");	

$query="SELECT SUB_LOCATION_ID, SUB_LOCATION_NAME ,DESCRIPTION FROM sublocation WHERE LOCATION_ID='$state'";
$result=mysql_query($query);
mysql_query("SET NAMES TIS620");
?>


<? //echo "xxxx   :  ".$DESCRIPTION; ?>
<select name="txtSubLocationId" onchange="getSubLocation(<?=$description?>,this.value)">
<option>Select Sub Location</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value=<?=$row['SUB_LOCATION_ID']?>><?=$row['SUB_LOCATION_NAME']?></option>
<? } ?>
</select>


