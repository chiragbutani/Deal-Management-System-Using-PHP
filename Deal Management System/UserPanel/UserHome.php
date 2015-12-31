<?php
session_start();
include("Top.php");
$username=$_SESSION['registerUserName'];
if($username=="")
{
header("Location:../Login.php");
}
echo "<div style='text-align:center'>";
echo "<br/><br/><br/><br/><br/><br/>";
echo "welcome, ".$username;
echo "<br/><br/><br/><br/><br/><br/>";
echo "</div>";
 $dbhost='localhost';
	$dbuser='root';
	$password='';
	$dbname='deal';
	$conn = mysql_connect($dbhost,$dbuser,$password) or die ('Error connectiong to my sql');
	mysql_select_db($dbname);
$query = "select * from tbl_register where UserName='$username'";
//echo $query;
	$result = mysql_query($query);
	
	if($row = mysql_fetch_array($result,MYSQL_ASSOC))
	{
	$registerid=$row['RegisterID'];
	$_SESSION['sessregisterid']=$registerid;
	//echo $dealclientid;
	}

?>

<?php include("Bottom.php"); ?>