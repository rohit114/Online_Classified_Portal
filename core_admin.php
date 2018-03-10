<?php
session_start();

if(isset($_SERVER['HTTP_REFERER']))
	$http_referer = $_SERVER['HTTP_REFERER'];    #tells users from where we came
else
	$http_referer = "http://araniisansthan.com/";
if(!function_exists('loggedin_admin'))
{
		function loggedin_admin()
		{

			if( isset($_SESSION['username_admin']) && !empty($_SESSION['username_admin']) )
			 	return true ;
			else
				return false ;
	
		}
}


?>
