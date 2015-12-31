<?php
session_start();
if($_SESSION['dealclientUserName']!="")
{
	$dealclientusername=$_SESSION['dealclientUserName'];
	echo $dealclientusername;
}
else
{
	header("Location:../Login.php");
	exit();
}
?>
<?php include("Top.php");  ?>
<style type="text/css">
<!--
.style1 {
	font-size: 14pt;
	font-weight: bold;
}
-->
</style>

<form id="form1" name="form1" method="post" action="EditProfile2.php">
  <table width="100%" border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;color:black">
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><div align="center" class="style1">Edit Profile</div></td>
    </tr>
    <tr>
      <td width="50%" align="right">
      <?php
      $host = 'localhost';	
	$userName = 'root';
	$password = '';
	$db = 'deal';


	$conn = mysql_connect($host,$userName,$password) or die ("Connection failed...");
	mysql_select_db($db);
	
	$myquery="select * from tbl_dealclient where UserName='$dealclientusername'";
	
	$myresult=mysql_query($myquery);
	
	while($row4=mysql_fetch_array($myresult,MYSQL_ASSOC))
		{	
			$DealClientID=$row4['DealClientID'];		
			$FirmName=$row4['FirmName'];
			$FirmAddress=$row4['FirmAddress'];

			$MobileNumber=$row4['MobileNumber'];
			$EmailID=$row4['EmailID'];
			$UserName=$row4['UserName'];
			$Password=$row4['Password'];		
		}
		
		mysql_close($conn);
		?>
	</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
   
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left"><input type="text" name="txtClientDetailID" id="txtClientDetailID" value="<?php echo $DealClientID; ?>" style="visibility:hidden" /></td>
    </tr>
    <tr>
      <td width="50%" align="right">Firm Name :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtName" id="txtName" value="<?php echo $FirmName; ?>" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Email ID :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtEmailID" id="txtEmailID" value="<?php echo $EmailID; ?>" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Mobile No :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtMobileNo" id="txtMobileNo" value="<?php echo $MobileNumber; ?>" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Firm Address :</td>
      <td width="50%" align="left"><label>
      <input type="text" name="txtMessage" id="txtMessage" value="<?php echo $FirmAddress; ?>" />
        
      </label></td>
    </tr>
    <tr>
      <td align="right">User Name :</td>
      <td align="left"><label>
        <input type="text" name="txtUserName" id="txtUserName" value="<?php echo $UserName; ?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right">Password :</td>
      <td align="left"><label>
        <input type="text" name="txtPassword" id="txtPassword" value="<?php echo $Password; ?>" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="left"><label>
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      </label></td>
    </tr>
  </table>
</form>
<?php include("Bottom.php");  ?>
