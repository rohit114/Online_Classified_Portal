 <!DOCTYPE html>

<html lang="en">
<head>
  <title>Contact us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="donation_style.css">
     <link rel="stylesheet" href="alert.css">
</head>
<div class="homeButton">  <a href="http://araniisansthan.com/"> Home </a> </div>
<body>
 <?php 
$dbusername = "root";
$password = "";
$dbname = "aranii";
$servername = "localhost";
// Create connection
$conn = mysqli_connect($servername, $dbusername, $password , $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully <br>";
?>
         
<?php


      $name = "";
      $email = "";
      $phone = "";
      $description = "";
      $address="";
      $date = "";
     

    if(isset($_POST['name'] ) && isset($_POST['email'] ) && isset($_POST['phone'] )  && isset($_POST['description'] )   )

    {

     
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $address=$_POST['address'];
      $description = $_POST['description'];

          if(!empty($name) && !empty($email) && !empty($phone) && !empty($description)   )
          {
        
       
          if(array_key_exists('phone', $_POST) &&  !preg_match('/^[0-9]{10}$/', $_POST['phone']))
          {
              $error = '';
                    
              $error = 'Invalid Number!';
              echo $error;
          }
              
                 $insert_query = "INSERT INTO donation ( name , phone , email  , address  ,description  ) VALUES ('$name','$phone',
                '$email' , '$address',  '$description')";

                 $insert_query_run = mysqli_query($conn , $insert_query);

                 echo '<div class="alert1"> Your message is  successfully sent to Aranii Sansthan We will contact you soon, Thank you ! </div>';
              
          }
      }
      echo <<< _END
        <div class="container">
    <div class="col-md-6">
    <div id="logbox">
      <form id="contact us" method="post" action="donation.php" enctype="multipart/form-data">
        <h1>Contact us to make a donation !</h1>

        <input name="name" type="text"  placeholder="What's your name ?" class="input pass"  autofocus="autofocus" value="$name" required ="required"/>
        
        
        <input name="phone" type="number" placeholder="Phone Number" class="input pass" value = "$phone" required = "required"  />
        
        <input name="email" type="email" placeholder="Email address" class="input pass" required = "required" value = "$email"/>
        <input name="address" type="text" placeholder="Address *(OPTIONAL)" class="input pass" value = "$address"   />
        <textarea  name = "description" placeholder="Leave a message in 200 characters" class="input pass" value = "$description" required="required"   ></textarea> </br>
        <input type="submit" value="Submit!" class="inputButton"/>
        
      </form>
    </div>
   </div>
    <!--col-md-6 -->
    
<div class="col-md-8" style="margin:50px 0px;">
<img src="buy.png" style="width:100%;" />
</div>
   
    
  </div>
  


  

  </body>
</html>

_END;

?>

 

