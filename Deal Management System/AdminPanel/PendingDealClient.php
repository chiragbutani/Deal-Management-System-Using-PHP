<?php
session_start();
$username=$_SESSION['adminUserName'];
if($username=="")
{
header("Location:../Login.php");
}

?>
<?php include("Top.php"); ?>
<style type="text/css">
<!--
.style1 {
	font-size: 14pt;
	font-weight: bold;
}
-->
</style>

<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt">
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><div align="center" class="style1">Deal Client</div></td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="50%" align="right">Select ID to approve :</td>
      <td width="50%" align="left">
      <?php
           $dbhost='localhost';
	$dbuser='root';
	$password='';
	$dbname='deal';
	$conn = mysql_connect($dbhost,$dbuser,$password) or die ('Error connectiong to my sql');
	mysql_select_db($dbname);
	$qq = 'select DealClientID from tbl_dealclient where Approve="No"';	
	$result33 =mysql_query($qq);
	echo '<select name="cmbTables" id="cmbTables">';
	while($row1=mysql_fetch_array($result33))
	{
	
	echo '<option value ='.$row1[0].' >'.$row1[0].'</option>';	
	}
	echo '</select>';
	
	
           ?> 
      
      
      <label>
      <input type="submit" name="btnUpdate" id="btnUpdate" value="Update" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">
      <?php
	  
	  if(isset($_POST['btnUpdate']))	
	{
	$ID=$_POST['cmbTables'];
		$query2 = "update tbl_dealclient set Approve='Yes' where DealClientID=".$ID;	
		$result2 = mysql_query($query2);	
		
		$query3="select UserName from tbl_dealclient where DealClientID=".$ID;
		$result3=mysql_query($query3);
		while($row=mysql_fetch_array($result3))
		{
			$dealclientuser = $row['UserName'];
			echo $dealclientuser;
		}
		$query4="update tbl_commonlogin set Approve='Yes' where UserName='$dealclientuser'";
		$result4=mysql_query($query4);
		
		
		
		
			if($result2)
			{
				echo "<div align='center' style='color:red'>";
				echo "Record Updated";
				echo "</div>";
			}
	}
	  
	  ?>
      
      </td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><div align="center">
      <?php
$host = 'localhost';
	$User = 'root';
	$pass = '';
	$db = 'deal';

	$conn = mysql_connect($host,$User,$pass) or die ("Connection Failed...");
	mysql_select_db($db);
           $query11 = 'select * from tbl_dealclient where Approve="No"';
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
      
      
      
      </div></td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
  </table>
</form>
<?php include("Bottom.php"); ?>
