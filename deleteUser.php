<?php

require('db.php');
$id = $_GET['id'];

$query = "DELETE FROM users WHERE id='$id'";
$result   = mysqli_query($con, $query);

if($result){
    // echo 'successful';
    // $row = mysqli_fetch_array($result);
    // echo $row;
    header("location:usersdata.php");
}
?>





