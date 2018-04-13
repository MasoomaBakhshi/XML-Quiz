<?php
	session_start();
	require_once ('code/functions.php');
	//destroy the user session
	session_destroy();
	redirect('../../login.html');
?>