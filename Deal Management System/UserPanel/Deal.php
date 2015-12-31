<?php
session_start();
$username=$_SESSION['registerUserName'];
if($username=="")
{
header("Location:../Login.php");
}
?>
<?php include("Top.php"); ?>
<style type="text/css">
.style1 {
	font-size: 14pt;
	font-weight: bold;
}
</style>
<form id="form1" name="form1" method="post" action="Deal.php">
  <table width="100%" border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt">
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><div align="center" class="style1">Deal of the Day</div></td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="50%" align="right">Select City :</td>
      <td width="50%" align="left">
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
	echo '<option value ="">--- Plese select ---</option>';
	while($row1=mysql_fetch_array($result33))
	{
	//if($row1[0]==$_POST['cmbTables'])
//	{
//	echo '<option value ='.$row1["CityID"].' selected>'.$row1["CityName"].'</option>';	
//	}
//	else
	//{
echo '<option value ='.$row1["CityID"].' >'.$row1["CityName"].'</option>';	
	//}
	}
	
	
	
	echo '</select>';
	
	
           ?>
      
      <label>
      <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      </label></td>
    </tr>
   
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
  </table>
</form>

<?php
if(isset($_POST['cmbTables']))
{
$city=$_POST['cmbTables'];
}
else
{
$city="Ahmedabad";
}

$query = "select * from tbl_deal where approve='Yes' and City='$city' and Expired='No'";	
//echo $query;
		

		$result = mysql_query($query);
		echo '<table border=1 width=100%>';
		echo '<tr><td>Deal ID</td>';
		echo '<td>Deal Logo</td>';
		echo '<td>Deal Name</td>';
		echo '<td>Deal Amount</td>';
		echo '<td>Deal Description</td>';
		echo '<td>User Allowed</td>';
		echo '<td>Buy Deal</td></tr>';
		while($row=mysql_fetch_array($result,MYSQL_ASSOC))
		{
		$mg=$row['DealImage'];
		echo '<tr><td>'.$row["DealID"].'</td>';
		echo '<td><img src="../DealImage/'.$mg.'" width="100px" height="100px"></td>';
		echo '<td>'.$row["DealName"].'</td>';
		echo '<td>Rs. '.$row["Amount"].'</td>';
		echo '<td>'.$row["DealDescription"].'</td>';
		echo '<td>'.$row["UserAllowed"].'</td>';
		echo '<td><a href="GetDeal.php?val='.$row["DealID"].'" target="_blank">Buy Deal</a></td></tr>';
			
		}
echo '</table>';
		
		
		mysql_close($conn);
		
	
  ?>
<?php include("Bottom.php"); ?>
