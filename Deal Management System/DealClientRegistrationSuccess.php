<?php include("Top.php"); ?>
<?php
	$Name=$_POST['txtName'];	
	$EmailID = $_POST['txtEmailID'];
	$MobileNo = $_POST['txtMobileNo'];
	$address = $_POST['txtMessage']; 
	$cusername=$_POST['txtUserName'];
	$cpassword=$_POST['txtPassword'];
   
	$host = 'localhost';	
	$userName = 'root';
	$password = '';
	$db = 'deal';


	$conn = mysql_connect($host,$userName,$password) or die ("Connection Failed...");
	mysql_select_db($db);

	if(isset($_POST['btnSubmit']))	
	{
	$approve='No';
		$query = "Insert into tbl_dealclient (FirmName,FirmAddress,MobileNumber,EmailID,UserName,Password,Approve) values ('$Name','$address','$MobileNo','$EmailID','$cusername','$cpassword','$approve')";
		
		$result = mysql_query($query);	
		
		$type="dealclient";
		$query1 = "Insert into tbl_commonlogin (UserName,Password,Type,Approve) values ('$cusername','$cpassword','$type','No')";
		
		$result1 = mysql_query($query1);	
		
			if($result)
			{
				echo "<div align='center'>";
				echo "<br/><br/><br/><br/><br/><br/>";
				echo "Registration Successfully Completed. Pending for Approve. !!!";
				echo "<br/><br/>";
				echo "<a href='Login.php'>Login</a>";				
				echo "<br/><br/><br/><br/>";
				echo "</div>";
			}
	}
  ?>

<?php include("Bottom.php"); ?>
