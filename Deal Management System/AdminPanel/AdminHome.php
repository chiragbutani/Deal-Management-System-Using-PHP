<?php
session_start();
include("Top.php"); 
$username=$_SESSION['adminUserName'];
if($username=="")
{
header("Location:../Login.php");
}

echo "<div style='text-align:center'>";
echo "<br/><br/><br/><br/><br/><br/>";
echo "welcome,".$username;
echo "<br/><br/><br/><br/><br/><br/>";
echo "</div>";
$host = 'localhost';
	$User = 'root';
	$pass = '';
	$db = 'deal';
	$conn = mysql_connect($host,$User,$pass) or die ("Connection Failed...");
	mysql_select_db($db);
$query = "select * from tbl_commonlogin where UserName='$username'";
	$result = mysql_query($query);	
	if($row = mysql_fetch_array($result,MYSQL_ASSOC))
	{
	$commonloginid=$row['CommonLoginID'];
	$_SESSION['sesscommonid']=$commonloginid;
	}
	mysql_close($conn);
?>
<?php include("Bottom.php"); ?>


