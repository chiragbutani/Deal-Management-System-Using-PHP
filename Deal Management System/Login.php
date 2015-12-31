<?php
session_start();
?>
<?php
unset($_SESSION['UserName']);
if(isset($_POST['btnSubmit']))	
{
	$UserName = $_POST['txtUserName'];
	$Password = $_POST['txtPassword'];
	$errormsg = '';	
	$host = 'localhost';
	$User = 'root';
	$pass = '';
	$db = 'deal';
	$conn = mysql_connect($host,$User,$pass) or die ("Connection Failed...");
	mysql_select_db($db);	
	$query = "select * from tbl_commonlogin where UserName='$UserName' and Password='$Password' and Approve='Yes'";	
	$result = mysql_query($query);	
	if($row = mysql_fetch_array($result,MYSQL_ASSOC))
	{
		if($UserName==$row['UserName'] && $Password==$row['Password'])
		{
			if(isset($UserName) && isset($Password))
			{
				$type=$row['Type'];				
				$unm=$row['UserName'];
					if($type=='dealclient')
					{					
					$_SESSION['dealclientUserName']=$unm;					
					header("Location:DealClientPanel/ClientHome.php");
					exit();					
					}
					
					if($type=="admin")
					{					
					$_SESSION['adminUserName']=$unm;					
					header("Location:AdminPanel/AdminHome.php");
					exit();
					}					
					if($type=="registeruser")
					{
					$_SESSION['registerUserName']=$unm;
					header("Location:UserPanel/UserHome.php");
					exit();
					}					
			}
		}
	}
	else
	{		
		$errormsg = 'Sorry, You have to Entered Wrong UserName OR Password.. OR Pending for approve..';
			
	}
}
?> <?php include("Top.php"); ?>
<form id="form1" name="form1" method="post" action="Login.php">
  <table width="100%" border="0" style="font-family:Verdana, Geneva, sans-serif; font-size:10pt;color:black">
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr align="right">
      <td colspan="2" style="font-size:18pt"  align="center"><strong>Login</strong></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="50%" align="right">User Name :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtUserName" id="txtUserName" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Password :</td>
      <td width="50%" align="left"><label>
        <input type="password" name="txtPassword" id="txtPassword" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label>
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      </label></td>
    </tr>    
      <td width="50%" align="right">      </td>
      <td width="50%" align="left"><a href="UserRegistration.php">Sign Up</a></td>
    </tr>   
      <td colspan="2" align="right"><div align="center">     
	  <?php 
	  error_reporting(0);
	  if($errormsg != "")
	  {
      echo "Sorry, You have to Entered Wrong UserName OR Password.. OR Pending for approve.."; 
	  }
	  ?>
      
      </div></td>
      </tr>
  </table>
</form>
<?php include("Bottom.php"); ?>