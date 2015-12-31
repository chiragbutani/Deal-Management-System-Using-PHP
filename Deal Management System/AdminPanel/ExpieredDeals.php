<?php
session_start();
$username=$_SESSION['adminUserName'];
if($username=="")
{
header("Location:../Login.php");
}

?>
<?php include("Top.php"); ?>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt">
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><div align="center" class="style1">Expired Deals</div></td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    
    <tr>
      <td width="50%" align="right">
      
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
           $query11 = 'select * from tbl_deal where Expired="Yes"';
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
