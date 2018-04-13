<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/style.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
<title>Login</title>
</head>

<body>
	<!---breadcrumbs--->
	<div class="breadcrums"><h4><a href="login.html">Home</a> > <a href="login_admin.php">Admin Login</a></h4></div>	
	<div  id="admin_page">
	<h1>Admin Login</h1>
		<div class="logo_login"><img src="images/logo.png" alt="Masooma Bakhshi" title="MasoomaBakhshi"/></div>
			   <!---div place error messages on wrong inputs--->  
   			   <div class="alert" id="alert" role="alert"></div>
                
				<!---Admin Login form--->           
               <form action="code/loginAdmin.php" method="post" class="form-horizontal" onsubmit="return checksubmit()">
               
                	<input type="text" name="email" onchange="checkemail(this)"  id="email" placeholder="Your Email*" required></br>
                	<input type="password" name="password" onchange="checkpassword(this)"  id="password" placeholder="Password*" required></br>
                  
                  
                   <button type="submit" class="btn" id="submit">Login</button>
                  
                </form>
    <!---java script file containing all the basic form input functions--->                                 
    <script src="code/default.js"></script>
	</div>
<!---footer--->
<footer>Copyright &copy;<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());//display current year</script>, Masooma Bakhshi.</footer>    	
</body>
</html>
