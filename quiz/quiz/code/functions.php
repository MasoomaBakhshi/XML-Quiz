<?php

function redirect($path)
{
	header('location:'. $path);
	} 

function find_user()
{
	if(!isset($_SESSION['user']))
	{
		//if the user session is not set (i.e. the user is not logged in) redirect to the index page
                header('location:..\..\login.html');
	}
	else{
		$mainuser=$_SESSION['user'];
		return $mainuser;
		}
}

function find_user_type()
{
	if(!isset($_SESSION['admin']))
	{
		//if the user session is not set (i.e. the user is not logged in) redirect to the index page
                header('location:..\..\login.html');
	}
}

?>