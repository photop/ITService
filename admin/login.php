<?php
session_start();

if ($_POST[op] != "ds") {
	$display_block = "
		<center><form method=POST action=\"$_SERVER[PHP_SELF]\">
		<table>
			<tr>
				<td>Username :</td>
				<td><input name=\"username\" type=\"text\" size=\"20\"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input name=\"password\" type=\"password\" size=\"20\"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type=\"hidden\" name=\"op\" value=\"ds\">
					<input type=submit name=\"submit\" value=\"เข้าสู่ระบบ\">
                    <input type=\"reset\" value=\"ลบข้อมูล\" name=\"reset\">
				</td>
			</tr>
		</table>
	    </form></center>";

} else {
		include 'config.php';
		if ($_POST['username'] == "$adminuser" AND $_POST['password'] == "$adminpass") {
			$_SESSION[login] = "true";
			$_SESSION[username] = "$adminuser";
			header("Location: $redirectpage");
        		exit;
		} else {
		        $display_block = "<center><font face=\"MS Sans Serif\" size=\"3\">คุณกรอก Username หรือ Password ผิดพลาดครับ โปรด กลับไปกรอกใหม่อีกครั้งครับ <a href=\"$_SERVER[PHP_SELF]\">กลับไปกรอกใหม่ คลิ๊กที่นี่</a></font></center>";
		}
}

?>

<!-- เริ่มต้น Code HTML ไว้แก้ไขรูปแบบหน้าตาของหน้านี้ -->
<html>
<head>
<title>โปรด LOGIN เพื่อเข้าสู่ระบบก่อน</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
body, td
{
	font-family: Ms San Serif;
	font-size: 14pt;
}
</style>
</head>

<body bgcolor="#FFFFCC">
<br><br>
<center><font face="MS Sans Serif" size="6" color="#FF0000">โปรด LOGIN เพื่อเข้าสู่ระบบก่อน</font></center>
<br><br>

<!-- หากต้องการให้แสดง FORM ไว้ LOGIN ที่ไหนก็นำ CODE บรรทัดด้านล่างไปไว้ที่นั่นครับ -->
<?php echo "$display_block"; ?>

</body>
</html>
<!-- สิ้นสุด Code HTML ไว้แก้ไขรูปแบบหน้าตาของหน้านี้ -->