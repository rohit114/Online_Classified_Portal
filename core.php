<?php
session_start();
ob_start();

$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']))
	$http_referer = $_SERVER['HTTP_REFERER'];    #tells users from where we came
else
	$http_referer = "home.php";
if(!function_exists('loggedin'))
{
		function loggedin()
		{

			if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
			 	return true ;
			else
				return false ;
	
		}
}


?>
