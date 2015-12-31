<?php
session_start();
if($_SESSION['sessregisterid']!="")
{
$registerid=$_SESSION['sessregisterid'];
	//echo $registerid;
}
else
{
	header("Location:../Login.php");
	exit();
}
?>
<?php include("Top.php"); ?>
<?php
$id=$_GET['val'];
echo $id;
$DealTime=strftime('%c');

$host = 'localhost';	
	$userName = 'root';
	$password = '';
	$db = 'deal';

	$conn = mysql_connect($host,$userName,$password) or die ("Connection failed...");
	mysql_select_db($db);
	
	$query1="select * from tbl_deal where DealID=".$id;
	//echo $query1;
	$result1=mysql_query($query1);
	while($row1=mysql_fetch_array($result1))
	{
		$userallowed=$row1['UserAllowed'];
		//echo $userallowed;
	}
	
	$query2="select count(*) as total from tbl_dealdetails where DealID=".$id;
	//echo $query2;
	$result3=mysql_query($query2);
	while($row3=mysql_fetch_array($result3))
	{
		$totaluser=$row3["total"];
		//echo $totaluser;
	}
	
	if($totaluser<$userallowed)
	{
	
	
	$query="insert into tbl_dealdetails (RegisterID,DealID,DealDetailsTimeDate) values ('$registerid','$id','$DealTime')";
$result2 = mysql_query($query);	
		
		
			if($result2)
			{
				echo "<div align='center' style='color:red'>";
				echo "Record Saved";
				echo "<br/><br/>";
				echo "<a href='Cashout.php'>Cash Out</a>";
				
				echo "</div>";
			}
			
	}
	else
	{
		echo "This deal is Expired";
		$query4="update tbl_deal set Expired='Yes', ExpiredDateTime='$DealTime' where DealID='$id'";
//		insert into tbl_expiereddeal(DealID,ExpieredTimeDate) values ('$id','$DealTime')";
$result4 = mysql_query($query4);

$query55="select * from tbl_deal where DealID=".$ID;
		$result55=mysql_query($query55);
		while($row=mysql_fetch_array($result55))
		{
			$dealclientid=$row['DealClientID'];

		}
		
		$query66="select * from tbl_dealclient where DealClientID=".$dealclientid;
		$result66=mysql_query($query66);
		while($row99=mysql_fetch_array($result66))
		{
			$email=$row99['EmailID'];
			$to =$email;
$subject = "Deal Expired";
$message = "Hello! Deal Client Your deal has been Expired"; 
$from = "trishul@getdeal.com";
$headers = "From:" . $from;
//mail($to,$subject,$message,$headers);
echo "Mail Sent.";
		}
		}
?>
<?php include("Bottom.php"); ?>