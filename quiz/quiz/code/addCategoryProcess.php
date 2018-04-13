<?php
session_start();
require_once ('functions.php');
$category=$_GET["category"];
if(!isset($_SESSION['admin'])) {redirect('../../../login_admin.php');}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-------style sheet-------->
<link href="../style/style.css" rel="stylesheet" type="text/css"/>
<!-------google Font-------->
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!-------J query CDN-------->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!-------Java script function to check validations of inputs------->
<script src="default.js"></script> 
<title>Add Category</title>
</head>

<body>
	<!-------breadcrums-------->
    <div class="breadcrums"><h4><a href="../admin.php">Admin</a> > <a href="addCategoryProcess.php?category="<?php echo $category;?>>Add Category <?php echo $category;?></a></h4></div>
	<div  id="admin_page">

		<h1>Add question in Category <?php echo $category;?></h1>
		<div class="logo_login"><img src="../images/logo.png" alt="Masooma Bakhshi" title="MasoomaBakhshi"/></div> 
        		<!-------Error massages-------->           			   
   			   <div class="alert" id="alert" role="alert"></div>                            
               <!-------form for new question-------->  
               <form action="addProcess.php" method="post" class="form-horizontal" onsubmit="return checksubmit()">               
                	<input type="text" name="statement" onchange="checkstatement(this)"  id="statement" placeholder="Question*" required></br><input type="text" name="options" onchange="checkvalue(this)"  id="value" placeholder="Number of Options*" required><input type="hidden" name="category" value="<?php echo $category; ?>" required><br/>
                    <div id="choices"></div>

                  
                  
                   <button type="submit" class="btn" id="submit">ADD</button>
                  
                </form>
    </div>   
<!-------footer-------->              
<footer>Copyright &copy;<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script>, Masooma Bakhshi.</footer>                               
</body>
</html>
