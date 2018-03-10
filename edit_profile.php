 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="$$hosted_libs_prefix$$/$$version$$/material.min.css">
    <link rel="stylesheet" href="css/signup_style.css">
</head>
<body>

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
  
  
$query_login="SELECT username ,name , password FROM users WHERE username = '$username' AND password ='$hased_password'";
  
 $result = $conn->query($query_login);
 
     
      $row = $result->fetch_assoc();
      
      
      $count = $result->num_rows;
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         //session_register("username");
         $_SESSION['login_user'] = $username;
         $_SESSION['password'] = $password;
         $_SESSION['name'] = $row["name"];
         
         header("location: http://localhost/welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }

}
else
{
  echo "Error !";
}


  
   


?>

  <div class="container">
    <div class="col-md-6">
    <div id="logbox">
      <form action="<?php echo $current_file; ?>"  id="signin" method="post" >

        <h1>Sign In to your account</h1>
        
        <input name="username" type="text" placeholder="What's your username?" pattern="^[\w]{3,20}$" autofocus="autofocus" required="required" class="input pass"/>
        <input name="password" type="password" placeholder="Choose a password" required="required" class="input pass"/>
        
        <input type="submit" value="Signin" class="inputButton"/>
        
      </form>
    </div>
   </div>
    <!--col-md-6 -->
    
   

    
  </div>
  </body>