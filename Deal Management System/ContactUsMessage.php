<?php include("Top.php"); ?>
 <?php
	$Name=$_POST['txtName'];	
	$EmailID = $_POST['txtEmailID'];
	$MobileNo = $_POST['txtMobileNo'];
	$Description = $_POST['txtMessage']; 
   
	$host = 'localhost';	
	$userName = 'root';
	$password = '';
	$db = 'deal';


	$conn = mysql_connect($host,$userName,$password) or die ("Connection Failed...");
	mysql_select_db($db);

	if(isset($_POST['btnSubmit']))	
	{
		$query = "Insert into tbl_contactus (Name,EmailID,MobileNumber,Message) values ('$Name','$EmailID','$MobileNo','$Description')";
		
		$result = mysql_query($query);	
		
			if($result)
			{
				echo "<div align='center'>";
				echo "<br/><br/><br/><br/><br/><br/>";
				echo "Your Message Sent To Admin Successfully!!!";
				echo "<br/><br/><br/><br/><br/><br/>";
				echo "</div>";
			}
	}
  ?>
<?php include("Bottom.php"); ?>

