<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="timeline.css" rel="stylesheet">

  

    
</head>
<body>
<div class="container">
<?php
include_once('connection.php');

/*
$somearray = array(
        'animal'=>'cat',
        'place'=>'earth',
        'food'=>'orange'
);
$i=1;
foreach ($somearray as $k=>$v){
    echo '<div id="div'.$i.'">'. $v .'<div>';
    $i++;
}
*/

$sql_query =  "select * from advertisements";
$insert_run = mysqli_query($conn , $sql_query);
$i = 1 ;
while($row = mysqli_fetch_assoc($insert_run)){

    //echo '<div id="div'.$i.'">'. $row['title'] .'<div>';
    echo '<div class="row" id="div'.$i.'"><div class="col-md-7 col-md-offset-4 div" style="overflow:auto;">
    <div class="col-md-4"><img src='.$row['image'].' style="width:100%;"></div>
    <div class="col-md-8" style="overflow:auto;">
    <p style="text-align:center;" class = title><b>'.$row['title'].'</b></p>
    <p style="text-align:center;" class = price >'.$row['price_initial'].'-'.$row['price_final'].'</p>
    <p style="text-align:center;" class = price>'.$row['area'].'</p>
    <p style="text-align:center;">'.$row['phone'].'</p><br>
    <p style="text-align:center;">'.$row['address'].'</p><br>
    <p style="text-align:center;">'.$row['description'].'</p><br>

    </div>
    </div></div> ';

    $i++;
}


?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>