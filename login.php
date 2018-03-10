 <?php require_once'core.php';
require_once 'connection.php'; ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="signup_style.css">
</head>
<body style="background-color: #3cc;">

 <div class="collapse navbar-collapse navHeaderCollapse">

      <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="home.php">Home</a></li>
      <li> <a href = "create_adv.php">Create Advertisement</a></li>
   


      <?php 
      if(loggedin())
      {
      		$temp = $_SESSION['username'];
      		echo <<< _END
      		<li><a href="user_profile.php">Welcome $temp</a>
      		<li><a href="logout.php">Logout</a> 
_END;
      		
      }
      else
      {
      		echo <<< _END
      		<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
      		<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Sign In</a>
_END;
      }
     
      ?>

	 </ul>
    </div>  
    <div class="container">
<?php

$username = "";
if(loggedin())
{
	if(isset($_SESSION['just_now']) && $_SESSION['just_now'] == 1)
	{
		$_SESSION['just_now'] = 0 ;
		header("location:home.php");
		die();
	}
	$username=$_SESSION['username'];
	//echo  "you are already logged in as  "  .$_SESSION['username']."<br>". ""; 
	echo '<div class="alert1"> ."you are already logged in !!</div> ';
	echo <<< _END

	'<div class="alert1"><a href="home.php">Click here to go to home page</a> </div> </br>';
_END;
}
else
{
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
			 
			  echo '<div class="alert1"><h5>Invalid Username or Password</h5></div>';
			}
			else if($query_num_row == 1)
			{
				$_SESSION['username'] = $username;
				$_SESSION['just_now'] = 1;
				$temp = $_SERVER['HTTP_REFERER'];
				//echo temp;
				header("location:$temp");
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
      <form id="signin" method="post" action="login.php">
        <h1>Sign in to your account</h1>
       
        <input name="username" type="text" placeholder="What's your username?" pattern="^[\w]{3,16}$" class="input pass" required="required" value="$username" autofocus="autofocus" />
        <input name="password" type="password" placeholder="Enter Password" required="required" class="input pass"/>
        
        <input type="submit" value="Sign me in!" class="inputButton"/>
        
      </form>
    </div>
   </div>
    <!--col-md-6 -->
    
   
_END;
}
?>
<div class="col-md-8" style="margin:50px 0px;">
<img src="buy.png" style="width:100%;" />
</div>
</div>
</div>
</body>
</html>
