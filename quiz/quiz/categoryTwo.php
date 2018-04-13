<?php
session_start();
require_once ('code/functions.php');
//check user has input name
if(!isset($_SESSION["name"]) || $_SESSION["name"]=="")
redirect('../../login.html');


// Do not allow users to go back and redirect them to a target page if they have already choosen one category for quiz
if(isset($_SESSION["category"]) && $_SESSION["category"]=="A")
redirect('../../categoryOne.php');
if(isset($_SESSION["category"]) && $_SESSION["category"]=="C")
redirect('../../categoryThree.php');
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
<!---Jquery UI cdn---->
<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous"></script>
<title>Quiz</title>
</head>

<body id="quiz">

	<div class="logo_login"><img src="images/logo.png" alt="Masooma Bakhshi" title="MasoomaBakhshi"/></div>
        <!----it will contain question's statement---->
        <h2 id="question"></h2>
        <!----it will contains options of question---->
        <div id="option"></div>
<!--- footer--->
<footer>Copyright &copy;<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script>, Masooma Bakhshi.</footer>
<!----Javascript file containg all the processes of producing random questions from file for quiz--->
<script src="code/categoryTwoProcess.js"></script>
</body>
</html>
