<?php
session_start();
$username=$_SESSION['registerUserName'];
if($username=="")
{
header("Location:../Login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align="center">
<br /><br /><br /><br />
<span class="style1">Welcome to Paypal.com</span><br />
<br /><br /><br />

</div>
</body>
</html>
