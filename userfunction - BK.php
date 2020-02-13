<?
		 //mysql_query("SET character_set_results=tis620");
		 //mysql_query("SET character_set_client='tis620'");
         //mysql_query("SET character_set_connection='tis620'");
         //mysql_query("collation_connection = tis620_thai_ci");
         //mysql_query("collation_database = tis620_thai_ci");
         //mysql_query("collation_server = tis620_thai_ci");
   		
			$name=$_POST[txtName];
			$empId=$_POST[txtEmployeeID];
			$depId=$_POST[txtDepartmentID];
			$sectionId=$_POST[txtSectionId];
			$username=$_POST[txtUsername];
			$mail=$_POST[txtEmail];
			$telephone=$_POST[txtTelephone];
			$assetId=$_POST[txtAssetTypeID];
			$proItCode=$_POST[txtProductItCode];
			$proAssId=$_POST[txtProductAssetCode];
			$locationId=$_POST[txtLocationID];
			$sublocationId=$_POST[txtSubLocationId];
			$proTypeId=$_POST[txtProductTypeID];
			$serviceId=$_POST[txtServiceTypeID];
			$problems=$_POST[txtProblemDetail];
			

		/*	echo "<br/> txtName  :  ".$_POST["txtName"];
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

		*/	

/* ########################################
    TEST INSERT DATA FROM    */

include("dbCon.inc.php");

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

	//	echo "<br/>".$strSQL;
	mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL);
	if($objQuery){ 
		//echo "บันทึกข้อมูลซ่อมคอม" ;
		echo "<script type=\"text/javascript\">alert('บันทึกข้อมูลขอใช้บริการ IT Service เรียบร้อยแล้ว') </script>";
		echo "<META HTTP-EQUIV=refresh CONTENT=\"3; URL=index\">";
		}else{

	echo"<H3>ERROR:Not Save</H3>";

		}

	

	function printx()
	{
	   echo "<br/> xxxx";
	}
/*
    function selectRequest()
	{
	
		$strSQL = "SELECT * FROM userrequest WHERE ID =42 ";
			mysql_query("SET NAMES TIS620");
		//echo $strSQL;
		$objQuery  = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		echo "<br/>  ------->   ";
		echo $objResult["NAME"];
	}

*/





    /*
	   ######################################
	                MAIL  FUNCTION
	   ######################################  */

	 function sendMailtest($username,$department,$location)
	{
       /* $txt= "77777777777777777777777777777<br/>888888888888888888888888";
		$username="prachyarak.w";
		$department="IT Center";
		$location="OFFice";
		*/
		require_once('src/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsHTML(true);
		$mail->IsSMTP();
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
		$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
		$mail->Port = 465; // set the SMTP port for the GMAIL server
		$mail->Username = "yorikungk@gmail.com"; // GMAIL username
		$mail->Password = "yoyo1478963"; // GMAIL password
		$mail->From = "itcenter@cklao.com"; // "name@yourdomain.com";
		$mail->AddReplyTo = "itcenter@cklao.com"; // Reply
		//$mail->FromName = "Cattaliya Series(คัทลียาซีรีย์)";
		//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
		$mail->FromName = "ระบบแจ้งซ่อมคอมพิวเตอร";  // set from Name
		$mail->Subject = "IT Request From USER";
		//$mail->Body = "<br>".$txt."<br>";
	//	$mail->Body = "ระบบแจ้งเตือนผู้ใช้งานแจ้งปัญหา IT Service มีรายละเอียดเบื้องต้นดังนี้ <br/>ชื่อผู้แจ้ง".$username."<br/>หน่วยงาน: ".$department."<br/>สถานที่:".$location."<br/><a href='http://".$_SERVER['HTTP_HOST']."/itservice/admin/reqedit.php?reqID='".$id.">Show this request only.</a><br/><br/><br/><a href='http://".$_SERVER['HTTP_HOST']."/itservice/admin/requests.php'>Show All User Request.</a>";

		$mail->Body = "ระบบแจ้งเตือนผู้ใช้งานแจ้งปัญหา IT Service มีรายละเอียดเบื้องต้นดังนี้ <br/>ชื่อผู้แจ้ง".$username."<br/>หน่วยงาน: ".$department."<br/>สถานที่:".$location."<br/><br/><br/><a href='http://".$_SERVER['HTTP_HOST']."/itservice/admin/requests.php'>Show All User Request.</a>";
		//$mail->AddAddress($_POST['mail'], $_POST['mail']); // to Address
		//$mail->AddAddress("prachyarak.w@cklao.com","prachyarak.w@cklao.com"); // to Address
		//$mail->AddAddress("patpong_052@hotmail.com","patpong_052@hotmail.com");
		//$mail->AddAddress("patpong@cklao.com","patpong@cklao.com");
		//$mail->AddAddress("care_tops@yahoo.com","care_tops@yahoo.com");
		//$mail->AddAddress("sanan.k@cklao.com","sanan.k@cklao.com");
		$mail->AddAddress("itcenter@cklao.com","ITCenter XayaburiHPP");

		  $mail->AddAttachment("Attachments/file.jpg");
		  $mail->AddAttachment("Attachments/Car.pdf");
		//$mail->AddAttachment("thaicreate/myfile2.zip");
		$mail->AddCC("prachyarak.w@cklao.com", "Mr.Prachyarak Weangsong"); //CC
		//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

		$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

		//$mail->Send();
		//echo "Ok send";

		if(!$mail->Send()) { 
		   echo 'Message was not sent.'; 
		   echo 'Mailer error: ' . $mail->ErrorInfo; 
		} else { 
		   echo 'Message has been sent.'; 
		} 



	}

?>