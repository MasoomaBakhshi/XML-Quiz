// JavaScript Document for retrieving result based on score from XML file
var requestResult;
//HTTP request
if(window.XMLHttpRequest)
	{
	requestResult = new XMLHttpRequest();
	}
	else
	{
	requestResult= new ActiveXObject("Microsoft.XMLHTTP");//old IE versions
	}
	//open XML file	
  	requestResult.open("GET", "xml/result.xml", true);
		//call on success
	  requestResult.onreadystatechange = function() {
		  //on success retriving of file
		if (requestResult.readyState == 4 && requestResult.status == 200) {
					 //console.log(sum);
					 var xmlDoc = requestResult.responseXML;//strore the data of xml file
					  var result = xmlDoc.getElementsByTagName("result");// access first node
					  var resultLen=result.length;// number of results available
					  
					  //loop to check each result
					   for(var y=0; y<resultLen;y++)
					  {
						  console.log(max);
						  var max= result[y].childNodes[1].childNodes[0].nodeValue;//the maximum value for each result
						  var min= result[y].childNodes[2].childNodes[0].nodeValue;// the minimum value for each result
						  if(sum<=max && sum>=min)//check the user's calcluated marks against each result in it's specified range
						  {
						     //display of the result
							  var des= "<h4>";
							  des+= result[y].childNodes[4].childNodes[0].nodeValue;
							  des+="</h4>";
							  $("#result").append(des);
							  break;//if result is found break loop
						  }
						  }
						  return true;
					  }
				};
				//send http request	
				requestResult.send();
				
			
		