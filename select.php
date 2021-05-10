<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <style>
     body{
        background-image: url("./assets/selctimg.png");
        background-repeat: no-repeat;
        background-size: 102% 375%;
 
    }
    .slctlnk{
    font-size: 25px;
    font-weight: 500;
    text-align: center;
}
    @media screen and (max-width: 1200px) {
  body {
   background-size: 102% 1318%;
  }
}
    </style>
</head>
<script>
//  window.onload = function () {

// console.log('select plz');
// if (window.confirm('For seeing the latest data please add this extension, Click on OK to download,if already installed cancel'))
//    {
//    window.open('https://chrome.google.com/webstore/detail/allow-cors-access-control/lhobafahddgcelffkeicbaginigeejlf', '_blank');
//    };
//  }
</script>
<body>
<div class="form" style="margin-right:75%;width: 447px;">
<!-- <div> -->

<span class="slctlnk" style="margin-left:20%">
Login as:
</span>
<!-- </div> -->
<!-- <div style="text-align:center;height:50px"> -->

<span>
<a href="adminlogin.php" class="slctlnk" style="margin-left:5%;text-decoration:none">
Admin?
</a>
</span>

<span>
<a href="login.php" class="slctlnk" style="margin-left: 9%;text-decoration:none">
User?
</a>
</span>
</div>
<div style="margin-left: 8%;">
  <span style="    font-weight: 500;
    font-size: 19px;">
  To see the latest data add this extension:
  </span>

</div>
<div style="margin-left: 8%;">
  <span  style="    font-weight: 500;
    font-size: 19px;">
   
  Click on this button to add the extension
  </span>

  <button type="button"  class="btn btn-primary"> <a href="https://chrome.google.com/webstore/detail/allow-cors-access-control/lhobafahddgcelffkeicbaginigeejlf" style="text-decoration:none;color:white" target="_blank">Add Extension</a></button>
</div>
</body>
</html>