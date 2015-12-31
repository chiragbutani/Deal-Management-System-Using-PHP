<?php 
session_start();
$username=$_SESSION['adminUserName'];
if($username=="")
{
header("Location:../Login.php");
}
include("Top.php"); ?>
<form id="form1" name="form1" method="post" action="AdminUsers.php">
<table width="100%" border="0">
  <tr>
    <td colspan="2" align="right"><div align="center" class="style1">Admin Users</div></td>
  </tr>
  <tr>
    <td colspan="2" align="right">
    <?php

	
   
	$host = 'localhost';	
	$userName = 'root';
	$password = '';
	$db = 'deal';


	$conn = mysql_connect($host,$userName,$password) or die ("Connection failed...");
	mysql_select_db($db);

	if(isset($_POST['btnDelete']))	
	{
		$ID=$_POST['cmbTables'];
	$ausername=$_POST['txtCastName'];
	$apassword=$_POST['txtPassword'];
		$query = "delete from tbl_admin where AdminID=".$ID;
		
		$result = mysql_query($query);	
		
		
		
			if($result)
			{
				echo "<div align='center' style='color:red'>";
				echo "Record Deleted";
				echo "</div>";
			}
	}
	if(isset($_POST['btnSave']))	
	{$ID=$_POST['cmbTables'];
	$ausername=$_POST['txtCastName'];
	$apassword=$_POST['txtPassword'];
		$query1 = "insert into tbl_admin (UserName,Password) values ('$ausername','$apassword')";
		
		$result1 = mysql_query($query1);
		
		$type='admin';
		$query122 = "insert into tbl_commonlogin (UserName,Password,Type,Approve) values ('$ausername','$apassword','$type','Yes')";
		
		$result122 = mysql_query($query122);	
		
		
			if($result1)
			{
				echo "<div align='center' style='color:red'>";
				echo "Record Saved";
				echo "</div>";
			}
	}
	if(isset($_POST['btnUpdate']))	
	{
		$ID=$_POST['cmbTables'];
	$ausername=$_POST['txtCastName'];
	$apassword=$_POST['txtPassword'];
		$query2 = "update tbl_admin set UserName='$ausername',Password='$apassword' where AdminID=".$ID;
		
		$result2 = mysql_query($query2);
		$commonid=$_SESSION['sesscommonid'];
		//echo $commonid;
		//commonlgoin id username thi fetch karo...
		$query222 = "update tbl_Commonlogin set UserName='$ausername',Password='$apassword' where CommonLoginID=".$commonid;
		//echo $query222;
		
		$result222 = mysql_query($query222);		
		
		
			if($result2)
			{
				echo "<div align='center' style='color:red'>";
				echo "Record Updated";
				echo "</div>";
			}
	}
  ?>    </td>
  </tr>
  <tr>
    <td width="50%" align="right">Select ID :</td>
    <td width="50%" align="left">
    <?php
           $dbhost='localhost';
	$dbuser='root';
	$password='';
	$dbname='deal';
	$conn = mysql_connect($dbhost,$dbuser,$password) or die ('Error connectiong to my sql');
	mysql_select_db($dbname);
	$qq = 'select AdminID from tbl_admin';	
	$result33 =mysql_query($qq);
	echo '<select name="cmbTables" id="cmbTables">';
	while($row1=mysql_fetch_array($result33))
	{
	
	echo '<option value ='.$row1[0].' >'.$row1[0].'</option>';	
	}
	echo '</select>';
	
	
           ?>    </td>
  </tr>
  <tr>
    <td width="50%" align="right">User Name :</td>
    <td width="50%" align="left"><label>
      <input type="text" name="txtCastName" id="txtCastName" />

    </label></td>
  </tr>
  <tr>
    <td width="50%" align="right">Password :</td>
    <td width="50%" align="left"><label>
      <input type="text" name="txtPassword" id="txtPassword" />
    </label></td>
  </tr>
  <tr>
    <td width="50%" align="right">&nbsp;</td>
    <td width="50%" align="left"><label>
      <input type="submit" name="btnSave" id="btnSave" value="Save" />
      <input type="submit" name="btnUpdate" id="btnUpdate" value="Update" />
      <input type="submit" name="btnDelete" id="btnDelete" value="Delete" />
    </label></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="right"><div align="center">
    <?php
           $query11 = 'select * from tbl_admin';
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
</table>
</form>

<?php include("Bottom.php"); ?>
