// JavaScript Document for retrieving question from XML file
//Golbal variables
var request;
var x=0;
var sum=0;
var num=1;
//HTTP request
if(window.XMLHttpRequest)//for modern browsers
	{
	request = new XMLHttpRequest();
	}
	else
	{
	request= new ActiveXObject("Microsoft.XMLHTTP");// for old IE
	}
	//open XML file	
  	request.open("GET", "xml/quiz.xml", true);
		//call on success
	  request.onreadystatechange = function() {
		 // on success retriving file
		if (request.readyState == 4 && request.status == 200) {
			
			category(this);//call category function by passing file
		}
		};
	//send http request	
  	request.send();
	
		//function to check category choice based on the answer	
		function category(xml){		
		  var xmlDoc = request.responseXML;// accessing data of file
		  var category = xmlDoc.getElementsByTagName("category");//accessing the first node
		  //console.log(category[0].childNodes[1].childNodes[0].nodeValue);
		  var statement = category[0].childNodes[1].childNodes[0].nodeValue;//accessing question statement node
		  document.getElementById("question").innerHTML = statement;//inserting the question in the specifed position
		  var imageUrl=category[0].lastChild.previousSibling.childNodes[0].nodeValue;//accessing the image node value
		  //console.log(imageUrl);
		  //$("#quiz").css('background-image', 'url(images/' +imageUrl+ '.jpg)').fadeTo('slow', 1);//setting image as background
		  var value;
		  //options
		  var options= category[0].childNodes[3];//the option node
		  var choices= options.getElementsByTagName("line");// the option's lines
		 var option="<form class='questions' action='code/name.php' method='post' >";
		   for(var y=0; y<choices.length;y++)// loop number of options for question
		  {
			  var choice=choices[y].nextSibling.nodeName;//accessing the weightage of each choice
			  console.log(choice);
			  option+="<input name='choice' type='submit' class='option' value="+choice+" />"+choices[y].childNodes[0].nodeValue;             			  
		  }	  
		  option+="</form>"; 
		  $("#option").html(option);//inserting options buttons through jquery libarary	  
			}
		
  
		
			 
			 
			