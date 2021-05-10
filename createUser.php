<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Create User</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
include("adminauth_session.php");
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $status    = stripslashes($_REQUEST['status']);
        $status    = mysqli_real_escape_string($con, $status);
        $mobileno    = stripslashes($_REQUEST['mobileno']);
        $mobileno    = mysqli_real_escape_string($con, $mobileno);
        $trialdays    = stripslashes($_REQUEST['trialdays']);
        $trialdays    = mysqli_real_escape_string($con, $trialdays);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, status, mobileno , trialdays , create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$status' ,'$mobileno','$trialdays', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            // echo "<div class='form'>
            //       <h3>User Created successfully.</h3><br/>
            //       <p class='link'>Click here to <a href='login.php'>Login</a></p>
            //       </div>";
            echo "thanks";
            header("Location: usersdata.php");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='createUser.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post" >
        <h1 class="login-title">Create User</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="text" class="login-input" name="mobileno" placeholder="Mobile Number">
        <select name="status" id="cars" style="height: 38px;
    width: 100%;
    " class="login-input">
    <option value="">Select Status</option>
  <option value="active">active</option>
  <option value="inactive">inactive</option>
  <!-- <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option> -->
</select>
        <!-- <input type="text" class="login-input" name="status" placeholder="Active/Inactive"> -->
        <input type="text" class="login-input" name="trialdays" placeholder="Trial(days)">
        <input type="submit" name="submit" value="Create User" class="login-button">
        <!-- <p class="link"><a href="login.php">Click to Login</a></p> -->
    </form>
<?php
    }
?>
</body>
</html>