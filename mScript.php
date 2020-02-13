<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<FORM NAME="formNAME1" id="formID1" method="post" action="mScript.php" onsubmit="showvalue()">
<INPUT NAME="textboxNAME1" TYPE="text" id="textboxID1" value="TEST">
<INPUT TYPE="submit" name="submit1">
</FORM>
<script language=javascript>
var a=document.getElementById("textboxID1");
var b=document.getElementsByName("textboxNAME1");
var c=document.all.formID1.textboxID1;
var d=document.all.formID1[0];
var e=document.all.formID1["textboxNAME1"];
document.write('การอ้างอิงโดยใช้ document.getElementById("textboxID1") มีvalue = '+a.value+"<br>");
document.write('การอ้างอิงโดยใช้ document.getElementsByName("textboxNAME1")[0] มีvalue = '+b[0].value+"<br>");
document.write("การอ้างอิงโดยใช้ document.all.formID1.textboxID1 มีvalue = "+c.value+"<br>");
document.write("การอ้างอิงโดยใช้ document.all.formID1[0] มีvalue = "+d.value+"<br>");
document.write('การอ้างอิงโดยใช้ document.all.formID1["textboxNAME1"] มีvalue = '+e.value+"<br>");
</script>



</body>
</html>