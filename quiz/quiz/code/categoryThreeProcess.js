// JavaScript Document for retrieving catgeory three questions from XML file
var requestcategory;
var a=0;
var sum=0;
var xml;
var statement;
var questions;
//HTTP request
if(window.XMLHttpRequest)
	{
	requestcategory = new XMLHttpRequest();
	}
	else
	{
	requestcategory= new ActiveXObject("Microsoft.XMLHTTP");// OLD IE version
	}
	//open XML file	
  	requestcategory.open("GET", "xml/categoryThree.xml", true);
		//call on success
	  requestcategory.onreadystatechange = function() {
		  
		if (requestcategory.readyState == 4 && requestcategory.status == 200) {
		   xml = requestcategory.responseXML;// retreive data of file
		   questions = xml.getElementsByTagName("question");	
		   question();//call of function
		}
		};
	//send http request	
  	requestcategory.send();
		//Random function between a range	
		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}		
		//Question function
		  function question() 
		  {	
			  var rand= getRandomInt(0, questions.length-1);//generate random value
			   statement = questions[rand].childNodes[1].childNodes[0].nodeValue;		
			  document.getElementById("question").innerHTML = statement;//display the question statement
			  var imageUrl=questions[rand].lastChild.previousSibling.childNodes[0].nodeValue;
			  //console.log(imageUrl);
			  //$("#quiz").css('background-image', 'url(images/' + imageUrl + '.jpg)').fadeTo('slow', 1);
			  var value;
			  //options
			  var options= questions[rand].childNodes[3];
			  var option="<div>";
			  var choices= options.getElementsByTagName("line");
			  var value= options.getElementsByTagName("value");
			   for(var y=0; y<choices.length;y++)// loop to display all the options
			  {
				  option+="<button class='btn ui-btn-inline' onclick='next("+value[y].childNodes[0].nodeValue+")'>"+choices[y].childNodes[0].nodeValue+"</button><br/>";
							  
			  }
			  option+="</div>"; 	  
			  $("#option").html(option);//insert the options
		  }
		  
		  	
				
		  
		    // function for Next question
		 	function next(value){ 	
				 a++;
				if(a<=3)
				{						
				sum+=value;// add weightage of each choosen option
				//console.log(value);
				//console.log(a);
				 question();// call of the function for next random question
				}
				else			
				window.location = "result.php?sum="+sum;//on "false" redirect towards result page
			 }
			 
			 
			
				
		