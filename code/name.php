<?php
session_start();
require_once ('functions.php');
if(!isset($_SESSION["name"])) {
redirect('../../../login.html');}
$_SESSION["category"]=$_POST['choice'];
$name=$_SESSION["name"];
$category=$_SESSION["category"];
if($category=='A'){
redirect('../../../categoryOne.php'); }
if($category=='B'){
redirect('../../../categoryTwo.php'); }
if($category=='C'){
redirect('../../../categoryThree.php'); }
?>