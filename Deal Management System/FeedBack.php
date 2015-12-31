<style type="text/css">
<!--
.style1 {
	font-size: 14pt;
	font-weight: bold;
}
-->
</style>

<?php include("Top.php"); ?>
<form id="form1" name="form1" method="post" action="FeedBackMessage.php" onsubmit="return ValidateForm(form1)">
  <table width="100%" border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;color:black">
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><div align="center" class="style1">Feedback Form</div></td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><div align="center">
        <p>&nbsp;</p>
      </div></td>
    </tr>
    <tr>
      <td width="50%" align="right">&nbsp;</td>
      <td width="50%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="50%" align="right">Name :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtName" id="txtName"  required="true"/>
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Email ID :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtEmailID" id="txtEmailID" required="true" onblur="cheakemail(txtEmailID)"/>
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Mobile No :</td>
      <td width="50%" align="left"><label>
        <input type="text" name="txtMobileNo" id="txtMobileNo" required="true" onblur="cheaknan(txtMobileNo)"/>
      </label></td>
    </tr>
    <tr>
      <td width="50%" align="right">Message :</td>
      <td width="50%" align="left"><label>
        <textarea name="txtMessage" cols="50" rows="6" id="txtMessage" required="true"></textarea>
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
<?php include("Bottom.php"); ?>
