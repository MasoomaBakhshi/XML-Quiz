<?php
session_start();
require_once ('functions.php');
if(!isset($_SESSION['admin'])) {
redirect('../../../login_admin.php');}
$category=$_POST["category"];//get the category

if($category==1)// if category is 1st
{
// Open and parse the XML file
$xml = new DOMDocument("1.0", "ISO-8859-1");
   $xml->preserveWhiteSpace = false;
   $xml->load('../xml/categoryOne.xml');
// Access root node
   $category = $xml->getElementsByTagName('categoryOne');
   //add childs of the first node
   $question = $xml->createElement('question');
   $question->appendChild($xml->createElement("statment",$_POST["statement"]));
   $choice = $xml->createElement('choice');
   
for ($i=1; $i<=$_POST["options"];$i++)// loop for the number of options
{
$choice->appendChild($xml->createElement("line",$_POST["option".$i]));
$choice->appendChild($xml->createElement("value",$_POST["value".$i]));
}
 $question -> appendChild($choice);
 
   $question->appendChild($xml->createElement("img","six"));
  
   $category -> item(0) -> appendChild($question);    

   $xml->formatOutput = true; // this adds spaces, new lines and makes the XML more readable format.
   $xml->save('../xml/categoryOne.xml');
$_SESSION['success']="Question has been added in Category A.";
redirect('../../../admin.php');
 }
if($category==2){// if category is 2nd
// Open and parse the XML file
$xml = new DOMDocument("1.0", "ISO-8859-1");
   $xml->preserveWhiteSpace = false;//keep the file format
   $xml->load('../xml/categoryTwo.xml');
//Access root topic node
   $category = $xml->getElementsByTagName('categoryTwo');
   //add childs of the first node
   $question = $xml->createElement('question');
   $question->appendChild($xml->createElement("statment",$_POST["statement"]));
   $choice = $xml->createElement('choice');
   
for ($i=1; $i<=$_POST["options"];$i++)// loop for the number of options
{
$choice->appendChild($xml->createElement("line",$_POST["option".$i]));
$choice->appendChild($xml->createElement("value",$_POST["value".$i]));
}
 $question -> appendChild($choice);
 
   $question->appendChild($xml->createElement("img","six"));
  
   $category -> item(0) -> appendChild($question);//append all the children    

   $xml->formatOutput = true; // this adds spaces, new lines and makes the XML more readable format.
   $xml->save('../xml/categoryTwo.xml');//save the file back
$_SESSION['success']="Question has been added in Category B.";
redirect('../../../admin.php');
 }

 if($category==3){
// Open and parse the XML file
$xml = new DOMDocument("1.0", "ISO-8859-1");
   $xml->preserveWhiteSpace = false;
   $xml->load('../xml/categoryThree.xml');
// access the root node
   $category = $xml->getElementsByTagName('categoryThree');
   //create the children nodes
   $question = $xml->createElement('question');
   $question->appendChild($xml->createElement("statment",$_POST["statement"]));
   $choice = $xml->createElement('choice');
   
for ($i=1; $i<=$_POST["options"];$i++)//options nodes
{
$choice->appendChild($xml->createElement("line",$_POST["option".$i]));
$choice->appendChild($xml->createElement("value",$_POST["value".$i]));
}
 $question -> appendChild($choice);
 
   $question->appendChild($xml->createElement("img","six"));
  
   $category -> item(0) -> appendChild($question);//append all the children    

   $xml->formatOutput = true; // this adds spaces, new lines and makes the XML more readable format.
   $xml->save('../xml/categoryThree.xml');//save the file
$_SESSION['success']="Question has been added in Category C.";
redirect('../../../admin.php');
 }
 
 if($category==4){
// Open and parse the XML file
$xml = new DOMDocument("1.0", "ISO-8859-1");
   $xml->preserveWhiteSpace = false;
   $xml->load('../xml/admin.xml');
	//access the root node
   $element = $xml->getElementsByTagName('admins');
   //create all the children nodes
   $admin = $xml->createElement('admin');
   $admin->appendChild($xml->createElement('name', $_POST["name"]));
   $admin->appendChild($xml->createElement('email', $_POST["email"]));
   $admin->appendChild($xml->createElement('password', sha1($_POST["password"])));
   $element -> item(0) -> appendChild($admin);//append all th children    

   $xml->formatOutput = true; // this adds spaces, new lines and makes the XML more readable format.
   $xml->save('../xml/admin.xml');//save the file
$_SESSION['success']="New admin has been added.";
redirect('../../../admin.php');
 }
?>