<?php

session_start();

require 'core.php';
require 'connection.php';

if( loggedin() )
	{
			$session_user_name = $_SESSION['username'];
			$user_dataX = user_data( $session_user_name , 'username' , 'name' , 'email' );

			echo $user_dataX['name'] ;
	}



//$errors = array();

else
	include'login.php';
?>