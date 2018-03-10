<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="$$hosted_libs_prefix$$/$$version$$/material.min.css">
  
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<link href="css/login_style.css" rel="stylesheet">
<link href="css/divison_style.css" rel="stylesheet">
<link href="timeline.css" rel="stylesheet">
<body>




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

     

      <li> <a href="profile.php"><?php 
      require'core.php';
      $name="";
      
      $name = $_SESSION['username'];
      
       if(isset($name) && !empty($name))
       echo 'Welcome !'. $name;
       else
       echo''; ?> </li>

      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
      <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Sign In</a>
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a>

      </ul>


    </div>  

   
     
  </div>
</nav>

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="advertise.png" alt="adv" width="460" height="345">
        <div class="carousel-caption">
          <h3>ADVERTISE</h3>
          <p>Advertise your business here.</p>
        </div>
      </div>

      <div class="item">
        <img src="buy.png" alt="buy" width="460" height="345">
        <div class="carousel-caption">
          <h3>BUY</h3>
          <p>Buy products over a rabge of stuffs.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="sell.png" alt="sell" width="460" height="345">
        <div class="carousel-caption">
          <h3>SELL</h3>
          <p>Sell your things here</p>
        </div>
      </div>

      <div class="item">
        <img src="rent.png" alt="rent" width="460" height="345">
        <div class="carousel-caption">
          <h3>RENT</h3>
          <p>Rent your stuffs</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="container">
<div class="row" >

  <div class="col-md-12 col-xs-6"  >
  <fieldset >
                <legend>Filter by categeory</legend>
                        <input type="checkbox" name="categeory" value="books" />Books 
                        <input type="checkbox" name="categeory" value="bicycle" />Bicycle
                        <input type="checkbox" name="categeory" value="mobile" />Mobile Phones
                        <input type="checkbox" name="categeory" value="accesories" />Accesories

                         <input type="checkbox" name="categeory" value="others" />Others
                        <input type="submit" value="Filter" />
        </fieldset>
        </div>
        <div class="container">
  <div class="row">
    
        <div class="search">
<input type="text" class="form-control input-sm" maxlength="16" placeholder="Search" />
 <button type="submit" class="btn btn-primary btn-sm">Search</button>
</div>
  </div>
</div>

<?php
include_once('connection.php');


$sql_query =  "select * from advertisements";
$insert_run = mysqli_query($conn , $sql_query);
$i = 1 ;
while($row = mysqli_fetch_assoc($insert_run)){

    //echo '<div id="div'.$i.'">'. $row['title'] .'<div>';
    echo '<div class="container" ><div class="row" id="div'.$i.'"><div class="col-md-7 col-md-offset-4 div" style="overflow:auto;">
    <div class="col-md-4"><img src='.$row['image'].' style="width:100%;"></div>
    <div class="col-md-8" style="overflow:auto;">
    <p style="text-align:center;" class = title><b>'.$row['title'].'</b></p>
    <p style="text-align:center;" class = price >'.$row['price_initial'].'-'.$row['price_final'].'</p>
    <p style="text-align:center;" class = price>'.$row['area'].'</p>
    <p style="text-align:center;">'.$row['phone'].'</p><br>
    <p style="text-align:center;">'.$row['address'].'</p><br>
    <p style="text-align:center;">'.$row['description'].'</p><br>

               </div>
          </div>
    </div> </div> ';

    $i++;
}


?>

  


 
  
  
</div>

</div>

<!-- FOOTER starts ********************************************************* -->

<link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<!--footer start from here-->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter"> Logo</div>
        <p>Khareedo Becho is an online Classified Portal , where buyer meets the seller !</p>
        <p><i class="fa fa-map-pin"></i> Room 159, Hostel 5, MNIT, Jaipur -302017, INDIA</p>
        <p><i class="fa fa-phone"></i> Phone (India) : +91 9672421899</p>
        <p><i class="fa fa-envelope"></i> E-mail : info@khareedobecho.com</p>
        
      </div>
      <div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">GENERAL LINKS</h6>
        <ul class="footer-ul">
        <li><a href="#"> About Us</a></li>
          <li><a href="#"> Career</a></li>
          <li><a href="#"> Privacy Policy</a></li>
          <li><a href="#"> Terms & Conditions</a></li>
          
          <li><a href="#"> Frequently Ask Questions</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">LATEST POST</h6>
        <div class="post">
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/rgraphicss"><a href="https://www.facebook.com/rgraphicss">Facebook</a></blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--footer start from here-->

<div class="copyright">
  <div class="container">
    <div class="col-md-6">
      <p>© 2016 - All Rights Reserved , Khareedo Becho</p>
    </div>
    <div class="col-md-6">
      <ul class="bottom_ul">
        <li><a href="#">khareedobecho.com</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Faq's</a></li>
        <li><a href="#">Contact us</a></li>
        <li><a href="#">Site Map</a></li>
      </ul>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

</body>
</html>

