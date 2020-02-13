<?php
// list of printer types for specific manufacturer
include("../dbCon.inc.php");

header("Content-type: text/xml");

//$deptid = $_POST['man'];
$deptid=1;

echo "<?xml version=\"1.0\" ?>\n";
echo "<printertypes>\n";
$select = "SELECT Section_ID, Section_NAME,DESCRIPTION FROM section WHERE Department_ID = '".$deptid."'";
echo $select;
try {
	foreach($dbh->query($select) as $row)
		mysql_query("SET NAMES TIS620");{
		echo "<Printertype>\n\t<id>".$row['Section_ID']."</id>\n\t<name>".$row['Section_NAME']."</name>\n\t<description>".$row["DESCRIPTION"]."</description>\n</Printertype>\n";
	}
}
catch(PDOException $e) {
	echo $e->getMessage();
	die();
}
echo "</printertypes>";
?>