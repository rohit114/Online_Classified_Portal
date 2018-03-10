 <?php

require'connection.php';
require'core.php';

session_start();
$flag =0;
if( loggedin() )
{

  $flag=1;


}

else
  include'login.php';

?>


 
<?php

if( $flag == 1)
  include'create_adv.php';


  ?>


