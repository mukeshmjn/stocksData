<?php
require('db.php');
$query    = "TRUNCATE table `bankniftystock`";
                      $result   = mysqli_query($con, $query);
if($result){
    echo 'deleted';
}

?>