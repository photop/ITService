<?php

session_start();
session_destroy();

// ��� URL �ͧ˹�ҷ���ͧ������� ��ѧ�ҡ�ӡ�� Logout ���� ŧ令�Ѻ �ç���˹�  login.php)
header("Location: login.php");

?>