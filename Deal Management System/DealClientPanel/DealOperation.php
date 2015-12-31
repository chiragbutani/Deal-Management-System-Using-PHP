<?php
session_start();
$username=$_SESSION['dealclientUserName'];
if($username=="")
{
header("Location:../Login.php");
}
?><?php include("Top.php");  ?>
<?php
if((!empty($_FILES["myfile"])) && ($_FILES['myfile']['error']==0))
{
	//chk if the file is jpg image and its size is less than 350 kb.
	$fname=basename($_FILES['myfile']['name']);
	$ext=substr($fname,strrpos($fname,'.')+1);
	
	
		$newname=dirname(__FILE__).'/../DealImage/'.$fname;
		
		if(file_exists("../DealImage/".$_FILES["myfile"]["name"]))
		{
			echo $_FILES["myfile"]["name"],"already exists";
			
			
		}
		else
		{
			move_uploaded_file($_FILES['myfile']["tmp_name"],"../DealImage/".$_FILES["myfile"]["name"]);
			echo "<div align='center' style='color:red'>";
			echo "<br/><br/><br/>";
			echo "stored in :"."../DealImage/".$_FILES["myfile"]["name"];
			echo "</div>";
			$DealClientID=$_SESSION['sessdealclientid'];
			$DealName=$_POST['txtDealName'];
			$DealDuration=$_POST['txtDealDuration'];
			$Amount=$_POST['txtDealAmount'];
			$DealDescription=$_POST['txtDealDescription'];
			$DealImage=$fname;
			$DealTime=strftime('%c');
			$UserAllowed=$_POST['txtUserAllowed'];
			$City=$_POST['cmbTables'];
			$Approve='No';		
			$Expired='No';
			$ExpiredTimeDate='None';	
			$host = 'localhost';	
	$userName = 'root';
	$password = '';
	$db = 'deal';

	$conn = mysql_connect($host,$userName,$password) or die ("Connection failed...");
	mysql_select_db($db);
	
	$query="insert into tbl_deal(DealClientID,DealName,DealDuration,Amount,DealDescription,DealImage,DealTime,UserAllowed,City,Approve,Expired,ExpiredDateTime) values ('$DealClientID','$DealName','$DealDuration','$Amount','$DealDescription','$DealImage','$DealTime','$UserAllowed','$City','$Approve','$Expired','$ExpiredTimeDate')";
	//echo $query;
$result2 = mysql_query($query);	
		
		
			if($result2)
			{
				echo "<div align='center' style='color:red'>";
				echo "Your Deal is successfully saved ! Pending for approve.";
				echo "</div>";
				echo "<br/><br/><br/>";
			}
			
		}
	
}
else
{
	echo "Error No File uploded";
}

?>
<?php include("Bottom.php");  ?>