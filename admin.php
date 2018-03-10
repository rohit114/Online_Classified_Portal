 <?php require_once'core_admin.php';
require_once 'connection.php'; ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="signup_style.css">
</head>
<body style="background-color: black;">
 
      <?php 
      if(loggedin_admin())
      {
      		$temp = $_SESSION['username_admin'];
      		echo <<< _END
      		<li>Welcome $temp </li>
      		<li><a href="logout.php">Logout</a> 
_END;
      		
      }
      
     
      ?>

	  
    <div class="container">
<?php

$username = "";


	if(isset( $_POST['username']) && isset($_POST['password'])  )
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$hased_password = md5($password);
	}
	if( !empty($username)  && !empty($password) )
	{
	  
	  
		$query_login="SELECT username, password FROM admin WHERE username = '$username' AND password ='$hased_password'";
		  
		 if($query_run = mysqli_query($conn,$query_login) )
		 {
			$query_num_row = mysqli_num_rows($query_run);

			if( $query_num_row == 0)
			{
			 
			  echo '<div class="alert1"><h5>Invalid Username or Password</h5></div>';
			}
			else if($query_num_row == 1)
			{
				$_SESSION['username_admin'] = $username;
				$_SESSION['just_now'] = 1;
				
				//echo temp;
				header("location: admin_wall.php");
			}

		}
		else
		{
		  echo "Kindly Enter Your Login Details!";
		}
	}
	echo <<< _END
	<div class="row" style="margin:50px 15px;">
    <div class="col-md-4">
    <div id="logbox">
      <form id="signin" method="post" action="admin.php">
        <h1>Admin Sign in </h1>
       
        <input name="username" type="text" placeholder="Admin's username?" pattern="^[\w]{3,16}$" class="input pass" required="required" value="$username" autofocus="autofocus" />
        <input name="password" type="password" placeholder=" password" required="required" class="input pass"/>
        
        <input type="submit" value="Sign me in!" class="inputButton"/>
        
      </form>
    </div>
   </div>
    <!--col-md-6 -->
    
   
_END;

?>

</div>
</div>
</div>
</body>
</html>
