
<!DOCTYPE html>
<html lang="th">
    <head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<script language="JavaScript" src="scripts/myfunction.js" />
		<script language="javascript" type="text/javascript" ></script>
	</head>
<body>
<?
	
	include("dbCon.inc.php");	
/*
  	echo "<br/> txtName  :  ".$_POST["txtName"];
	echo "<br/> txtEmployeeID  :  ".$_POST["txtEmployeeID"];
	echo "<br/> txtDepartmentID : ".$_POST["txtDepartmentID"];
	echo "<br/> txtSectionId : ".$_POST["txtSectionId"];
	echo "<br/> txtUsername : ".$_POST["txtUsername"];
	echo "<br/> txtEmail : ".$_POST["txtEmail"];
	echo "<br/> txtTelephone : ".$_POST["txtTelephone"];
	echo "<br/> txtAssetTypeId : ".$_POST["txtAssetTypeID"];
	echo "<br/> txtProductItCode : ".$_POST["txtProductItCode"];
	echo "<br/> txtProductAssetCode : ".$_POST["txtProductAssetCode"];
	echo "<br/> txtLocationID : ".$_POST["txtLocationID"];
	echo "<br/> txtSubLocation : ".$_POST["txtSubLocationId"];
	echo "<br/> txtProductTypeID : ".$_POST["txtProductTypeID"];
	echo "<br/> txtServiceTypeID : ".$_POST["txtServiceTypeID"];
	echo "<br/> txtProblemDetail : ".$_POST["txtProblemDetail"];

	
	$name = isset($_POST['name'])?$_POST['name']:'';
	*/

//  Stamp DATETIME  
$txtDatetime = date("Y-m-d H:i:s", time()); 
//echo "Date-----------> ".$txtDatetime."<br/>";

$objDB = mysql_select_db("itservices");

	  mysql_query("SET character_set_results=utf8");
      mysql_query("SET character_set_client='utf8'");
      mysql_query("SET character_set_connection='utf8'");
      mysql_query("collation_connection = utf8_unicode_ci");
      mysql_query("collation_database = utf8_unicode_ci");
      mysql_query("collation_server = utf8_unicode_ci");

/**  CHECK CONDITION  INSERT UPDATE DATA 
     INTO DATABASE
**/

//if ($_POST["txtID"] == "" || $_POST["txtID"] == null )
//{
	//echo " INSERT  into DATABASE";
	/**
		INSERT  DATA INTO DATEBASE
	**/

	$strSQL = "INSERT INTO userrequest ";
	$strSQL .="(Name,EMPLOYEEID,USERNAME,EMAIL,TELEPHONE,DEPARTMENT_ID,Section_ID,Asset_Type,PRODUCT_ITCODE,PRODUCT_ASSETCODE,Problem_detail,LOCATION_ID,SUBLOCATION_ID,Product_Type_ID,Service_Type_ID,JOB_STATUS,REQ_DATETIME) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["txtName"]."','".$_POST["txtEmployeeID"]."' ";
	$strSQL .=",'".$_POST["txtUsername"]."' ,'".$_POST["txtEmail"]."' ";
	$strSQL .=",'".$_POST["txtTelephone"]."' ,'".$_POST["txtDepartmentID"]."' ";
	$strSQL .=",'".$_POST["txtSectionId"]."' ,'".$_POST["txtAssetTypeID"]."' ";
	//$strSQL .=",'".$_POST[""]."' ";
	$strSQL .=",'".$_POST["txtProductItCode"]."' ,'".$_POST["txtProductAssetCode"]."' ";
	$strSQL .=",'".$_POST["txtProblemDetail"]."' ,'".$_POST["txtLocationID"]."' ";
	$strSQL .=",'".$_POST["txtSubLocationId"]."' ,'".$_POST["txtProductTypeID"]."' ";
	//$strSQL .=",'".$_POST["txtProductTypeID"]."' ";
	$strSQL .=",'".$_POST["txtServiceTypeID"]."','1',' ".$txtDatetime."' ) ";
   
 // echo "<br/>".$strSQL."<br/><br/>";
	//  INSERT DATABSER HERE
