<?
$id_edit=$_GET[id_edit];
//echo $id_edit;
include("dbCon.inc.php");
//$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
//$objDB = mysql_select_db("itservices");
//$strSQL = "SELECT * FROM userrequest where ID=$id_edit";
/*
$sql="select userrequest.id,userrequest.name,userrequest.employeeID,userrequest.TELEPHONE,department.Department_NAME,section.Section_NAME,location.LOCATION_NAME,sublocation.SUB_LOCATION_NAME,product_type.Product_Type_Name,userrequest.PRODUCT_ITCODE,userrequest.PRODUCT_ASSETCODE,services_type.SERVICE_Type_NAME,Problem_Detail,job_status
from userrequest,department,section,location,sublocation,product_type,services_type
where userrequest.Department_ID=department.Department_ID and userrequest.Section_ID=section.section_ID and userrequest.LOCATION_ID=location.LOCATION_ID and userrequest.SUBLOCATION_ID=sublocation.SUB_LOCATION_ID and userrequest.Product_Type_ID=product_type.Product_Type_ID and userrequest.Service_Type_ID=services_type.Service_Type_ID and userrequest.ID='$id_edit'";
*/
/*$sql1 =" select userrequest.id as NameID ,userrequest.name,userrequest.employeeID,userrequest.TELEPHONE,department.Department_NAME,section.Section_NAME,location.LOCATION_NAME,sublocation.SUB_LOCATION_NAME,product_type.Product_Type_Name,userrequest.PRODUCT_ITCODE,userrequest.PRODUCT_ASSETCODE,services_type.SERVICE_Type_NAME,Problem_Detail,job_status from userrequest,department,section,location,sublocation,product_type,services_type where userrequest.Department_ID=department.Department_ID and userrequest.Section_ID=section.section_ID and userrequest.LOCATION_ID=location.LOCATION_ID and userrequest.SUBLOCATION_ID=sublocation.SUB_LOCATION_ID and userrequest.Product_Type_ID=product_type.Product_Type_ID and userrequest.Service_Type_ID=services_type.Service_Type_ID and userrequest.ID='6'";
*/


$strSQL ="SELECT userrequest.ID as REQ_ID,userrequest.NAME as REQ_NAME,userrequest.EMPLOYEEID as REQ_EMPID , userrequest.username as REQ_UNAME, userrequest.EMAIL as REQ_EMAIL , userrequest.TELEPHONE as REQ_TELEPHONE ,department.Department_NAME as REQ_DEPTNAME , section.Section_NAME as REQ_SECTION , userrequest.Asset_Type as Req_ASSETTYPE , userrequest.PRODUCT_ITCODE as REQ_ITCODE ,userrequest.PRODUCT_ASSETCODE as REQ_ASSETCODE , userrequest.Problem_Detail as REQ_PROBLEM ,userrequest.Solve_Detail as REQ_SOLVED , location.LOCATION_NAME as REQ_LOCATION ,sublocation.SUB_LOCATION_NAME as REQ_SUBLOCATION , product_type.Product_Type_Name as REQ_PRODUCTTYPE ,services_type.SERVICE_Type_Name as REQ_SERVICETYPE , job_status.JOB_STATUS_NAME as REQ_STATUS ,userrequest.REQ_DATETIME as REQ_DATE FROM userrequest ,department,section , location ,sublocation ,product_type ,services_type ,job_status WHERE userrequest.Department_ID = department.Department_ID AND userrequest.Section_ID = section.section_ID AND userrequest.LOCATION_ID =location.LOCATION_ID AND userrequest.SUBLOCATION_ID = sublocation.SUB_LOCATION_ID AND userrequest.Product_Type_ID = product_type.Product_Type_ID AND userrequest.Service_Type_ID = services_type.Service_Type_ID AND userrequest.ID='$id_edit' GROUP BY userrequest.NAME ";
   
	mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		

//echo "----> ".$strSQL."<br/>";/*
//$result=mysql_db_query($objDB,$strSQL);
//echo "---> ".$result."<br/>";
//$rs=mysql_fetch_array($result);

if(!$objResult){ echo mysql_error(); }

