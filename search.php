<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
</head>

<body marginwidth="0" marginheight="0" >
 <center> 

 	  <? 
		//include "header.php";
		include("dbCon.inc.php");	
		include("userfunctions.php");
	?>


<form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
<table width='53%' align='center' bgcolor='emonchiffon' cellpadding='3' cellspacing='1'>
    <tr>
      <th><font color="#FFFFFF">ค้นหาข้อมูล
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?=$_GET["txtKeyword"];?>">&nbsp;
      <input type="submit" value="ค้นหา"> &nbsp;&nbsp;&nbsp; ใส่คำที่ต้องการค้นหา &nbsp;&nbsp;&nbsp; *** โปรดตรวจสอบข้อมูลก่อนการแจ้ง *** </font></th>
    </tr>    
  </table>
</form><br /><br />
<font color='green' size='5'><a href='request.php'><b>เขียนใบขอรับบริการ IT CLICK</b></a></font>
<br/><br/>

<? 
$keyword=$_GET["txtKeyword"];

	
if($keyword != "")
{	
	//$sql="select * from cases,accused where cases.id_Acc=accused.id_Acc and (cases.id_Acc like '$keyword%' or accused.name_Acc like '$keyword%')"; 
	//echo"$sql";
	
		$sql  =" SELECT  ";
		$sql .="userrequest.ID as REQ_ID , ";
		$sql .="userrequest.NAME as REQ_NAME , ";
		$sql .="userrequest.EMPLOYEEID as REQ_EMPID , ";
		$sql .="DATE_FORMAT(userrequest.REQ_DATETIME, '%d/%m/%Y')  as REQ_RDATE , ";
		$sql .="DATE_FORMAT(userrequest.SOLVE_DATETIME, '%d/%m/%Y')  as REQ_SDATE , ";
		$sql .="job_status.JOB_STATUS_NAME as REQ_STATUS  ";
		$sql .=" FROM ";
		$sql .="userrequest , job_status ";
		$sql .=" WHERE ";
		$sql .=" userrequest.ID LIKE  '%".trim($keyword)."%' ";
		$sql .=" OR ";
		$sql .=" userrequest.USERNAME LIKE  '%".trim($keyword)."%' ";
		$sql .=" OR ";
		$sql .=" userrequest.EMPLOYEEID LIKE  '%".trim($keyword)."%' ";
		$sql .=" GROUP BY userrequest.ID ";
	//	echo "<br/> ".$sql."<br/>";
	
	$qrySearch=mysql_query($sql) ;	
	$record = mysql_num_rows($qrySearch);

	if($record)
	{
			echo"<center><b><font color='#FF0000' size='3'>พบข้อมูลทั้งสิ้น $record รายการ</font></b></center><br><br>";
    }
	else
	{
		echo "<center><b><font color='#FF0000' size='3'>ไม่พบข้อมูลตามที่ระบุ</font></b></center><br><br>";		
	}
	

?>
<table width='55%' align='center' bgcolor='#990000' cellpadding='3' cellspacing='1'>
  <tr>
    <th width="15%"><font color="#FFFFFF">
      <div align="center">เลขที่คำร้อง</div>
    </font></th>
    <th width="30%"><font color="#FFFFFF">
      <div align="center">ชื่อผู้แจ้ง</div>
    </font></th>
    <th width="20%"> <font color="#FFFFFF">
      <div align="center">สถานะ</div>
    </font></th>

    <th width="15%"> <font color="#FFFFFF">
      <div align="center">วันที่แจ้ง</div>
    </font></th>
    <th width="15%"> <font color="#FFFFFF">
      <div align="center">วันที่ดำเนินการ</div>
    </font></th>
  </tr>
  <?

 while($rsSearch= mysql_fetch_array($qrySearch))
	{	
	  //########## Display Result ##############
	/*  $idReq = $rsSearch[REQ_ID];
	  $nameReq = $rsSearch[REQ_NAME];
	  $statusReq = $rsSearch[REQ_STATUS];
	  $rDate = $rsSearch[REQ_RDATE];
	  $sDate = $rsSearch[REQ_SDATE]; */

   
     echo "<tr>";
     echo "<td bgcolor='#FFFFFF' align='center'>".$rsSearch[REQ_ID]."</td>";
	 echo "<td bgcolor='#FFFFFF' align='center'>".$rsSearch[REQ_NAME]."</td>";
	 echo "<td bgcolor='#FFFFFF' align='center'>".$rsSearch[REQ_STATUS]."</td>";
	 echo "<td bgcolor='#FFFFFF' align='center'>".$rsSearch[REQ_RDATE]."</td>";
	 echo "<td bgcolor='#FFFFFF' align='center'>".$rsSearch[REQ_SDATE]."</td>";
     echo "</tr>";
      }	  
 ?>
    </table>
<br /><br /></br></br>
  
	<?  
	//include "foot.php";
			
	 }
  
?>
 </center>
</body>
</html>