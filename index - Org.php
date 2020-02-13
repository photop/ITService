

<!DOCTYPE html>
<html lang="th">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Online IT Services CH Karnchang (Lao) CO.,Ltd.</title>

		<script language="javascript" type="text/javascript" >
		
		 function tellMe()

				{
				
				   alert ("ซน ๆๆๆๆๆ   อย่าเพิ่งกดสิ  ยังไม่เสร็จ ");
				}

		 function goPage()
				 {
					 //alert("Go Go Go");
					 var url="request.php";
					 document.location.href = url;

					
				 }
		function open_win()
				{
				window.open('request.php','_self',false);
				}

			


		</script>
    <style type="text/css">
    body {
	background-color: #6CF;
}
    </style>
    </head>
  <body bgcolor='#6CF' marginwidth="0" marginheight="0">
 <!-- center>	<img src="imgs/header.jpg" width="1000px" height="200px"  /> </center -->
 <center> <? include "header.php" ?>

 <table width="1000px" height='100%'  border='0' >
 <tr align='right'> <td> 
		<!-- form name="Search" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>" -->
		<form name="Search" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>"  >
		<table  width="650px" border="0" bgcolor='#6CF'>
		<tr>
		  <td width="300px" align='right'>ใส่เลขที่หรือชื่อที่ต้องการค้นหา</td>
		  <td><input name="txtKeyword" type="text" id="txtKeyword" size="40" maxlength="50" value="<?=$_GET["txtKeyword"];?>"> </td>
     	  <td width="50px" align='center'> <input type="submit"  value="Search"></td>

    </tr> 

</form>

</td></tr>
 </table>

</center>

<center><font color='red' size='5'>
<!--
 <br/> ระบบลงทะเบียนขอใช้บริการ IT อยู่ระหว่างการพัฒนา <br/><br/>
 ค้นหาและตรวจสอบสถานะใบรับบริการโดยใส่ชื่อผู้ขอรับบริการหรือรหัสใบขอรับบริการในช่องค้นหา
 <br/><br/>
 -->
 </font>
 <font color='red' size='8'><a href='request.php'><b>เขียนใบขอรับบริการ IT CLICK</b></a></font>
</center>
<br/><br/> 

<center><? Include("requestlist.php"); ?> </center>

<?
if($_GET["txtKeyword"] != "")

//	if(!isset($_POST['Search']))
		{
			/**
				##############################################
				      SEARCH REQUEST STATUS
				##############################################
				**/
		 include("dbCon.inc.php");	

		$strSQL  =" SELECT  ";
		$strSQL .="userrequest.ID as REQ_ID , ";
		$strSQL .="userrequest.NAME as REQ_NAME , ";
		$strSQL .="DATE_FORMAT(userrequest.REQ_DATETIME, '%d/%m/%Y')  as REQ_DATE , ";
		$strSQL .="job_status.JOB_STATUS_NAME as REQ_STATUS  ";
		$strSQL .=" FROM ";
		$strSQL .="userrequest , job_status ";
		$strSQL .=" WHERE ";
		$strSQL .=" userrequest.ID LIKE  '%".trim($_GET["txtKeyword"])."%' ";
		$strSQL .=" OR ";
		$strSQL .=" userrequest.USERNAME LIKE  '%".trim($_GET["txtKeyword"])."%' ";
		$strSQL .=" GROUP BY userrequest.ID ";
	//	echo "<br/>-->".$_GET["txtKeyword"];
	   
		echo "<br/>".$strSQL."<br/>";


	//	$strSQL = "SELECT * FROM userrequest WHERE ID = '".$_GET["reqID"]."' ";
	/*		mysql_query("SET NAMES UTF8");
			mysql_query("SET character_set_results=utf8");
			mysql_query("SET character_set_client=utf8");
			mysql_query("SET character_set_connection=utf8");
			mysql_query('SET character_set_results=utf8');
			*/
mysql_query('SET names=utf8');  
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_connection=utf8');   
mysql_query('SET character_set_results=utf8');   
mysql_query('SET collation_connection=utf8_general_ci');
		//echo $strSQL;
		$objQuery  = mysql_query($strSQL);
		$objCount  = mysql_num_rows($objQuery);
		//echo "---->".$objCount;
		//$objResult = mysql_fetch_array($objQuery);

					echo  "<center>";
					echo  "<table  width='80%' border='1' bgcolor='#CCFFCC'>";
					echo  "<tr>";
					echo  "<th  align='center'>DATE RECORD </th>";
					echo  "<th  align='center'>เลขที่ขอรับบริการ</th>";					
					echo  "<th  align='center'>ชื่อผู้ขอรับบริการ </th>";
					echo  "<th  align='center'>สถานะ</th>";
					echo  "</tr>";
					############# Check No Data from Search   #############
					if  ($objCount)
						{
							/*
								######## DISPLAY RESULT  ############
							*/
		
							while($objResult=mysql_fetch_array($objQuery))
							{
								echo  "<tr>";
								echo  "<td  align='center'>".$objResult["REQ_DATE"]."</td>";
								echo  "<td  align='center'>".$objResult["REQ_ID"]."</td>";
								echo  "<td  align='left'>".$objResult["REQ_NAME"]."</td>";
								echo  "<td  align='center'>".$objResult["REQ_STATUS"]."</td>";
								echo  "</tr>";
							}

						}
						else
						{
	/*
						######## NO DISPLAY RESULT  ############
	*/
						echo "<tr><td COLSPAN=4 align=center>No Data</td></tr>";
						}
						
						echo  "</table>";
						echo  "</center>";
					
					
		}
	
		

	?>
		
		</center>
    </body>
</html>






