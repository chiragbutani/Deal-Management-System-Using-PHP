function ValidateForm(frmForm)
{
	var v;
	var colElements = frmForm.elements;
	for(var i=0;i<colElements.length;i++)
	{
		v=colElements[i].required;
		if(v=="true")
		{
			if(!ValidateRequired(colElements[i]))
			return false;
		}
	}
	return true;
}
function ValidateRequired(txtRequired)
{
	if(!txtRequired.value.length)
	{
		alert("blank filled not allowed.. ");
		txtRequired.focus();
		return false;
	}
	return true;
}



function cheakemail(txtEmailID)
{
	
	var s,l;
	s=document.getElementById("txtEmailID").value;
	var newstring =new String (s);
	var ans,ans1;
	ans=0,ans1=0;
	l=newstring.length;
	for(i=0;i<l;i++)
	{
		if(newstring.charAt(i)=="@")
			ans=ans+1;
		else
			if(newstring.charAt(i)==".")
			ans1=ans1+1;
			
	}
	
	if(!((ans==1 && ans1>=1) && l>7))
	{
		alert("Plz enter valid email ID ");
		document.form1.txtEmailID.value="";
		document.form1.txtEmailID.focus();
	}
}

function cheaknan(txtMobileNo)
{
	
	if(isNaN(document.form1.txtMobileNo.value))
	{
		alert("allowed numbers only");
		document.form1.txtMobileNo.focus();
		document.form1.txtMobileNo.value="";
	
	}
}

function feb(txtDate)
{
	return((txtDate%4==0)?29:28);
}
function monthvalidation(x)
{
	if(x<1||x>12)
	return false;
	else
	return true;
}
function dayvalidation(x,y,z)
{
	if(y==2)
	{
		if(x>feb(z))
		return false;
		else
		return true;		
	}
	if(y==1||y==3||y==5||y==7||y==8||y==10||y==12)
	{
		if(x>31)
		return false;
		else
		return true;
	}
	if(y==4||y==6||y==9||y==11)
	{
		if(x>30)
		return false;
		else
		return true;
	}
}
function checkdate(txtDate)
{
	var dd;
	var mm;
	var yyyy;
	var s;
	s=txtDate.value.split("-");
	dd=s[0];
	mm=s[1];
	yyyy=s[2];
	if(dd.length>2)
	{
		s=txtDate.value.split("/");
		dd=s[0];
		mm=s[1];
		yyyy=s[2];
	}
	if(dd==null||dd<=0||mm==null||mm<=0||yyyy==null||yyyy<=0)
	{
		alert("invalid date");
		return false;
	}
	var dim1=monthvalidation(mm);
	var dim2 = dayvalidation(dd,mm,yyyy);
	var dim3 = yearvalidation(yyyy);
	if(!(dim1&&dim2&&dim3))
	{
		alert("invalid date")
		txtDate.value="";
		txtDate.focus();
	}
}
function yearvalidation(x)
{
	if(x<1988 || x>2100)
	return false;
	else
	return true;
}