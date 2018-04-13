<?php
session_start();
require_once ('functions.php');
$_SESSION["name"]=$_POST['name'];
redirect('../../../index.php');
?>