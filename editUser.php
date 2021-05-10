
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php
    require('db.php');
    $id = $_GET['id'];
    // echo $id;
    $query = "select * from users where id='$id'";
    $result   = mysqli_query($con, $query);
    if($result){
        // echo 'successful';
        $row = mysqli_fetch_array($result);
        // echo $row;
    }
        if(isset($_POST['update'])) // when click on Update button
{
    $username = $_POST['username'];
    $email = $_POST['email'];
	$mobileno = $_POST['mobileno'];
    $status = $_POST['status'];
    $trialdays = $_POST['trialdays'];
    $edit = mysqli_query($con,"update users set username='$username', email='$email', mobileno = '$mobileno', status = '$status', trialdays = '$trialdays' where id='$id'");
	
    if($edit)
    {
        // mysqli_close($db); // Close connection
        header("location:usersdata.php"); // redirects to all records page
        // exit;
    }
    else
    {
        echo mysqli_error();
    }    	

    }
    ?>

<form class="form" action="" method="post">
        <h1 class="login-title">Edit User</h1>
        <input type="text" class="login-input"  name="username" value="<?php echo $row['username'] ?>"  placeholder="Username" required />
        <input type="text" class="login-input" name="email" value="<?php echo $row['email'] ?>" placeholder="Email Adress">
        
        <input type="text" class="login-input" name="mobileno" value="<?php echo $row['mobileno'] ?>" placeholder="Mobile Number">
        <select name="status" id="cars" style="height: 38px;
    width: 100%;
    " class="login-input" >
    <option value="">Select Status</option>
  <option value="active" <?php if($row['status'] == 'active'){ echo ' selected="selected"'; } ?>>active</option>
  <option value="inactive" <?php if($row['status'] == 'inactive'){ echo ' selected="selected"'; } ?>>inactive</option>
  <!-- <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option> -->
</select>
        <!-- <input type="text" class="login-input" name="status" value="<?php echo $row['status'] ?>" placeholder="Active/Inactive"> -->
        <input type="text" class="login-input" name="trialdays" value="<?php echo $row['trialdays'] ?>" placeholder="Trial(days)">
        <input type="submit" name="update" value="Edit User"  class="login-button">
        <!-- <p class="link"><a href="login.php">Click to Login</a></p> -->
    </form>

    </body>
</html>