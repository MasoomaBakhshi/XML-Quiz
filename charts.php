<?php 
session_start();
require_once ('code/functions.php');
//check if admin is logged in
if(!isset($_SESSION['admin'])) {
redirect('../../login_admin.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<!---Jquery CDN--->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!----chart.js CDN---> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<link href="style/style.css" rel="stylesheet" type="text/css"/>

</head>
<body>
	<!--breadcrums--->
    <div class="breadcrums"><h4><a href="admin.php">Admin</a> > <a href="charts.php">Statistics</a></h4></div>
    <div id="chart_page">
        <h1>Quiz Statistics</h1>
        <div class="logo_login"><img src="images/logo.png" alt="Masooma Bakhshi" title="MasoomaBakhshi"/></div>
        	<!---buttons showing different charts---->
            <button type="submit" class="btn" id="categories" name="categories">Answered Categories</button>
            <button type="submit" class="btn" id="categoryA"  name="categoryA">Category A</button>
            <button type="submit" class="btn" id="categoryB"  name="categoryB">Category B</button>
            <button type="submit" class="btn" id="categoryC"  name="categoryC">Category C</button>
            
            <!--- pie chart div for Ratio of answered Categories--->
            <div id="graph1">
                <h2 class="title">Ratio of answered Categories</h2>
                <canvas id="Chart1" width="400px" height="400px"></canvas>
            </div>
            
            <!---Bar chart div shhowing results of all users' based on category--->
            <div id="graph2">
                <h2 class="title">Catgeory A's Users' Results</h2>
                    <canvas id="Chart2" width="400px" height="400px"></canvas>
            </div>
            
            <!---Bar chart div shhowing results of all users' based on category--->
            <div id="graph3">
                <h2 class="title">Catgeory B's Users' Results</h2>
                    <canvas id="Chart3" width="400px" height="400px"></canvas>
            </div>
            
            <!---Bar chart div shhowing results of all users' based on category--->
            <div id="graph4">
                <h2 class="title">Catgeory C's Users' Results</h2>
                    <canvas id="Chart4" width="400px" height="400px"></canvas>
            </div>
     <!--My javascript file for calcuation of charts based on data of files--->       
    <script src="code/charts.js"></script>
    </div>
 <!---footer--->   
<footer>Copyright &copy;<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script>, Masooma Bakhshi.</footer>
</body>
</html>