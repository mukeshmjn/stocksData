<?php

require('db.php');
$clcoi = $_GET['clcoi'];
$putcoi = $_GET['putcoi'];
$diff = $_GET['diff'];
$pcr = $_GET['pcr'];
$time = $_GET['time'];
//  echo "You win";
$query    = "INSERT into `niftystock` (clcoi, putcoi, diff, pcr, time )
                     VALUES ('$clcoi', '$putcoi', '$diff' ,'$pcr','$time')";
                      $result   = mysqli_query($con, $query);
                      if($result){
                        echo $clcoi.$putcoi.$diff.$pcr.$time;
                      }
                      else{
                        echo 'Failed';
                      }

// echo $pecoi.$diff;
// echo ;
// $parts = parse_url($url);
// parse_str($parts['query'], $query);
// echo $query['clcoi'];


?>