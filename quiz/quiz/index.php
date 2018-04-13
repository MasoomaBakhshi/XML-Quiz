<?php
session_start();
require_once ('code/functions.php');
// check user name
if(!isset($_SESSION["name"]) || $_SESSION["name"]=="")
{redirect('../../login.html');}
if(isset($_SESSION["category"]) && $_SESSION["category"]=="A")
{redirect('../../categoryOne.php');}
if(isset($_SESSION["category"]) && $_SESSION["category"]=="B")
{redirect('../../categoryTwo.php');}
if(isset($_SESSION["category"]) && $_SESSION["category"]=="C")
{redirect('../../categoryThree.php');}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/style.css" rel="stylesheet" type="text/css"/>
<!---Jquery cdn--->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="code/questions.js"></script>
<!---Jquery UI cdn--->
<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous"></script>
<title>Personality Quiz</title>
</head>

<body id="quiz">
	
    <h1>Lets start Quiz!!!</h1>
	<!---Logo--->
	<div class="logo_login"><img src="images/logo.png" alt="Masooma Bakhshi" title="MasoomaBakhshi"/></div>
        <!---Display question here--->
        <h2 id="question"></h2>
		<p>"Click on the correct option letter"</p>
        <!---Display options here--->
        <div id="option"></div>
<!--footer--->
<footer>Copyright &copy;<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());//display current year</script>, Masooma Bakhshi.</footer>          
</body>
</html>
