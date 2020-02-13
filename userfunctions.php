<?

	/*  
	#######  USER FUNCTION    ########
	##################################
	*/
		function sayhi()
		{
			echo "HelloHelloHelloHelloHelloHello";
		}
		
		//#######  Insert new request   ######## 
		function addNewRequest($name,$empId,$username,$mail,$telephone,$depId,$sectionId,$assetId,$proItCode,$proAssId,$problems,$locationId,$sublocationId,$proTypeId,$serviceId)
		{
			$strSQL  = "INSERT INTO userrequest ";
			$strSQL .="(Name,EMPLOYEEID,USERNAME,EMAIL,TELEPHONE,DEPARTMENT_ID,SECTION_ID,ASSET_TYPE,PRODUCT_ITCODE,PRODUCT_ASSETCODE,Problem_detail,";
			$strSQL .="LOCATION_ID,SUBLOCATION_ID,Product_Type_ID,Service_Type_ID,JOB_STATUS,REQ_DATETIME) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$name."','".$empId."' ";
			$strSQL .=",'".$username."' ,'".$mail."' ";
			$strSQL .=",'".$telephone."' ,'".$depId."' ";
			$strSQL .=",'".$sectionId."' ,'".$assetId."' ";
			$strSQL .=",'".$proItCode."' ,'".$proAssId."' ";
			$strSQL .=",'".$problems."' ,'".$locationId."' ";
			$strSQL .=",'".$sublocationId."' ,'".$proTypeId."' ";
			//$strSQL .=",'".$proTypeId."' ";
			$strSQL .=",'".$serviceId."','1',now()) ";

			//echo "<br/>".$strSQL;
		
			mysql_query("SET NAMES UTF8");
			$objQuery = mysql_query($strSQL);    
			$last_id = mysql_insert_id();   //  Get Last id insert from DATABASE
			//echo "<br> ---->  ".$last_id."<br/>";
			if($objQuery){ 
				return $last_id;
			}else{
				echo mysql_error();
				return null;
			}
			
		}
		//#######  Get Data after insert   ######## 
		function getRequestInfo($requestId)
		{
			
		}		
		function getDepartmentInfo($departmentId)
		{
			$sql =" select department_NAME as DEPTNAME from department where department_ID = ".$departmentId;
			$objQuery  = mysql_query($sql);
			$result= mysql_fetch_assoc($objQuery);
			 return  $result[DEPTNAME];
			
		}
		function getLocation($locationId)
		{
			$sql =" select LOCATION_NAME as LOCATIONNAME from LOCATION where location_ID = ".$locationId;
			$objQuery  = mysql_query($sql);
			$result= mysql_fetch_assoc($objQuery);
			 return  $result[LOCATIONNAME];
			
		}
		//#######  Search   ######## 
		function searchNormal($keyword)
		{
			$strSQL  =" SELECT  ";
			$strSQL .="userrequest.ID as REQ_ID , ";
			$strSQL .="userrequest.NAME as REQ_NAME , ";
			$strSQL .="DATE_FORMAT(userrequest.REQ_DATETIME, '%d/%m/%Y')  as REQ_DATE , ";
			$strSQL .="job_status.JOB_STATUS_NAME as REQ_STATUS  ";
			$strSQL .=" FROM ";
			$strSQL .="userrequest , job_status ";
			$strSQL .=" WHERE ";
			$strSQL .=" userrequest.ID LIKE  '%".trim($keyword)."%' ";
			$strSQL .=" OR ";
			$strSQL .=" userrequest.USERNAME LIKE  '%".trim($keyword)."%' ";
			$strSQL .=" GROUP BY userrequest.ID ";
			
			echo $strSQL."<br/>";
			
			$objQuery  = mysql_query($strSQL);
			$objCount  = mysql_num_rows($objQuery);
			$array = mysql_fetch_assoc($objQuery);
				//while($row = mysql_fetch_assoc($objQuery)) $array[]=$row;
			return $array;
		}

	/*  
	#######  MAIL FUNCTION    ########
	##################################
	*/

		function  mailtoService($username,$department,$location)
		{
			require_once("src/class.phpmailer.php");
			//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

			$mail             = new PHPMailer();

			//$body             = file_get_contents('contents.html');
			//$body             = preg_replace('/[\]/','',$body);

			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = "webmail.cklao.com"; // SMTP server
		//	$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only

			$mail->SetFrom('noreply@cklao.com', 'IT Service System');

			//$mail->AddReplyTo("prachyarak.w@cklao.com","ENG-IT");

			$mail->Subject    = "Alert from Custermer Service System";

			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			// Customize Body in your mail
			$body="ระบบแจ้งเตือนผู้ใช้งานแจ้งปัญหา IT Service มีรายละเอียดเบื้องต้นดังนี้ <br/>ชื่อผู้แจ้ง".$username."<br/>หน่วยงาน: ".$department."<br/>สถานที่:".$location."<br/><br/><br/><a href='http://".$_SERVER['HTTP_HOST']."/itservice/admin/requests.php'>Show All User Request.</a>";
		//	echo "<br/>".$body;
			
		//	$body="xxx";
			$mail->MsgHTML($body);

			$address = "itcenter@cklao.com";
			$mail->AddAddress($address, "ITCenter");

		//	$mail->AddAttachment("images/phpmailer.gif");      // attachment
		//	$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

			if(!$mail->Send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
			  
			} else {
			 // echo "mail Send";
			  
			}
		}
?>