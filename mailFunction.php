<?

function sendMail($txt)
	{

		require_once('src/class.phpmailer_.php');
		$mail = new PHPMailer();
		$mail->IsHTML(true);
		$mail->IsSMTP();
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
		$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
		$mail->Port = 465; // set the SMTP port for the GMAIL server
		$mail->Username = "prachyarak@gmail.com"; // GMAIL username
		$mail->Password = "Pr@chYar0k"; // GMAIL password
		$mail->From = "itcenter@cklao.com"; // "name@yourdomain.com";
		$mail->AddReplyTo = "itcenter@cklao.com"; // Reply
		//$mail->FromName = "Cattaliya Series(คัทลียาซีรีย์)";
		//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
		$mail->FromName = "ปรัชญารัก เวียงสงค์ (PRACHYARAK WEANGSONG)";  // set from Name
		$mail->Subject = "ทดสอบส่ง Mail From Web Application Code ";
		$mail->Body = "<br>".$txt."<br>";

		//$mail->AddAddress($_POST['mail'], $_POST['mail']); // to Address
		$mail->AddAddress("prachyarak.w@cklao.com","prachyarak.w@cklao.com"); // to Address
		//$mail->AddAddress("patpong_052@hotmail.com","patpong_052@hotmail.com");
		//$mail->AddAddress("patpong@cklao.com","patpong@cklao.com");
		//$mail->AddAddress("care_tops@yahoo.com","care_tops@yahoo.com");
		//$mail->AddAddress("sanan.k@cklao.com","sanan.k@cklao.com");
		//$mail->AddAddress("itcenter@cklao.com","itcenter@cklao.com");

		//$mail->AddAttachment("thaicreate/myfile.zip");
		//$mail->AddAttachment("thaicreate/myfile2.zip");
		//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
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


<html>
<body>

	<?  //sendMail("xxxxxxxxxxxxxxxx"); ?>
</body>
</html>