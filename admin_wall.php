<!DOCTYPE html>
<?php require_once 'core_admin.php'; ?>
<html lang="en">
<head>
  <title>Khreedo Becho</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="$$hosted_libs_prefix$$/$$version$$/material.min.css">
    <link rel="stylesheet" href="alert.css">
  
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<link href="login_style.css" rel="stylesheet">
<link href="css/divison_style.css" rel="stylesheet">
<link href="timeline.css" rel="stylesheet">
<body >




<nav class="navbar-fixed navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin_wall.php">Khareedo Becho ( ADMIN PANEL )</a>
    </div>

    <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
    <span class ="icon-bar"></span>
    <span class ="icon-bar"></span>
    <span class ="icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse navHeadeorCollapse">

      <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="admin_wall.php">Home</a></li>
      
     


      <?php 
      if(loggedin_admin())
      {
      		$temp = $_SESSION['username_admin'];
      		echo <<< _END
      		<li><a href="logout.php">Logout</a> 
_END;
      		
      }
      else
      {
      		echo <<< _END
      		
      		<li><a href="admin.php"><span class="glyphicon glyphicon-user"></span>Admin Sign In</a>
_END;
      }
     
      ?>

	 </ul>
    </div>  

   
     
  </div>
</nav>






<div class="container">
<div class="container">
<div class="row" >

  <div class="col-md-12 col-xs-6"  >
  	<form method="post" action="admin_wall.php">
	<fieldset style="padding:20px;">
  <div class="col-md-3">
                <legend>Filter by category</legend>
                        <input type="checkbox" name="category[]" value="book" />Books 
                        <input type="checkbox" name="category[]" value="bicycle" />Bicycle
                        <input type="checkbox" name="category[]" value="mobile" />Mobile Phones
                        <input type="checkbox" name="category[]" value="accesories" />Accesories
						<input type="checkbox" name="category[]" value="other" />other
            </div>
            <div class="col-md-3">
				<legend>Filter by Area</legend>
						<select  name =  "area" class="input pass"  value = "$area">
        				<option  value="">___Select your locality____</option>
						<option  value="chhapra" >Chhapra</option>
						<option  value="jaipur" >Jaipur</option>
						<option  value="sikar">Sikar</option>
						<option  value="kota">Kota</option>
						<option  value="ajmer">Ajmer</option>
						<option  value="jodhpur">Jodhpur</option>
						<option  value="jaisalmer">Jaisalmer</option>
						</select>
            </div>
            <div class="col-md-3">
				<legend>Filter by Price</legend>
						<input type="number" name="init_price" placeholder="lowest price">
						<input type="number" name="final_price" placeholder="heighest price">
				</div>	
        <div class="col-md-3">			
				<input type="submit" value="Filter" style="margin-top:23%;" />
        </div>
        
     </fieldset>
	</form>
     </div>
      </div>
      </div>
<?php
include_once('connection.php');
if(loggedin_admin())
{
if(isset($_SESSION['registered']) && $_SESSION['registered'] == 1)
{
	echo 'You are Successfully Registered' ;
	$_SESSION['registered'] = 0 ;
}
$sql_query = "SELECT * FROM advertisements WHERE `approve` = '0' " ;
$clause = " AND ( ";
$cat_add = "";
$area_add = "" ;
$tot_add = "";
$price_add = "" ;
$display_message = "" ;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['category']))
	{
		$category = $_POST['category'];
		foreach($category as $temp)
		{
			if(!empty($temp))
			{
				$cat_add .= $clause."`"."category"."` = '{$temp}'";
                $clause = " OR ";//Change  to OR after 1st WHERE
			}
		}
	}
	if(!empty($cat_add))
	{
		$cat_add =  $cat_add . " )" ;
		$clause = " AND ( ";
	}
	if(isset($_POST['area']) && !empty($_POST['area']))
	{
		$temp = $_POST['area'] ;
		$area_add .= $clause."`"."area"."`"." = '{$temp}'" ;
		$area_add = $area_add." ) ";
		$clause = " AND ( " ;
	}
	if(isset($_POST['init_price']) && !empty($_POST['init_price']))
	{
		$price_initial = $_POST['init_price'];
	}
	else
	{
		$price_initial = "0";
	}
	if(isset($_POST['final_price']) && !empty($_POST['final_price']))
	{
		$price_final = $_POST['final_price'];
	}
	else
	{
		$price_final = "999999" ;
	}
	$price_add .= $clause."`price_initial`"." >= {$price_initial}"." AND "."`price_final`"." <= {$price_final} )";
	$tot_add = $cat_add.$area_add.$price_add ;		 
}
	$sql_query =  $sql_query." ".$tot_add." ORDER BY `adv_id` DESC";
	//echo $sql_query ;
	$insert_run = mysqli_query($conn , $sql_query);
	$i = 1 ;
	if($insert_run)
	{
		while($row = mysqli_fetch_assoc($insert_run))
		{

			$image_path = "user_uploads/".$row['image'];
      $adv_id = $row['adv_id'];
			//echo $image_path;
			echo '<div class="container" ><div class="row" id="div'.$i.'"><div class="col-md-7 col-md-offset-4 div"
			 style="overflow:auto;">
			<div class="col-md-4"><img src='.$image_path.' style="width:100%;"></div>
			<div class="col-md-8" style="overflow:auto;">
      <form action = "delete_post.php" method = "post">
      <input type="hidden" name="delid" value='.$adv_id.' />
      <input type="submit" value="delete">
      </form>
      <form action="approve.php" method="post">
      <input type="hidden" name="upid" value='.$adv_id.' />
      <input type="submit" value="Approve">
      </form>
			<p style="text-align:center;" class = title><b>'.$row['title'].'</b></p>
			<p style="text-align:center;" class = price >'.$row['price_initial'].'-'.$row['price_final'].'</p>
			<p style="text-align:center;" class = price>'.$row['area'].'</p>
			<p style="text-align:center;">'."Phone Number: ".$row['phone'].'</p>
			<p style="text-align:center;">'.$row['address'].'</p>
			<p style="text-align:center;">'.$row['description'].'</p>
			<p style="text-align:center;">Posted on :'.$row['datetime'].'</p>

				       </div>
				  </div>
			</div> </div> ';

			$i++;
		}

	}

}
else
	echo '<div class="alert1">Please Login</div></br><br>';
?>

  


 
  
  
</div>

</div>


<div class="copyright">
  <div class="container">
    <div class="col-md-6">
      <p>© 2016 - All Rights Reserved , Khareedo Becho</p>
    </div>
    <div class="col-md-6">
      <ul class="bottom_ul">
        <li><a href="#">khareedobecho.com</a></li>
        <li><a href="#">About us</a></li>
        
        <li><a href="#">Faq's</a></li>
        <li><a href="#">Contact us</a></li>
        
      </ul>
    </div>
  </div>
</div>

  

</body>
</html>

