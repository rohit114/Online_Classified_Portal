<?php 
require_once 'core.php'; 
require_once 'connection.php';

?>

<?php

$approved = true;
if( isset($_POST['upid']) )
	$adv_id = $_POST['upid'];
else
	$adv_id = -1 ;
$insert_query = " UPDATE `advertisements` SET `approve` = '$approved' WHERE `adv_id`= '$adv_id' " ;
                $insert_query_run = mysqli_query($conn , $insert_query);



header('location: '.$http_referer);

//*****************************

	

?>
