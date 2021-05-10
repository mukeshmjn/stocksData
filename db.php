<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("184.168.103.64","mukesh12","mukesh123","stocksdata");
    // Check connection
    // if($con){
    //     echo "connected";
    // }
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>