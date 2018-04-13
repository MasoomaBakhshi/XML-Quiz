<?php
session_start();
require_once ('functions.php');
$category=$_GET["category"];//Get the category of task
//check if adminis logged In
if(!isset($_SESSION['admin'])) 
{redirect('../../../login_admin.php');}?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-------style sheet--------->
<link href="../style/style.css" rel="stylesheet" type="text/css"/>
<!-------Google font--------->
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!------Jquery CDN--------->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!-------Java script function to check validations of inputs--------->  
<script src="default.js"></script> 
<title>Add Admin</title>
</head>

<body>
	<!-------breadcrums-------->
	<div class="breadcrums"><h4><a href="../admin.php">Admin</a> > <a href="addAdminProcess.php">Add Admin</a></h4></div>
	<div  id="admin_page">
		<h1>Add admin</h1>            			   
		<div class="logo_login"><img src="../images/logo.png" alt="Masooma Bakhshi" title="MasoomaBakhshi"/></div>
   			   <!-------Error massages-------->
               <div class="alert" id="alert" role="alert"></div> 
               <!-------form for new admin's info-------->                           
               <form action="addProcess.php" method="post" class="form-horizontal" onsubmit="return checksubmit()">               
					<input type="hidden" name="category" value="<?php echo $category; ?>" required>               
                	<input type="text" name="name" onchange="checkname(this)"  id="name" placeholder="Name*" required></br>
                    <input type="text" name="email" onchange="checkemail(this)"  id="email" placeholder="Email*" required></br>
                	<input type="text" name="password" onchange="checkpassword(this)"  id="password" placeholder="Password*" required></br>
                  
                  
                   <button type="submit" class="btn" id="submit">ADD</button>
                  
                </form>
     </div>
<!-------footer-------->      
<footer>Copyright &copy;<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script>, Masooma Bakhshi.</footer>                            
</body>
</html>
