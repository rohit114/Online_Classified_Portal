 <?php

include_once('connection.php');
require_once 'core.php';

if(loggedin())
{
	$username = $_SESSION['username'];
	$sql_query =  "SELECT * FROM `users` WHERE username = '$username'  ";
	$insert_run = mysqli_query($conn , $sql_query);
	$row = mysqli_fetch_assoc($insert_run);
	$name = $row['name'];$username = $row['username'];$email = $row['email'];$phone=$row['phone'];
	echo <<< _END
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
<link href="alert.css" rel="stylesheet">
<body style="background-color:#FFF;">
<nav class="navbar-fixed navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Khreedo Becho</a>
    </div>

    <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
    <span class ="icon-bar"></span>
    <span class ="icon-bar"></span>
    <span class ="icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse navHeaderCollapse">

      <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="home.php">Home</a></li>

      <li> 
  <a href = "create_adv.php">Create Advertisement</a></li>
  <li class="active"><a href="notifications.php">Notifications</a></li>
     

	 </ul>
    </div>  

   
     
  </div>
</nav>

<br>

      
      <div class="container">
  <div class="row">
    
        
        
       <div class="col-md-7 ">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 

  

                
           <!--     <input id="profile-image-upload" class="hidden" type="file">
<div style="color:#999;" >click here to change profile image</div> -->
                <!--Upload Image Js And Css-->  
           
              
   
                
                
                     
                     
                     </div>

              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"> $name</h4>
              <span><p></p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital " >Name:</div><div class="col-sm-7 col-xs-6 ">$name</div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >User Name:</div><div class="col-sm-7">$username</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>


<div class="col-sm-5 col-xs-6 tital " >Phone:</div><div class="col-sm-7">$phone</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7">$email</div>



            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
    
    </div>
</div>



 

_END;



$sql_query = "SELECT * FROM advertisements where `username` = '$username' ORDER BY `adv_id` DESC";

//echo $sql_query;
$insert_run = mysqli_query($conn , $sql_query);
	$i = 1 ;
	if($insert_run)
	{
		while($row = mysqli_fetch_assoc($insert_run))
		{
      if($row['approve'] == true)
      $post_status = "green.png";
      else 
      $post_status = "red.png";

    
			$adv_id = $row['adv_id'];
			
			$image_path = "user_uploads/".$row['image'];

      echo '<div class="container" >
			<div class="row" id="div'.$i.'"><div class="col-md-8 col-md-offset-3 div"
			 style="overflow:auto;">
			<div class="col-md-4"><img src='.$image_path.' style="width:100%;"></div>
			<div class="col-md-8" style="overflow:auto;">
      
			<form action = "delete_post.php" method = "post">
			<input type="hidden" name="delid" value='.$adv_id.' />
			<input type="submit" value="delete">
			</form>
			<form action="update_post.php" method="post">
			<input type="hidden" name="upid" value='.$adv_id.' />
			<input type="submit" value="update">
			</form>
      Approval Status:<img src = '.$post_status.' height= "20" width= "20" /> 

			<p style="text-align:center;" class = title><b>'.$row['title'].'</b></p>
			<p style="text-align:center;" class = price >'.$row['price_initial'].'-'.$row['price_final'].'</p>
			<p style="text-align:center;" class = price>'.$row['area'].'</p>
			<p style="text-align:center;">'."Phone Number: ".$row['phone'].'</p>
			<p style="text-align:center;">'.$row['address'].'</p>
			<p style="text-align:center;">'.$row['description'].'</p>
			<p style="text-align:center;">'.$row['datetime'].'(Last Updated)</p><br>
			</div></div>
			</div> </div> ';
$i++;
		}
	}
	echo <<< _END
	</body>
	</html>
_END;

}
else
{
	echo <<< _END
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
    <link rel="stylesheet" href="css/signup_style.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="alert.css">
</head>

<body>
	<div class="alert1">You are not logged in. You must be logged in to Post Advertisement.<br><a href="login.php">Click Here </a> to login.<br>
	If you are new user , <a href = "signup.php">Click here</a> to register.<br><a href="home.php">Click Here</a> to go to Home. </div>
</body>
</html>
_END;
	
}
?>
