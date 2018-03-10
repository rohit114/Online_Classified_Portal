 <?php

include_once('connection.php');
require_once 'core.php';
	$username = $_POST['username'];
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

echo <<< _END
	</body>
	</html>
_END;
?>
