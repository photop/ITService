<?php
session_start();

// ����� User ���ҹ��� Login ��������� (�������� Login ������觵���˹���˹����� URL ŧ令�Ѻ �ç���˹� login.php)
if (!isset($_SESSION[login])) {
     header("Location: login.php");
     exit;
}

?>

<html>

<head>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>�Թ�յ�͹�Ѻ �س <?php echo "$username"; ?> ��Ѻ</title>
</head>

<body bgcolor="#CCFFFF">

<p align="center"><b><font face="MS Sans Serif" size="5" color="#000080">�Թ�յ�͹�Ѻ��Ѻ �س <?php echo "$username"; ?> ��Ѻ
</font></b></p>

<p align="center">&nbsp;</p>
<p align="center">
        <font face="MS Sans Serif" size="2" color="#000080">�˹�ҹ�����</font><font face="MS Sans Serif" size="2" color="#800000">��èзӻ���
        LOGOUT �����¤�Ѻ</font><font face="MS Sans Serif" size="2" color="#000080"> 
        �����������������ҡ�դ���蹷������蹵�ͨҡ��Ҩ�����ö���˹�ҹ�����Ѻ
        ��ǹ�Ըշӡ������Ѻ<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font>
        <font face="MS Sans Serif" size="2" color="#008080">���
        LINK �����价�� URL �ͧ��� logout.php</font><font face="MS Sans Serif" size="2" color="#000080">
        �����ѹ������鹤�Ѻ</font></p>
<p align="center">&nbsp;</p>
<p align="center"><font face="MS Sans Serif" size="1"><a href="logout.php">Logout �͡�ҡ�к�</a></font></p>

</body>

</html>