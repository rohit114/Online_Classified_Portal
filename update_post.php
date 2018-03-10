 <!DOCTYPE html>
<?php
	require_once 'core.php' ;
	require_once 'connection.php'
?>
<html lang="en">
<head>
  <title>update post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="create_adv_style.css">
    <link rel="stylesheet" href="alert.css">
    <link rel="stylesheet" href="signup_style.css">
</head>
<body>
<div class="collapse navbar-collapse navHeaderCollapse">

      <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="home.php">Home</a></li>
  	  <?php 
      if(loggedin())
      {
      		$temp = $_SESSION['username'];
      		echo <<< _END
      		<li><a href="profile.php">Welcome $temp</a>
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
<?php
if(isset($_POST['upid']) && !empty($_POST['upid']))
{
	$upid = $_POST['upid'];
	echo $upid ;
}
else
{
	header('location:'.'home.php');
	die();
}
?>


<?php
if(!loggedin())
{
	echo <<< _END
	You are not logged in. You must be logged in to Post Advertisement.<br><a href="login.php">Click Here </a> to login.<br>
	If you are new user , <a href = "signup.php">Click here</a> to register.
_END;
}
else
{
      $sql_query = "Select * from advertisements where `adv_id` = '$upid'";
      $insert_run = mysqli_query($conn , $sql_query);
	  if($insert_run)
	  {
		  $row = mysqli_fetch_assoc($insert_run);
		  $title = $row['title'];echo $title ;
      	  $price = $row['price_initial']."-".$row['price_final'];
		  $phone = $row['phone'];
		  $description = $row['description'];
		  $area = $row['area'];
		  $category = $row['category'];
		  $address= $row['address'];
		  if(empty($address))
		  		$address = "null";
		  $image_path= $row['image'];
		  $price_initial=$row['price_initial'];
		  $price_final= $row['price_final'];
		  $username = $row['username'];
		  $Filename = $row['image'];
			
	  }

    if(isset($_POST['title'] ) && isset($_POST['price'] ) && isset($_POST['phone'] ) && isset($_POST['area'] ) &&
    			 isset($_POST['category'] )  )

   	{

		  //echo "Hello World 2 !";
      $false= false;
		  $title = $_POST['title'];
		  $price = $_POST['price'];
		  $phone = $_POST['phone'];
		  $description = $_POST['description'];
		  $area = $_POST['area'];
		  $category = $_POST['category'];
		  if(isset($_POST['address']) && !empty($_POST['address']))
		  	$address=$_POST['address'];
		  $price_array =explode("-", $price);
		  $price_initial = $price_array[0];
		  $price_final = $price_array[1];
		  $target_dir = "user_uploads/";

		  if(isset($_FILES['Filename']['name']) && !empty($_FILES['Filename']['name']))
		  {
		  		$Filename = basename( $_FILES['Filename']['name']) ;
		  		$f = 1;
		  }
		  else
		  		$f = 0;
		  echo $f+3;
		  $Filename = preg_replace('/\s+/', '', $Filename);  
		  $target = $target_dir.$Filename; 
		  $j = 1;
		  while(file_exists($target))
		  {
		  	  $target = $target_dir.$Filename."($j)";
		  	  $j = $j +1 ;
		  } 
		  if($j > 1 && $f == 1)
		  {
		  		$j = $j-1;
		  		$Filename = $Filename."($j)";
		  }
      	  if(!empty($title) && !empty($price) && !empty($phone) && !empty($area) && !empty($category)   )
      	  {
        
       		  
		      if(array_key_exists('phone', $_POST) &&  !preg_match('/^[0-9]{10}$/', $_POST['phone']))
		      {
		          $error = '';
		                
		          $error = 'Invalid Number!';
		          //echo $error;
		      }
          	  else if($f == 1 && move_uploaded_file($_FILES['Filename']['tmp_name'], $target))
          	  {
				$insert_query = " UPDATE `advertisements` SET `title` = '$title' , `price_initial` = '$price_initial',
           	  		 `price_final` = '$price_final' , `address` = '$address' , `description` = '$description' ,
           	  		 `image` = '$Filename',`category` = '$category' , `approve`= '$false' WHERE `adv_id` = '$upid'" ;
                $insert_query_run = mysqli_query($conn , $insert_query);
				if($insert_query_run)
                 	echo '<div class="alert1">Advertisement Successfully updated , And will be reviewed and updated by admin !</div>';
                 else
                 	echo 'fail 1';
           	  }
           	  else if($f == 0)
           	  {
           	  		 $insert_query = " UPDATE `advertisements` SET `title` = '$title' , `price_initial` = '$price_initial',
           	  		 `price_final` = '$price_final' , `address` = '$address' , `description` = '$description' ,
           	  		 `image` = '$Filename',`category` = '$category' , `approve`= '$false' WHERE `adv_id` = '$upid'" ;
               		 $insert_query_run = mysqli_query($conn , $insert_query);
					if($insert_query_run)
                 		echo '<div class="alert1">.Advertisement Successfully updated , And will be reviewed and approved by admin!</div>';
                 	else
                 		echo 'fail 0';
           	  }
           	  else
           	  {
           	  		echo '<div class="alert1">There was some error uploading your file</div>';
           	  }
          }
      }
      echo <<< _END
        <div class="container">
    <div class="col-md-6">
    <div id="logbox">
      <form id="create_adverisement" method="post" action="update_post.php" enctype="multipart/form-data">
        <h1>Update Advertisement</h1>
        <input name="title" type="text"  placeholder="Title of Adverisement " class="input pass"  autofocus="autofocus" value="$title" required = "required"/>
        
        <input name="price" type="text" placeholder="Enter Price e.g: 1000-2000" class="input pass" value="$price" required = "required"  />
        <input name="phone" type="number" placeholder="Phone Number" class="input pass" value = "$phone" required = "required"  />
        <input name="address" type="text" placeholder="Address *(OPTIONAL)" class="input pass" value = "$address"   />
        
        <select  name =  "area" class="input pass"  value = "$area" required = "required">
        <option  value='$area'>$area</option>
        <option  value="chhapra" >Chhapra</option>
        <option  value="jaipur" >Jaipur</option>
        <option  value="sikar">Sikar</option>
        <option  value="kota">Kota</option>
        <option  value="ajmer">Ajmer</option>
        <option  value="jodhpur">Jodhpur</option>
        <option  value="jaisalmer">Jaisalmer</option>
        </select>

        
        <select name= "category"   class="input pass"  value = "$category" required = "required">
        <option  value='$category'>$category</option>
        <option  value="bicycle">Bicycle</option>
        <option  value="book">Book</option>
        <option  value="mobile">Mobile Phone</option>
        <option  value="accesories">Accesories</option>
        <option name = "category" value="other">Others</option>
        
        </select>

        <textarea  name = "description" class="input pass"  >$description</textarea> </br>

        <input type="file"  name="Filename" id="fileToUpload">
        <input type="hidden" name = "upid"value='$upid'>
        
        <input type="submit" value="UPDATE!" class="inputButton"/>
        
      </form>
    </div>
   </div>
    <!--col-md-6 -->
    
   
    
  </div>
  


  

  </body>
</html>

_END;
}
?>

 


