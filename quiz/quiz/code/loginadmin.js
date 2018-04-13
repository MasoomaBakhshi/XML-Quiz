// JavaScript Document for admin login
var request;
//HTTP request
if(window.XMLHttpRequest)
	{
	request = new XMLHttpRequest();
	}
	else
	{
	request= new ActiveXObject("Microsoft.XMLHTTP");//Old IE
	}
	//open XML file	
  	request.open("GET", "../xml/admin.xml", true);
		//call on success
	  request.onreadystatechange = function() {
		  
		if (request.readyState == 4 && request.status == 200) {
			
			admin(this);//send xml file to fuction call as argument
		}
		};
	//send http request	
  	request.send();
	
	//category choices	
		function admin(xml){
			  try{	//run this on success	
				  var xmlDoc = request.responseXML;
				  //console.log(request);
				  var admins = xmlDoc.getElementsByTagName("admin");
				  for( var i=0; i<=admins.length-1; i++)
				  {
						var name=admins[i].childNodes[1].childNodes[0].nodeValue;
						var passwordUser=admins[i].childNodes[5].childNodes[0].nodeValue;
						var emailUser=admins[i].childNodes[3].childNodes[0].nodeValue;
						//console.log(name+"  "+passwordUser+"    "+emailUser);
						//console.log(name+"  "+password+"    "+email);
						if(email==emailUser && password==passwordUser)//if email and password matches
						{
							window.location="../admin.php?admin="+name;// redirect to admin dashboard
							break;// break loop on success
							}	  
					  }
					  $('#alert').html("wrong Email and password");//send message of alert div on wrong password and email
				  }
			  catch(err){ //iff errors occurs
				  alert("It could not parse the file");
				  }
			}
		
