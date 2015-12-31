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
		$query = "Insert into tbl_register (Name,Address,MobileNumber,EmailID,UserName,Password) values ('$Name','$address','$MobileNo','$EmailID','$cusername','$cpassword')";
		
		$result = mysql_query($query);	
		
		$type="registeruser";
		$query1 = "Insert into tbl_commonlogin (UserName,Password,Type,Approve) values ('$cusername','$cpassword','$type','Yes')";
		
		$result1 = mysql_query($query1);	
		
			if($result)
			{
				echo "<div align='center'>";
				echo "<br/><br/><br/><br/><br/><br/>";
				echo "Registration Successfully Completed. !!!";
				echo "<br/><br/>";
				echo "<a href='Login.php'>Login</a>";				
				echo "<br/><br/><br/><br/>";
				echo "</div>";
			}
	}
  ?>
<?php include("Bottom.php"); ?>
