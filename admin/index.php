<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor='#6CF' marginheight="0" marginwidth="0">
 <center> <?php include 'header.php'; ?>
<?php //include 'menu.php'; ?>
 <?php //include 'index.htm'; ?>
 <br><br>
<center><font face="MS Sans Serif" size="6" color="#FF0000">โปรด LOGIN เพื่อเข้าสู่ระบบก่อน</font>
<br><br>
<!-- ใส่ URL ของไฟล์ login.php ลงไปในบรรทัดด้านล่างนี้ครับ -->
<form method=POST action="login.php">
<table>
<tr>
	<td>Username : </td>
	<td><input name="username" type="text" size="20"></td>
</tr>
<tr>
	<td>Password : </td>
	<td><input name="password" type="password" size="20"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="hidden" name="op" value="ds">
		<input type=submit name="submit" value="เข้าสู่ระบบ">
		<input type="reset" value="ลบข้อมูล" name="reset">
    </td>
</tr>
</table>
</form>
</center>
 </center>
</body>
</html>