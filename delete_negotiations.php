<?php
require_once "core.php" ;
require_once "connection.php" ;
	if(isset($_POST['del_neg_id']) && !empty($_POST['del_neg_id']))
	{
		$neg_id = $_POST['del_neg_id'];
		$sql_query = "DELETE from `negotiations` WHERE `neg_id` = '$neg_id'";
		$result = mysqli_query($conn,$sql_query);
		if($result)
		{
			echo "Negotiation successfully deleted.";
			header('location: '.$http_referer);
			die();
		}
		
		
	}	
	else
		echo "some error occurred" ;
	
?>
<html>
	<title>
		Delete Negotiations.
	</title>
<body>
	<a href = "home.php" > Click Here To goto HOME </a>
</body>
</html>
