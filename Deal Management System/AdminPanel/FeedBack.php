<?php
session_start();
$username=$_SESSION['adminUserName'];
if($username=="")
{
header("Location:../Login.php");
}

?>
<?php include("Top.php"); ?>
<?php

echo "<br/><br/><br/>";echo "<div align='center'>";

echo "Feed Back";
echo "<br/><br/><br/>";
echo "</div>";
 $dbhost='localhost';
	$dbuser='root';
	$password='';
	$dbname='deal';
	$conn = mysql_connect($dbhost,$dbuser,$password) or die ('Error connectiong to my sql');
	mysql_select_db($dbname);
           $query11 = 'select * from tbl_feedback';
	$result11 = mysql_query($query11);
	$cols = mysql_num_fields($result11);
	echo "<form><table border=1 bgcolor=\"pink\">\n";
	echo "<tr>";
	for($i=0;$i<$cols;$i++)
	{
		echo '<th align=center>'.mysql_field_name($result11,$i).'</th>';
	}
	echo "</tr>";
	while($row11=mysql_fetch_array($result11,MYSQL_ASSOC))
	{
		print "<tr>";
		for($i=0;$i<$cols;$i++)
		{
			echo '<td>'.$row11[mysql_field_name($result11,$i)].'</td>';
		}
	}
	print "</tr></table></form>";
	
	mysql_close($conn);
	?>
<?php include("Bottom.php"); ?>