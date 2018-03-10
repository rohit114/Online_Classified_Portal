<?php
require_once 'core.php';
require_once 'connection.php';
if(isset($_POST['delid']) && !empty($_POST['delid']))
{
	$delid = $_POST['delid'];
	$sql_query = "DELETE from advertisements where `adv_id` = '$delid' " ;
	$insert_run = mysqli_query($conn , $sql_query);
	if($insert_run)
		echo "successfully deleted $delid";
}
header('location: '.$http_referer);

?>
