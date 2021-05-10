<?php
require('db.php');
$query    = "TRUNCATE table `niftystock`";
                      $result   = mysqli_query($con, $query);
if($result){
    echo 'deleted';
}

?>