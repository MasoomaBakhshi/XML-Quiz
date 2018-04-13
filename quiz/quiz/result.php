<?php
// Start the session
session_start();
require_once ('code/functions.php');
$_SESSION["sum"]=$_GET['sum'];
//check if user has input his name
if(!isset($_SESSION["name"]) || $_SESSION["name"]=="")
redirect('../../login.html');
//check if user has gone through test to calculate the result based on the answers' values 
if(!isset($_SESSION["sum"]) || $_SESSION["sum"]=="")
redirect('../../login.html');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/style.css" rel="stylesheet" type="text/css"/>
<!---Jquery cdn--->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!---Jquery UI cdn--->
<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<?php echo '<script type="text/javascript"> var sum=' . $_SESSION['sum'] . ';</script>' // transferring the marks of answers from php to javascript variable for calculation?>
<!---java script file containing all the functions for calculation to produce result--->  
<script src="code/result.js"></script>
<title>Result</title>
</head>

<body>
	<!---breadcrums--->  
    <div class="breadcrums"><h4><a href="logout.php">Login</a></div>	
    <div id="admin_page">
        <h1><?php echo $_SESSION["name"]?>'s Result</h1>
        <div class="logo_login"><img src="images/logo.png" alt="Masooma Bakhshi" title="MasoomaBakhshi"/></div>
            <!-----send the results and user's info into xml to be saved on server--->  
            <?php
            $xml = new DOMDocument("1.0", "ISO-8859-1");//initilizing document
               $xml->preserveWhiteSpace = false;//preserve the specified pattern of writing in existing xml 
               $xml->load('xml/users.xml');//open existing xml file
            
               $element = $xml->getElementsByTagName('users');//get the root node
               // create children nodes of root node and inserting them into it
               $user = $xml->createElement('user');
               $user->appendChild($xml->createElement("name",$_SESSION["name"]));
               $user->appendChild($xml->createElement("category", $_SESSION["category"]));
               $user->appendChild($xml->createElement("result", $_SESSION["sum"]));
               $element -> item(0) -> appendChild($user);    
            
               $xml->formatOutput = true; // this adds spaces, new lines and makes the XML more readable format.
               $xml->save('xml/users.xml');//save the file
            ?>
        <!--- div to show the result---->
        <div id="result"><h3>Your result says about you that<h3> <br/></div>
                <!----Re-start quiz--->
        <br/><br/><a href="logout.php">Click here for New Quiz...</a>
<!--- footer--->        
<footer>Copyright &copy;<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script>, Masooma Bakhshi.</footer>
</div>
</body>
</html>
