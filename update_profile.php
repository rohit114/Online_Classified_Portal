 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="create_adv_style.css">
</head>
<body>
<?php
include_once('connection.php');
      $phone2 = "";
      $email2 = "";
      $line1= "";
      $line2= "";
      $line3= "";
      $phone = "";
      $description = "";
      $area = "";
      $category = "";
      $address="";
      $image_path="";
      $price_initial="";
      $price_final="";
     
      
     

   

      //echo "Hello World 2 !";
      $title = $_POST['title'];
      $price = $_POST['price'];
      $phone = $_POST['phone'];
      $description = $_POST['description'];
      $area = $_POST['area'];
      $category = $_POST['category'];
      $address=$_POST['address'];
      $image_path=$_POST['imgToUpload'];
      $price_array =explode("-", $price);
      $price_initial = $price_array[0];
      $price_final = $price_array[1];

      
      if(!empty($title) && !empty($price) && !empty($phone) && !empty($description)&& !empty($area) && !empty($category)   )
      {
        
       
          if(array_key_exists('phone', $_POST) &&  !preg_match('/^[0-9]{10}$/', $_POST['phone']))
          {
              $error = '';
                    
              $error = 'Invalid Number!';
              echo $error;
          }
          else
          {
                 $insert_query = "INSERT INTO advertisements (adv_id, username , title , price_initial , price_final , phone , address, area, categeory , description ,  image ) VALUES (NULL, 'user', '$title', '$price_initial', '$price_final', '$phone', '$address', '$area', '$category', '$description', '$image_path')";

                 $insert_query_run = mysqli_query($conn , $insert_query);

                 echo "Advertisement Successfully posted in our database !";
            

          }
          
        
        
      }
      
      

   }
    

  ?>

  <div class="container">
    <div class="col-md-6">
    <div id="logbox">
      <form id="create_adverisement" method="post" action="update_profile.php">
        <h1>Upadate profile</h1>
        
        
        
        <input name="phone" type="number" placeholder="Secondary Phone Number" class="input pass" value = "<?php echo $phone2; ?>"  />
        
        <input name="email" type="email" placeholder="Secondary email" class="input pass" value = "<?php echo $email2; ?>"  />
        
        <select  name =  "area" class="input pass"  value = "<?php echo $area; ?>" >
        <option  value="">___Select your locality____</option>
        <option  value="chhapra" >Chhapra</option>
        <option  value="jaipur" >Jaipur</option>
        <option  value="sikar">Sikar</option>
        <option  value="kota">Kota</option>
        <option  value="ajmer">Ajmer</option>
        <option  value="jodhpur">Jodhpur</option>
        <option  value="jaisalmer">Jaisalmer</option>
        </select>


       <input name="line1" type="text" placeholder="*Address Line 1"  class="input pass"  value="<?php     ?>"/>
         <input name="line2" type="text" placeholder="*Address Line 2"   class="input pass"  value="<?php     ?>"/>
         <input name="line3" type="text" placeholder="*Address Line 3"  class="input pass"  value="<?php     ?>"/> 
         <input name="landmark" type="text" placeholder="*Landmark"  class="input pass"  value="<?php     ?>"/>   
         </br>
         <p>upload profile picture </p>        
        
        <input type="file" name="imgToUpload" id="fileToUpload">
        
        <input type="submit" value="Submit!" class="inputButton"/>
        
      </form>
    </div>
   </div>
    <!--col-md-6 -->
    
   
    
  </div>
  


  

  </body>
</html>


