// JavaScript Document for displaying different statistical charts 
// the global variables and arrays
var requestResult;
var totalA=0;
var totalB=0;
var totalC=0;
var scoreA=[];
var scoreB=[];
var scoreC=[];
var totalperA=0;
var totalperB=0;
var totalperC=0;
var cateA=0;
var cateB=0;
var cateC=0;
var userNameA=[];
var userNameB=[];
var userNameC=[];
var barColors=[];
var barhoverColor=[];

//HTTP request
if(window.XMLHttpRequest)
	{
	requestResult = new XMLHttpRequest();
	}
	else
	{
	requestResult= new ActiveXObject("Microsoft.XMLHTTP");//Old IE versions
	}
	//open XML file	
  	requestResult.open("GET", "xml/users.xml", true);
		//call on success
	  requestResult.onreadystatechange = function() 
	  {
		  
		if (requestResult.readyState == 4 && requestResult.status == 200) // on retriving file
		{
					 var xmlDoc = requestResult.responseXML;//access to data of xml file
					  var user = xmlDoc.getElementsByTagName("user");// getting the first node
					  var users=user.length;//number of users in the file
					   
					   //loop to access each uer's information
					   for(var y=0; y<users;y++)
					  	{
						  var category= user[y].childNodes[3].childNodes[0].nodeValue;//access category of question answered by user
						  console.log(category);
						  barColors[y]="#009900";//for bar chart color
						  barhoverColor[y]="#FCD110";//for hover on chart's bar		
						  //if category is A
						  if(category=='A')
						  {
							  userNameA[y]= user[y].childNodes[1].childNodes[0].nodeValue;//store name in array specified for this category
							  scoreA[y]=user[y].childNodes[5].childNodes[0].nodeValue;//store the score of each user
							  cateA++;// count the number of user in this category
							  totalA=parseInt(scoreA[y])+parseInt(totalA);//add the scores
							  // console.log(userNameA[y]);
							  //console.log(scoreA[y]);
						  }
						  //if category answered is "b"
						  if(category=='B')
						  {
							  userNameB[y]= user[y].childNodes[1].childNodes[0].nodeValue;//store name in array specified for this category
							  scoreB[y]=user[y].childNodes[5].childNodes[0].nodeValue;//store the score of each user
							  cateB++;// count the number of user in this category
							  totalB=parseInt(scoreB[y])+parseInt(totalB);//add the scores
							  //console.log(totalB);
							  //console.log(userNameB[y]);
							  //console.log(scoreB[y]);
						  }
						  //if category answered is "c"
						  if(category=='C')
						  {
							  userNameC[y]= user[y].childNodes[1].childNodes[0].nodeValue;//store name in array specified for this category
							  scoreC[y]=user[y].childNodes[5].childNodes[0].nodeValue;//store the score of each user
							  cateC++;//store the score of each user					  
							  totalC=parseInt(scoreC[y])+parseInt(totalC);//add the scores
							  //console.log(totalC);
							  //console.log(userNameC[y]);
							  //console.log(scoreC[y]);
						  }
					  //calculate the percentage of the answered categoriers based on the pie(360)
					      
					  totalperA=Math.round((cateA/users)*360);
					  totalperB=Math.round((cateB/users)*360);
					  totalperC=Math.round((cateC/users)*360);
					  
					  }
					  	// if categories button is clicked call function
					   $("#categories").click(function()
							 {								 
								 $("#graph2").hide("slow");//hide the chart
								 $("#graph3").hide("slow");//hide the chart
								 $("#graph4").hide("slow");//hide the chart
								 $("#graph1").slideToggle("slow");//display if is hide and hide if visible on click with sliding effect
							 });					
								 categories();//call the function
								 
						// if categoryA button is clicked call function		 
						$("#categoryA").click(function()
							 {								 
								 $("#graph1").hide("slow");//hide
								 $("#graph3").hide("slow");//hide
								 $("#graph4").hide("slow");//hide
								 $("#graph2").slideToggle("slow");//display if is hide and hide if visible on click
							 });
								 categoryA();// function call
								 
						// if categoryA button is clicked call function		 
						$("#categoryB").click(function()
							 {								 
								 $("#graph2").hide("slow");
								 $("#graph1").hide("slow");
								 $("#graph4").hide("slow");
								 $("#graph3").slideToggle("slow");//display if is hide and hide if visible on click
							 });
								 categoryB();//function call
								 
						// if categoryA button is clicked call function	
						$("#categoryC").click(function()
							 {								 
								 $("#graph2").hide("slow");
								 $("#graph3").hide("slow");
								 $("#graph1").hide("slow");
								 $("#graph4").slideToggle("slow");//display if is hide and hide if visible on click
							 });
								 categoryC();// function call
				}
					 
					 	  
					   
				};
				//send http request	
				requestResult.send();
				
