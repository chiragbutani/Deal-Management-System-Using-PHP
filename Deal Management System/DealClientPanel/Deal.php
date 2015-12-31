<?php
session_start();
$username=$_SESSION['dealclientUserName'];
if($username=="")
{
header("Location:../Login.php");
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

<form action="DealOperation.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt">
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><div align="center" class="style1">Deal</div></td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="50%" align="right">Deal Name :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtDealName" id="txtDealName" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Deal Duration :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtDealDuration" id="txtDealDuration" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Amount :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtDealAmount" id="txtDealAmount" />
      (In Rs.)</label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Deal Description :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtDealDescription" id="txtDealDescription" />
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Select Photo :</td>
      <td width="50%" align="left"><label>
        <input type="file" name="myfile" id="myfile" />
      </label></td>
    </tr>
    
    <tr>
      <td width="50%" align="right">User Allowed :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtUserAllowed" id="txtUserAllowed" />
      </label></td>
    </tr>
    <tr>
      <td align="right">City :</td>
      <td align="left">
       <?php
           $dbhost='localhost';
	$dbuser='root';
	$password='';
	$dbname='deal';
	$conn = mysql_connect($dbhost,$dbuser,$password) or die ('Error connectiong to my sql');
	mysql_select_db($dbname);
	$qq = 'select * from tbl_city';	
	$result33 =mysql_query($qq);
	echo '<select name="cmbTables" id="cmbTables">';
	while($row1=mysql_fetch_array($result33))
	{
	
	echo '<option value ='.$row1["CityID"].' >'.$row1["CityName"].'</option>';	
	}
	echo '</select>';
	
	
           ?>      </td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="left">&nbsp;</td>
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