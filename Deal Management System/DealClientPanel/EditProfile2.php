<?php
session_start();
$username=$_SESSION['dealclientUserName'];
if($username=="")
{
header("Location:../Login.php");
}
?>
<?php include("Top.php");  ?>
<?php
$host = 'localhost';	
	$userName = 'root';
	$password = '';
	$db = 'deal';


	$conn = mysql_connect($host,$userName,$password) or die ("Connection failed...");
	mysql_select_db($db);
$DealClientID=$_POST['txtClientDetailID'];	
			$FirmName=$_POST['txtName'];
			$FirmAddress=$_POST['txtMessage'];
			$MobileNumber=$_POST['txtMobileNo'];
			$EmailID=$_POST['txtEmailID'];
			$UserName=$_POST['txtUserName'];
			$Password=$_POST['txtPassword'];

		$query2 = "update tbl_dealclient set FirmName='$FirmName',FirmAddress='$FirmAddress',MobileNumber='$MobileNumber',EmailID='$EmailID',UserName='$UserName',Password='$Password' where DealClientID='$DealClientID'";
		
		$result2 = mysql_query($query2);	
		
		
			if($result2)
			{
				echo "<div align='center' style='color:red'>";
				echo "Record Updated";
				echo "</div>";
			}
	
?>
<?php include("Bottom.php");  ?>