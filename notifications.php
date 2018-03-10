<?php 
	
	require_once "core.php";
	require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome ! $username</title>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <link rel="stylesheet" href="css/signup_style.css">
    <link rel="stylesheet" href="profile.css"> 
</head>
<link href="css/login_style.css" rel="stylesheet">
<link href="css/divison_style.css" rel="stylesheet">
<link href="timeline.css" rel="stylesheet">
<body style="background-color:#FFF;">
 <div class="collapse navbar-collapse navHeaderCollapse">

      <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="home.php">Home</a></li>

      <li> 
  <a href = "create_adv.php">Create Advertisement</a></li>
     


      <?php 
      if(loggedin())
      {
      		$temp = $_SESSION['username'];
      		echo <<< _END
      		<li><a href="profile.php">Welcome ! $temp</a>
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

   
     
  </div>
</nav>
      
      

  
 <div class="container" >
      <div class="row"   >
      <div class="col-md-12 col-md-offset-2 div"   style="overflow:auto;" >
      
      
      
      <p style="text-align:center;" class = phone><b> Your Notifications !</b></p> 
<?php
	if(loggedin())
	{
		
		$username = $_SESSION['username'];
		$sql_query = "SELECT * from `negotiations` NATURAL JOIN `advertisements` WHERE `advertisements`.`username` = '$username'";
		$result = mysqli_query($conn,$sql_query);
		if($result)
		{
			$i = 1;
			while($row = mysqli_fetch_assoc($result))
			{
				$interested_username = $row['interested_username'];
				$adv_id = $row['adv_id'] ;
				$title = $row['title'];
				$message = $row['message'];
				echo <<< _END
				<p style="text-align:left;" class = phone><b>$i.$interested_username is intrested in your advertiement titled: $title , contact the buyer soon!</b><br>$interested_username's message: <i>$message</i> </br></p>
				<form method="post" action="user_profile.php" id="form1">
				<input type="hidden" name="username" value="$interested_username" />
				<a href="user_profile.php?username=$interested_username" onclick="document.getElementById('form1').submit(); return false;"> View $interested_username's Profile</a>
</form>
<br><br>
_END;
				$i = $i + 1;
			}
		}
	}

?>
</div></div>
</div> </div>
</body>
</html>
