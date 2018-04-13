<?php
session_start();
$email=$_POST['email'];
//encrypt the password
$password= sha1($_POST['password']);
echo "<script> var email='".$email."'; var password='".$password."'</script>";//send php values to javascript variables
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!------------Style sheet------------->
<link href="../style/style.css" rel="stylesheet" type="text/css"/>
<!------------Jquery CDN------------->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!------------check success and failure in log In------------->  
<script src="loginadmin.js"></script>
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
<title>Re-Login</title>
</head>

<body>
	<!------------breadcrums------------->
	<div class="breadcrums"><h4><a href="../login.html">Home</a> > <a href="../login_admin.php">Admin Login</a></h4></div>
    <div  id="admin_page">
        <h2>Admin Login</h2>
                <div class="logo_login"><img src="../images/logo.png" alt="Masooma Bakhshi" title="MasoomaBakhshi"/></div>
                       
                       <div class="alert" id="alert" role="alert"></div>
                        <!-----------Admin log in form------------->         
                       <form action="loginAdmin.php" method="post" class="form-horizontal" onsubmit="return checksubmit()">
                       
                            <input type="text" name="email" onchange="checkemail(this)"  id="email" placeholder="Your Email*" required></br>
                            <input type="password" name="password" onchange="checkpassword(this)"  id="password" placeholder="Password*" required></br>
                          
                          
                           <button type="submit" class="btn" id="submit">ReLogin</button>
                          
                        </form>
     </div>  
<!-------Java script function to check validations of inputs--------->                                    
<script src="default.js"></script>
</body>
</html>
