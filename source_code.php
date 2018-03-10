#some source code



#code for login**************************************

<?php

require 'core.php';
require 'connection.php';

if(isset( $_POST['username']) && isset($_POST['password'])  )
{
$username = $_POST['username'];
$password = $_POST['password'];
$hased_password = md5($password);
}
if( !empty($username)  && !empty($password) )
{
  
  
$query_login="SELECT username, password FROM users WHERE username = '$username' AND password ='$hased_password'";
  
 if($query_run = mysqli_query($conn,$query_login) )
 {
    $query_num_row = mysqli_num_rows($query_run);

    if( $query_num_row == 0)
    {
     
      echo "Invalid username or password";
    }
    else if($query_num_row == 1)
    {
        $_SESSION['username'] = $username;
        header("location: index.php");
       #header("location: http://localhost/welcome.php");
    }

 }

}
else
{
  echo "Error !";
}
  
   


?>

#login code ends*********************************************