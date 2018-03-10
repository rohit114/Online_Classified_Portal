<?php
require_once 'core.php';

session_unset();

header('location: '.$http_referer);
#header('location: http://araniisansthan.com/');
#echo $http_referer ;



?>