//	$objQuery = mysql_query($strSQL);

   /**
		##############################################################
		   AFTER INSERT DATA GET DATA WITH NAME AND DATETIME
		##############################################################
		##############################################################
		   SELECT TABEL  IN DATABASE  FOLLOWS
		   - USERREQUEST ,DEPARTMENT, SECTION, LOCATION,SUBLOCATION
		   - PRODUCT_TYPE, SERVICES_TYPE, JOB_STATUS
		   USED USERREQUEST.ID  IN CONDITION
		##############################################################
		**/
	
	 // $strSQL ="SELECT * FROM userrequest WHERE NAME LIKE '%ทดสอบ by top%' AND REQ_DATETIME LIKE '%2012-12-08 12:35:50%' ";
/*
		$strSQL  ="SELECT ";
		$strSQL .="userrequest.ID as REQ_ID,userrequest.NAME as REQ_NAME,userrequest.EMPLOYEEID as REQ_EMPID , ";
		$strSQL .="userrequest.username as REQ_UNAME, userrequest.EMAIL as REQ_EMAIL , ";
		$strSQL .="userrequest.TELEPHONE as REQ_TELEPHONE ,department.Department_NAME as REQ_DEPTNAME , ";
		$strSQL .="section.Section_NAME as REQ_SECTION , userrequest.Asset_Type as  Req_ASSETTYPE , ";
		$strSQL .="userrequest.PRODUCT_ITCODE as REQ_ITCODE ,userrequest.PRODUCT_ASSETCODE as REQ_ASSETCODE , ";
		$strSQL .="userrequest.Problem_Detail as REQ_PROBLEM ,userrequest.Solve_Detail as REQ_SOLVED , ";
		$strSQL .="location.LOCATION_NAME as REQ_LOCATION ,sublocation.SUB_LOCATION_NAME as REQ_SUBLOCATION , ";
		$strSQL .="product_type.Product_Type_Name as REQ_PRODUCTTYPE  ,services_type.SERVICE_Type_Name as REQ_SERVICETYPE , ";
		$strSQL .="job_status.JOB_STATUS_NAME as REQ_STATUS ,userrequest.REQ_DATETIME as REQ_DATE ";
		$strSQL .=" FROM ";
		$strSQL .=" userrequest ,department,section , location ,sublocation ,product_type ,services_type ,job_status ";
		$strSQL .=" WHERE ";
		$strSQL .=" userrequest.Department_ID = department.Department_ID " ;
		$strSQL .=" AND ";
		$strSQL .=" userrequest.Section_ID = section.section_ID ";
		$strSQL .=" AND ";
		$strSQL .=" userrequest.LOCATION_ID =location.LOCATION_ID ";
		$strSQL .=" AND ";
		$strSQL .=" userrequest.SUBLOCATION_ID = sublocation.SUB_LOCATION_ID ";
		$strSQL .=" AND ";
		$strSQL .=" userrequest.Product_Type_ID = product_type.Product_Type_ID ";
		$strSQL .=" AND ";
		$strSQL .=" userrequest.Service_Type_ID = services_type.Service_Type_ID ";
		$strSQL .=" AND ";
		$strSQL .=" NAME LIKE '%".$_POST['txtName']."%' AND REQ_DATETIME LIKE '%".$txtDatetime."%'  ";
		//$strSQL .=" NAME LIKE '%Name:ชื่อ - นามสกุลผู้แจ้ง%' AND REQ_DATETIME LIKE '%2012-12-09 10:08:37%' ";
		$strSQL .=" GROUP BY  ";
		$strSQL .=" userrequest.NAME  ";


		echo "<br/>".$strSQL."<br/>";
*/


		$strSQL ="SELECT userrequest.ID as REQ_ID,userrequest.NAME as REQ_NAME,userrequest.EMPLOYEEID as REQ_EMPID , userrequest.username as REQ_UNAME, userrequest.EMAIL as REQ_EMAIL , userrequest.TELEPHONE as REQ_TELEPHONE ,department.Department_NAME as REQ_DEPTNAME , section.Section_NAME as REQ_SECTION , userrequest.Asset_Type as Req_ASSETTYPE , userrequest.PRODUCT_ITCODE as REQ_ITCODE ,userrequest.PRODUCT_ASSETCODE as REQ_ASSETCODE , userrequest.Problem_Detail as REQ_PROBLEM ,userrequest.Solve_Detail as REQ_SOLVED , location.LOCATION_NAME as REQ_LOCATION ,sublocation.SUB_LOCATION_NAME as REQ_SUBLOCATION , product_type.Product_Type_Name as REQ_PRODUCTTYPE ,services_type.SERVICE_Type_Name as REQ_SERVICETYPE , job_status.JOB_STATUS_NAME as REQ_STATUS ,userrequest.REQ_DATETIME as REQ_DATE FROM userrequest ,department,section , location ,sublocation ,product_type ,services_type ,job_status WHERE userrequest.Department_ID = department.Department_ID AND userrequest.Section_ID = section.section_ID AND userrequest.LOCATION_ID =location.LOCATION_ID AND userrequest.SUBLOCATION_ID = sublocation.SUB_LOCATION_ID AND userrequest.Product_Type_ID = product_type.Product_Type_ID AND userrequest.Service_Type_ID = services_type.Service_Type_ID AND NAME LIKE '%xxUUUU กหดหกดกหด%' AND REQ_DATETIME LIKE '%2012-12-09 11:48:59%' GROUP BY userrequest.NAME ";
    
				mysql_query("SET NAMES UTF8");
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		
	/**  
		########################################################
						SHOW REQUET DETAIL  
		########################################################
		**/
   /*
		echo "<br/><br/>";
		echo "<br/> ID		      :  ".$objResult['REQ_ID'];
		echo "<br/> NAME          :  ".$objResult['REQ_NAME'];
		echo "<br/> EMPID         :  ".$objResult['REQ_EMPID'];
		echo "<br/> USERNAME      :  ".$objResult['REQ_UNAME'];
		echo "<br/> EMAIL         :  ".$objResult['REQ_EMAIL'];
		echo "<br/> EMAIL         :  ".$objResult['REQ_TELEPHONE'];
		echo "<br/> DEPTNAME      :  ".$objResult['REQ_DEPTNAME'];
		echo "<br/> SECTION       :  ".$objResult['REQ_SECTION'];
		echo "<br/> ASSETTYPE     :  ".$objResult['Req_ASSETTYPE'];
		echo "<br/> ITCODE        :  ".$objResult['REQ_ITCODE'];
		echo "<br/> ASSETCODE     :  ".$objResult['REQ_ASSETCODE'];
		echo "<br/> PROBLEM       :  ".$objResult['REQ_PROBLEM'];
		echo "<br/> SOLVE         :  ".$objResult['REQ_SOLVED'];
		echo "<br/> LOCATION	  :  ".$objResult['REQ_LOCATION'];
		echo "<br/> SUBLOCATION   :  ".$objResult['REQ_SUBLOCATION'];
		echo "<br/> PRODUCTTYPE   :  ".$objResult['REQ_PRODUCTTYPE'];
		echo "<br/> SERVICETYPE   :  ".$objResult['REQ_SERVICETYPE'];
		echo "<br/> JOBSTATUS     :  ".$objResult['REQ_STATUS'];
		echo "<br/> DATE          :  ".$objResult['REQ_DATE'];
		echo "<br/><br/>";

	*/





    if (!$objResult == null )
	{
		 
			include "mailFunction.php";
			$txtSendMail  = " ITSEVICE NO .".$objResult['REQ_ID']."<br/>";
			$txtSendMail .= " NAME        .".$objResult['REQ_NAME']."<br/>";
			$txtSendMail .= "  STATUS      .".$objResult['REQ_STATUS']."<br/>";

		 //    sendMail($txtSendMail);


    
		
		
		echo "<center>";
		
		$strHTML = "<table width='1000'  border='1' bgcolor='#CCFFCC'>";
		$strHTML .= "<tr>";
		$strHTML .= "<td height='131' colspan='2' bgcolor='#00CCCC' align='center'>Logo</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
		$strHTML .= "<td width='637' height='72' >&nbsp;</td>";
		$strHTML .= "<td width='654' height='72' >";
		$strHTML .= "<table width='100%' border='0'>";
		$strHTML .= "<tr>";
        $strHTML .= "<td width='64%' align='right'>เลขที่ใบแจ้งซ่อม </td>";
		$strHTML .= "<td width='36%' align='right' >".$objResult['REQ_ID']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
		$strHTML .= "<td  align='right' >วันที่ลงทะเบียน </td>";
		$strHTML .= "<td align='right' >".$objResult['REQ_DATE']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "</table></td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
		$strHTML .= "<td height='230' colspan='2'>";
		$strHTML .= "<table width='100%' height='100%' border='1'>";
		$strHTML .= "<tr >";
		$strHTML .= "<td colspan='4' align='center'><font size='3'><b>ข้อมูลของผู้ขอรับบริการ</b></font></td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
		$strHTML .= "<td width='215'>ชื่อ</td>";
		$strHTML .= "<td width='419'>".$objResult['REQ_NAME']."</td>";
		$strHTML .= "<td width='215'>รหัส</td>";
		$strHTML .= "<td width='420'>".$objResult['REQ_EMPID']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
		$strHTML .= "<td>หน่วยงาน</td>";
		$strHTML .= "<td>".$objResult['REQ_DEPTNAME']."</td>";
		$strHTML .= "<td>แผนก</td>";
		$strHTML .= "<td>".$objResult['REQ_SECTION']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
		$strHTML .= "<td>Email</td>";
		$strHTML .= "<td>".$objResult['REQ_MAIL']."</td>";
		$strHTML .= "<td>Telephon</td>";
		$strHTML .= "<td>".$objResult['REQ_TELEPHONE']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "</table></td>";
		$strHTML .= "</tr>";
		//$strHTML .= "<tr>";
		//$strHTML .= "<td>&nbsp;</td>";
		//$strHTML .= "<td>&nbsp;</td>";
		//$strHTML .= "</tr>";
		$strHTML .= "<tr>";
		$strHTML .= "<td colspan='2'>";
		$strHTML .= "<table width='100%' height='100%' border='1'>";
		$strHTML .= "<tr>";
        $strHTML .= "<td colspan='4'  align='center'><font size='3'><b>ข้อมูลอุปกรณ์และปัญหา </b></font></td>";
        $strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td width='218'>IT Code</td>";
        $strHTML .= "<td width='419'>".$objResult['REQ_ITCODE']."</td>";
        $strHTML .= "<td width='217'>ASSET Code</td>";
        $strHTML .= "<td width='419'>".$objResult['REQ_ASSETCODE']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td>Location</td>";
        $strHTML .= "<td>".$objResult['REQ_LOCATION']."</td>";
        $strHTML .= "<td>Sub-Location</td>";
        $strHTML .= "<td>".$objResult['REQ_SUBLOCATION']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td>ประเภทอุปกรณ์</td>";
        $strHTML .= "<td>".$objResult['REQ_PRODUCTTYPE']."</td>";
        $strHTML .= "<td>ประเภทปัญหา</td>";
        $strHTML .= "<td>".$objResult['REQ_SERVICETYPE']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td>รายละเอียดปัญหา</td>";
        $strHTML .= "<td colspan='3'>".$objResult['REQ_PROBLEM']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td>การแก้ไข</td>";
        $strHTML .= "<td colspan='3'>".$objResult['REQ_SOLVED']."</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td>สถานะการแก้ไข</td>";
        $strHTML .= "<td>".$objResult['REQ_STATUS']."</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td>ผู้แก้ไข</td>";
        $strHTML .= "<td>&nbsp;</td>";
        $strHTML .= "<td>เวลาที่แก้ไข</td>";
        $strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
        $strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<tr>";
		$strHTML .= "</table></td>";
		$strHTML .= "</tr>";
		$strHTML .= "<tr>";
		$strHTML .= "<td colspan='2' align='center'><a href='index.php'>กลับสู่หน้าหลัก</a>&nbsp;&nbsp;&nbsp;<a href=''> Print </a></td>";
		//$strHTML .= "<td>&nbsp;</td>";
		$strHTML .= "<tr>";
		$strHTML .= "</table>";


	echo $strHTML;
	echo "</center>";


	}else
	{
		//echo $objResult;
		echo "Cannot  GET  DATA FROM DATABASE";
	}

	

	 ?>


    







<?
 
 // $objQuery = mysql_query($strSQL);

/*
   if(!$objQuery)
	{
		echo "<br/> Save Done.";
	}
	else
	{
		echo "<br/>Error Save [".mysql_error()."]";
	}
*/

?>
</body>
</html>