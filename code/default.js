// JavaScript Document of functions for form  validations inputs
//Global variables
var error=[];
var msg=[];
var submit = document.getElementById("submit");
//////check name function/////
function checkname(input_field)
		{
			var temp=input_field;
			var tst=/^[A-Za-z\s]+$/;//Regular Expression
			msg["name"]="";
			if(temp.value=="" || temp.value==null )//on empty
			{
			  temp.style.background="red";
			  error["name"]=1;
			  msg["name"]="Name can not be blanked.";
			  }
				else if (tst.test( temp.value ))//retrun "true" or "false" on comparison of both strings
				{
				error["name"]=0;
				temp.style.background="white";
				}
			  else 
			  {
			  temp.style.background="red";
			  error["name"]=1;
			  msg["name"]="Name should be characters";
			  }	   
	  }
///////check email///////
	  function checkemail(input_field)
	  {
				var temp=input_field;
				msg["mail"]="";
			  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
			 if(temp.value=="" || temp.value==null )
			{
			  temp.style.background="red";
			  error["mail"]=1;
			  msg["mail"]="Email is blank";
			  }
				else
			 if (mailformat.test( temp.value ))
				{  
				error["mail"]=0;
				temp.style.background="white";
				}  
				else  
				{
			  	temp.style.background="red";
			  	error["mail"]=1;	
				msg["mail"]="Email is wrong";
				}
		}	  
//password check function/////
function checkpassword(input_field)
		{
			var temp=input_field;
			var tst=/^[a-z0-9_-]{6,18}$/;
			msg["password"]="";
			if(temp.value=="" || temp.value==null )
			{
			  temp.style.background="red";
			  error["password"]=1;
			  msg["password"]="Password can not be blanked";
			  }
				else if (tst.test( temp.value ))
				{
				error["password"]=0;
				temp.style.background="white";
				}
			  else 
			  {
			  temp.style.background="red";
			  error["password"]=1;
			  msg["password"]="Password should be greater than 6 and should include alphbets or numbers or both ";
			  }
	  }	
///// function to check valid question statement for input///////	  
function checkstatement(input_field)
		{
			var temp=input_field;
			msg["statement"]="";
			if(temp.value=="" || temp.value==null )
			{
			  temp.style.background="red";
			  error["statement"]=1;
			  msg["statement"]="Blank field for question.";
			  }
			  else 
			  {
			  error["statement"]=0;
			  temp.style.background="white";
			  }  
	  }
//// function for multiple options and display its weightage field for each option//////	  
function checkvalue(input_field)
		{
			var temp=input_field;
			var tst=/^[0-9]{1}$/;
			msg["value"]="";
			if(temp.value=="" || temp.value==null )
			{
			  temp.style.background="red";
			  error["value"]=1;
			  msg["value"]="value can not be blanked.";
			  }
				else if (tst.test( temp.value ))
				{
				error["value"]=0;
				temp.style.background="white";
				var output="";
				for( var i=1; i<=temp.value; i++)// loop to dispay multiple input fields for options based on the delared input number 
					{
					output+='<input type="text" name="option'+i+'" onchange="checkoption(this)"  id="option'+i+'" placeholder="Option '+i+'*" required>';
					output+='<input type="text" name="value'+i+'" onchange="checkWeightage(this)"  id="value'+i+'" placeholder="Weightage for '+i+' option(1-7)*" required></br>';				
					}
				document.getElementById("choices").innerHTML+=output;
				}
			  else 
			  {
			  temp.style.background="red";
			  error["value"]=1;
			  msg["value"]="Number of options should be number and maximum 9";
			  }
	  }
///// functiont to check the correct weightage of each option////
function checkWeightage(input_field)
		{
			var temp=input_field;
			var tst=/^[0-7]{1}$/;
			msg["Weightage"]="";
			if(temp.value=="" || temp.value==null )
			{
			  temp.style.background="red";
			  error["Weightage"]=1;
			  msg["Weightage"]="value can not be blanked.";
			  }
				else if (tst.test( temp.value ))
				{
				error["Weightage"]=0;
				temp.style.background="white";
				}
			  else 
			  {
			  temp.style.background="red";
			  error["Weightage"]=1;
			  msg["Weightage"]="Weightage should be number and maximum 7";
			  }
	  }	 	    
// function to check valid options////	  
function checkoption(input_field)
		{
			var temp=input_field;
			msg["option"]="";
			if(temp.value=="" || temp.value==null )
			{
			  temp.style.background="red";
			  error["option"]=1;
			  msg["option"]="Blank field for option.";
			  }
			  else 
			  {
			  error["option"]=0;
			  temp.style.background="white";
			  }  
	  } 
	  	  
//submit form////
function checksubmit()
	  { 
	  var temp=0;
	  for(var key in error ) 
	      {
			  if (error[key]==1)// if there is error in any input field of form
			  {			
			  event.preventDefault();// stop form from submitting
			  document.getElementById("alert").innerHTML= msg[key];// display the message in the specified div
				temp=1;
				 }	 
	      }
	  if(temp==1)
	  {
		 $("#alert").css("display","block");// show errors
	  	return false;
	  }
	   else
		  return true;
	  }	  