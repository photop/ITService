<?php

/** 
	##########################################
			Display XML Format
	##########################################
	**/

// Department_list

$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("itservices");
mysql_query("SET NAMES UTF8");

header("Content-type: text/xml");
echo "<?xml version=\"1.0\" ?>\n";
echo "<departments>\n";
$select = "SELECT Department_ID,Department_NAME,DESCRIPTION FROM department";
try {
	foreach($dbh->query($select) as $row){
		echo "<Department>\n\t<id>".$row['Department_ID']."</id>\n\t<name>".$row['Department_NAME']."</name>\n\t<description>".$row['DESCRIPTION']."</description>\n</Department>\n";
	}
}
catch(PDOException $e) {
	echo $e->getMessage();
	die();
}
echo "</departments>";
?>