/////////functions///// 

///categories pie chart function				
function categories(){
	var data = {
			labels: [ //labels of the chart
				"Category A",
				"Category B",
				"Category C"
			],
			datasets: [
				{
            		label: 'Categories ',
					data: [totalperA,totalperB,totalperC],//values of chart
					backgroundColor: [ // colors for each slice of pie
						"#009900",
						"#FCD116",
						"#000000"
					],
					hoverBackgroundColor: [// hover color
						"#808080",
						"#808080",
						"#808080"
					],
            	borderWidth: 1
				}]
			};
			
		var ctx = document.getElementById("Chart1");//access the canvas for the chart
		
//chart creation object
var myChart = new Chart(ctx, {
			type: 'pie',//type of chart
			data: data,
			options: {
				animation:{
					animateScale:true// Boolean - whether or not the chart should animate.
					},
				// Boolean - whether or not the chart should be responsive and resize when the browser does.
				responsive: true,
			}
		});	
	}

//// function for chart of category A's information
function categoryA(){
	//data object of the chart 
	var data = {
			labels: userNameA,// labels will be user's names
			datasets: [
				{
            		label: 'Users results',
					data: scoreA,// users' scores on y-axis 
					backgroundColor: barColors,
					hoverBackgroundColor:barhoverColor,
            		borderWidth: 1
				}]
			};
			
		var ctxa = document.getElementById("Chart2");// access the canvas for chart
//object for chart		
var CateChartC = new Chart(ctxa, {
			type: 'bar',//chart type
			data: data,// array of data
			options: {
				scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true//START CHART from zero value
							}
						}]
					},
				animation:{
					animateScale:true
					},
				// Boolean - whether or not the chart should be responsive and resize when the browser does.
				responsive: true,
			}
		});	
	}
	
//// function for chart of category B's information
function categoryB(){
	var data = {
			labels: userNameB,
			datasets: [
				{
            		label: 'Users results',
					data: scoreB,
					backgroundColor: barColors,
					hoverBackgroundColor:barhoverColor,
            		borderWidth: 1
				}]
			};
			
		var ctxb = document.getElementById("Chart3");
		
var CateChartB = new Chart(ctxb, {
			type: 'bar',
			data: data,
			options: {
				scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					},
				animation:{
					animateScale:true
					},
				// Boolean - whether or not the chart should be responsive and resize when the browser does.
				responsive: true,
			}
		});	
	}
	
//// function for chart of category C's information	
function categoryC(){
	var data = {
			labels: userNameC,
			datasets: [
				{
            		label: 'Users results',
					data: scoreC,
					backgroundColor: barColors,
					hoverBackgroundColor:barhoverColor,
            		borderWidth: 1
				}]
			};
			
		var ctxc = document.getElementById("Chart4");
		
var CateChartC = new Chart(ctxc, {
			type: 'bar',
			data: data,
			options: {
				scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					},
				animation:{
					animateScale:true
					},
				// Boolean - whether or not the chart should be responsive and resize when the browser does.
				responsive: true,
			}
		});	
	}				
	
					