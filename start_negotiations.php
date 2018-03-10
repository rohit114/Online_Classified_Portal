<?php
require_once "core.php" ;
require_once "connection.php" ;
	if(isset($_POST['create_neg_adv_id']) && !empty($_POST['create_neg_adv_id']) && isset($_POST['create_neg_username']) && !empty($_POST['create_neg_username']))
	{
		$adv_id = $_POST['create_neg_adv_id'];
		$interested_username = $_POST['create_neg_username'];
		if(isset($_POST['message']) && !empty($_POST['message']))
			$message = $_POST['message'];
		else
			$message = "";
		echo $message ; echo $adv_id;
		$sql_query = "INSERT into `negotiations` VALUES (NULL,'$adv_id','$interested_username','$message')";
		$result = mysqli_query($conn,$sql_query);
		if($result)
		{
			echo "Negotiation successfully created.";
			header('location: '.$http_referer);
			die();
		}
		
		
	}	
	else
		echo "some error occurred" ;
	
?>
<html>
	<title>
		Start Negotiations.
	</title>
<body>
	<a href = "home.php" > Click Here To goto HOME </a>
</body>
</html>
