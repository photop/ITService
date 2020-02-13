<?php

/** 
	##########################################
			Display XML Format
	##########################################
	**/

// Location_list
include("../dbCon.inc.php");

header("Content-type: text/xml");
echo "<?xml version=\"1.0\" ?>\n";
echo "<locations>\n";
$select = "SELECT LOCATION_ID,LOCATION_NAME,DESCRIPTION FROM location";
try {
	foreach($dbh->query($select) as $row)
		mysql_query("SET NAMES TIS620");{
		echo "<Location>\n\t<id>".$row['LOCATION_ID']."</id>\n\t<name>".$row['LOCATION_NAME']."</name>\n\t<description>".$row['DESCRIPTION']."</description>\n</Location>\n";
	}
}
catch(PDOException $e) {
	echo $e->getMessage();
	die();
}
echo "</locations>";
?>