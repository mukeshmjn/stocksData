<?php
//include auth_session.php file on all user panel pages
include("adminauth_session.php");
// header("Refresh:0");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <style>
      body{
        background-image: url("./assets/tblbg.jpg");
        background-repeat: no-repeat;
    
 
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    function deleteUser(id){
      console.log(id)
      if (window.confirm('Are you sure you want to delete the user?'))
   {
     console.log('deleted');
     window.location.href = `deleteUser.php?id=${id}`
    }
    else{
      console.log('not deleted');
    }
    }
  

    function deleteNifty(){
      if (window.confirm('Are you sure you want to delete the nifty data?'))
   {
     console.log('delete check');
      $.ajax({
                type: 'POST',
                url: `deleteNifty.php`,
                success: function(data) {
                  console.log(data)
                }
    });
   }
    }

   function deleteBankNifty(){
    if (window.confirm('Are you sure you want to delete the banknifty data?'))
   {
     console.log('delete check');
      $.ajax({
                type: 'POST',
                url: `deleteBankNifty.php`,
                success: function(data) {
                  console.log(data)
                }
    });
   }
    }

    </script>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.form{
    margin: 50px auto;
    width: 75%;
    padding: 30px 25px;
    background: grey;
}
</style>
</head>
<body>
    <div class="form">
    <a href="createUser.php">   <button class="btn btn-warning" >Create User</button></a>
  
        <!-- <p>You are now user dashboard page.</p> -->
        <a href="adminlogout.php">   <button style="    background-color: lightskyblue;
    cursor: pointer;
    float: right;
    width: 10%;
    font-weight: 700;
    height: 66%;
    color: white;
    padding: 7px;
    border-radius: 20px;
    font-size: 18px;">Logout</button></a>
        <br>
    <br>
    
    <button onclick="deleteNifty()" class="btn btn-danger" style="background-color:red;cursor:pointer;font-weight: 700;">Delete Nifty Data</button>
    <button onclick="deleteBankNifty()" class="btn btn-danger" style="background-color:red;cursor:pointer;font-weight: 700;">Delete BankNifty Data</button>
        <!-- <p><a href="logout.php">Logout</a></p> -->
        <!-- <h2>HTML Table</h2> -->
        <table style="margin-top:15px" class="table table-hover table-sm table-striped">
        <!-- <thead class="thead-dark"> -->
  <tr class="table-dark ">
    <th>Name</th>
    <th>Email</th>
    <th>Status</th>
    <th>Trial(days)</th>
    <th>Action</th>
    <!-- <th>Put</th>
    <th>Diff</th>
    <th>PCR</th> -->
  </tr>
  <!-- </thead> -->
<?php

 require('db.php');
 $query = "SELECT * FROM users";
 $result   = mysqli_query($con, $query);
 if ($result) {
    while ($row = $result->fetch_assoc()) {

        $field1name = $row["username"];
        $field2name = $row["email"];
        $field3name = $row["id"];
        $field4name = $row["status"];
        $field5name = $row["trialdays"];
        echo '<tr class="table-dark"> 
        <td>'.$field1name.'</td> 
        <td>'.$field2name.'</td> 
        <td>'.$field4name.'</td> 
        <td>'.$field5name.'</td> 
        

        <td>
        <a href="editUser.php?id='.$field3name.'">   <button class="btn btn-outline-success">Edit</button></a>
        <!--<a href="deleteUser.php?id='.$field3name.'"> -->  <button onclick="deleteUser('.$field3name.')" class="btn btn-outline-danger">Delete</button><!--</a>-->
        </td>
    </tr>';

    }   
 }
?>

  <!-- <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>

  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
 
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
   
  </tr> -->
 
</table>

    </div>
</body>
</html>