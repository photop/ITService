<?
	/**
		##############################################
		Show  DEPARTMENT SECTION Select from Database
		##############################################
	**/


/*  ##############  include connect database  ############  */
include("../dbCon.inc.php");

//echo $state;
$state=intval($_GET['department']);
/*
$link = mysql_connect('localhost', 'root', 'ckldbpass'); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('ckl_itservices') or die('cant select database');
*/

$query="SELECT Section_ID, Section_NAME ,DESCRIPTION FROM section WHERE Department_ID='$department'";
$result=mysql_query($query);
mysql_query("SET NAMES TIS620");

?>
<? 
	//echo "xxxx   :  ".$DESCRIPTION; 
	//echo "<br/> ".$query;
?>
<select name="txtSectionId" onchange="getSection(<?=$description?>,this.value)">
<option>Your Section : แผนก</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value=<?=$row['Section_ID']?>><?=$row['Section_NAME']?></option>
<? } ?>
</select>
