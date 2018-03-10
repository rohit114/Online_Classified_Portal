<aside>

<? php
require 'core.php';
require 'connection.php';

	if( loggedin() === true)
	{
		
		echo 'You are logged in ! <a href = "home.php"> Logout </a> ';

	}

else
{

include 'login.php';

}



?>



</aside>