//echo $objResult['REQ_NAME'];

/*
$job_date=$rs[REQ_DATETIME];
$y=substr($job_date,2,2);
$m=substr($job_date,5,2);
$d=substr($job_date,8,2);
$job_id = $rs[ID];
$code=sprintf("$y$m%05d",$job_id);
$job_name=$rs[name];
$job_employee=$rs[EMPLOYEEID];
$job_tel=$rs[TELEPHONE];
$job_department=$rs[Department_ID];
$job_section=$rs[Section_ID];
$job_location=$rs[LOCATION_ID];
$job_sublocation=$rs[SUBLOCATION_ID];
$job_product=$rs[Product_Type_ID];
$itcode=$rs[PRODUCT_ITCODE];
$assetcode=$rs[PRODUCT_ASSETCODE];
$serviceType=$re[Service_Type_ID];
$Problem_Detail=$rs[Problem_Detail];
$job_status=$rs[job_status];
echo $job_name;
*/
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Requests</title>
</head>
<script type="text/javascript">  
function printDiv(divName){  
     var printContents = document.getElementById(divName).innerHTML;  
     var originalContents = document.body.innerHTML;  
  
     document.body.innerHTML = printContents;  
     window.print();  
  
     document.body.innerHTML = originalContents;  
}  
</script>
<body>
<table width="1000" border="1">
  <tr>
    <td colspan="6"><div align="center">บริษัท ช.การช่าง (ลาว) จำกัด<br>
      CH.KARNCHANG CO.,Ltd.</div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="center">
      <h2><strong>รายละเอียดการขอใช้บริการ IT / IT Services Request Form</strong></h2>
    </div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong>Job ID :
      <?=$objResult['REQ_ID']?>
    </strong></td>
    <td colspan="2"><strong>วันที่แจ้ง : 
      <?=$objResult['REQ_DATE']?>
    </strong></td>
    <td width="208">&nbsp;</td>
    <td width="178"><strong>Status : 
      <?=$objResult['REQ_STATUS']?>
    </strong></td>
  </tr>
  <tr>
    <td colspan="2"><strong>ชื่อ-สกุล : 
      <?=$objResult['REQ_NAME']?>
    </strong></td>
    <td width="176"><strong>รหัสพนักงาน : 
      <?=$objResult['REQ_EMPID']?>
    </strong></td>
    <td width="142"><strong>เบอร์โทร : 
      <?=$objResult['REQ_TELEPHONE']?>
    </strong></td>
    <td><strong>แผนก : 
      <?=$objResult['REQ_DEPTNAME']?>
    </strong></td>
    <td><strong>ฝ่าย : 
      <?=$objResult['REQ_SECTION']?>
    </strong></td>
  </tr>
  <tr>
    <td width="145"><div align="left"><strong>ที่ตั้ง :
      <?=$objResult['REQ_LOCATION']?>
    </strong></div></td>
    <td width="111"><strong>
      <?=$objResult['REQ_SUBLOCATION']?>
    </strong></td>
    <td colspan="2"><strong>ประเภทของอุปกรณ์ : 
      <?=$objResult['REQ_PRODUCTTYPE']?>
    </strong></td>
    <td colspan="2"><strong>ชื่อเครื่อง / IT Code : 
      <?=$objResult['REQ_ITCODE']?>
    </strong></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right"><strong>ปรเภทของปัญหาที่พบ : </strong></div></td>
    <td colspan="2"><strong>
      <?=$objResult['REQ_SERVICETYPE']?>
    </strong></td>
    <td colspan="2"><strong>รหัสทรัพย์สิน/Asset : 
    <?=$objResult['REQ_ASSETCODE']?></strong></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2" rowspan="3">
      <strong>
    <textarea name="textarea" id="textarea" cols="50" rows="5"><?=$objResult['REQ_PROBLEM']?>
    </textarea>
    </form>
    </strong></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="right"><strong>รายละเอียดปัญหาที่พบ :</strong></div></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr border="0">
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
      <td colspan="2">&nbsp;</td>
    <td>
<a href="javascript:printDiv(divName)"><input name="btnPrint" type="button" id="btnPrint" value="Print"></a></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>