<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <style>
    body{
        background-image: url("./assets/loginimg.png");
        background-repeat: no-repeat;
   
    }
    @media screen and (max-width: 1200px) {
  body {
    background-size: 102% 526%;
  }
}
    /* *{
        height: 100%;
    } */
    </style>
</head>
<body>

<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE email='$username'
                     AND password='" . md5($password) ."'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if ($rows == 1) {
            if($row['trialdays']>0 && $row['status']!='inactive'){
                $_SESSION['username'] = $username;
                $_SESSION['trialdays'] = $row['trialdays'];
                $_SESSION['name'] = $row['username'];
                // Redirect to user dashboard page
                header("Location: niftyDashboard.php");
                
            }
            else{
                echo "<div class='form'>
                <h3>Your subscription ended.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                </div>";
            }
         
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login" style="margin-left:65%">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <!-- <p class="link"><a href="createUser.php">Create new user</a></p> -->
        <p class="link"><a href="forgotPassword.php">Forgot Password</a></p>
  </form>
<?php
    }
?>
</body>
</html>