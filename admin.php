<?php
session_start();
require_once ('code/functions.php');
require_once ('code/functions_messages.php');

//After login set the welcome message for admin
if(isset($_GET['admin'])) {
$_SESSION['welcome']=$_GET['admin'];
$_SESSION['admin']=$_GET['admin'];}
//check if admin is logged in
if(!isset($_SESSION['admin'])) {
redirect('../../login_admin.php');}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!----style sheet link--->
<link href="style/style.css" rel="stylesheet" type="text/css"/>
<!----Google font link--->
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
<title>Admin Dashboard</title>
</head>
<body>
	<!----breadcrums--->
    <div class="breadcrums"><h4><a href="admin.php">Admin</a></h4></div>
    <div  id="admin_page">
    
        <h1>Admin Dashboard</h1>

		<div class="logo_login"><img src="images/logo.png" alt="Masooma Bakhshi" title="MasoomaBakhshi"/></div>              
        <?php user_welcome(); user_message(); // display messages?>       
     				<!----buttons to redirect to target pages-->
                   <button type="submit" class="btn" id="categoryOne" onclick='window.location.href="code/addCategoryProcess.php?category=1";' name="categoryOne">Add question in Category One</button>
                   <button type="submit" class="btn" id="categoryTwo" onclick='window.location.href="code/addCategoryProcess.php?category=2";' name="categoryOne">Add question in Category Two</button>
                   <br/><button type="submit" class="btn" id="categoryThree" onclick='window.location.href="code/addCategoryProcess.php?category=3";' name="categoryThree">Add question in Category Three</button>
                   <button type="submit" class="btn" id="addAdmin" onclick='window.location.href="code/addAdminProcess.php?category=4";' name="addAdmin">Add Admin</button>
                   <br/><button type="submit" class="btn" id="charts" onclick='window.location.href="charts.php";' name="charts">Quiz Statistics</button>
                   <button type="submit" class="btn" id="logout" onclick='window.location.href="logout.php";' name="logout">Logout</button>
        <!---java script file containing all the basic form input functions--->                         
		<script src="code/default.js"></script>
		</div>
<!-----footer----->        
<footer>Copyright &copy;<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());//display full current year</script>, Masooma Bakhshi.</footer>        
</body>
</body>
</html>