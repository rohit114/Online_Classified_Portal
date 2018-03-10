 <!DOCTYPE html>
<?php require_once 'core.php' ; ?>
<html lang="en">
<head>
  <title>Create Advertisement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="create_adv_style.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="not_loggedin.css">
    <link rel="stylesheet" href="alert.css">
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
include_once('connection.php');
if(!loggedin())
{
	echo <<< _END
  <div class= "alert1">
	You are not logged in </br> You must be logged in to Post Advertisement </br><a href="login.php">Click Here </a> to login.<br>
	If you are new user , <a href = "signup.php">Click here</a> to register.</div>
_END;
}
else
{
      $title = "";
      $price = "";
      $phone = "";
      $description = "";
      $area = "";
      $category = "";
      $address="";
      $image_path="";
      $price_initial="";
      $price_final="";
	  $username = $_SESSION['username'];

    if(isset($_POST['title'] ) && isset($_POST['price'] ) && isset($_POST['phone'] ) && isset($_POST['area'] ) &&
    			 isset($_POST['category'] ) && isset($_POST['description'] )   )

   	{

		  //echo "Hello World 2 !";
		  $title = $_POST['title'];
		  $price = $_POST['price'];
		  $phone = $_POST['phone'];
		  $description = $_POST['description'];
		  $area = $_POST['area'];
		  $category = $_POST['category'];
		  $address=$_POST['address'];
		  $price_array =explode("-", $price);
		  $price_initial = $price_array[0];
		  $price_final = $price_array[1];
		  $target_dir = "user_uploads/";
		  $Filename=basename( $_FILES['Filename']['name']);
		  $Filename = preg_replace('/\s+/', '', $Filename);  
		  $target = $target_dir.$Filename;
		  $j = 1;
		  while(file_exists($target))
		  {
		  	  $target = $target_dir.$Filename."($j)";
		  	  $j = $j + 1;
		  }
          $temp_approve = false;

      	  if(!empty($title) && !empty($price) && !empty($phone) && !empty($description)&& !empty($area) && !empty($category)   )
      	  {
        
       
		      if(array_key_exists('phone', $_POST) &&  !preg_match('/^[0-9]{10}$/', $_POST['phone']))
		      {
		          $error = '';
		                
		          $error = 'Invalid Number!';
		          echo $error;
		      }
          	  else if(move_uploaded_file($_FILES['Filename']['tmp_name'], $target))
          	  {
                 $insert_query = "INSERT INTO advertisements (adv_id, username , title , price_initial , price_final ,
                  phone ,  address,area, category , description ,  image , approve ) VALUES (NULL, '$username', '$title', 
                  '$price_initial', '$price_final', '$phone', '$address', '$area', '$category', '$description', '$Filename' , '$temp_approve')";

                 $insert_query_run = mysqli_query($conn , $insert_query);

                 echo '<div class="alert1"> Your Advertisement is posted Successfully in our database, your post is sent  to be reviewed by us Our Admin & hopefully approved by our admin shortly , Thank you :)  </div>';
           	  }
           	  else
           	  {
           	  		echo "There was some error uploading your file";
           	  }
          }
      }
      echo <<< _END
        <div class="container">
    <div class="col-md-6">
    <div id="logbox">
      <form id="create_adverisement" method="post" action="create_adv.php" enctype="multipart/form-data">
        <h1>Create your Advertisement</h1>
        <input name="title" type="text"  placeholder="Title of Adverisement " class="input pass"  autofocus="autofocus" value="$title" required = "required"/>
        
        <input name="price" type="text" placeholder="Enter Price e.g: 1000-2000" class="input pass"  required = "required"  />
        <input name="phone" type="number" placeholder="Phone Number" class="input pass" value = "$phone" required = "required"  />
        <input name="address" type="text" placeholder="Address *(OPTIONAL)" class="input pass" value = "$address"   />
        
        <select  name =  "area" class="input pass"  value = "$area" required = "required">
        <option  value="">___Select your locality____</option>
        <option  value="chhapra" >Chhapra</option>
        <option  value="jaipur" >Jaipur</option>
        <option  value="sikar">Sikar</option>
        <option  value="kota">Kota</option>
        <option  value="ajmer">Ajmer</option>
        <option  value="jodhpur">Jodhpur</option>
        <option  value="jaisalmer">Jaisalmer</option>
        </select>

        
        <select name= "category"   class="input pass"  value = "$category" required = "required">
        <option  value="">___Select product category____</option>
        <option  value="bicycle">Bicycle</option>
        <option  value="book">Book</option>
        <option  value="mobile">Mobile Phone</option>
        <option  value="accesories">Accesories</option>
        <option  value="other">Others</option>
        
        </select>

        <textarea  name = "description" placeholder="Describe product in 200 characters" class="input pass"  required="required" ></textarea> </br>

        <input type="file" name="Filename" id="fileToUpload">
        
        <input type="submit" value="Submit!" class="inputButton"/>
        
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

 

