<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Create User</title>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>


        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 30%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.form{
    margin: 50px auto;
    width: 100%;
    padding: 30px 25px;
    background: grey;
}

</style>
<body>
<?php
include("adminauth_session.php");
    require('db.php');

    
?>
    <div class="form"  >
    <!-- <table style="margin-top:15px">
  <tr>
    <th>STRIKE</th>
    <th>OI</th>
    <th>COI</th>
    <th>COI%</th>
    
  </tr>
  </table>

  <table style="margin-top:15px">
  <tr>
    <th>STRIKE</th>
    <th>OI</th>
    <th>COI</th>
    <th>COI%</th>
    
  </tr>
  </table> -->


<style>
* {
  box-sizing: border-box;
}
body{
        background-image: url("./assets/tblbg.jpg");
        background-repeat: no-repeat;
    
 
    }
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-bottom: 16px solid blue;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
<script>
function getniftyData(){
    $.ajax({
                type: 'GET',
                url: `https://www.nseindia.com/api/option-chain-indices?symbol=BANKNIFTY`,
                success: function(data) {
                    var displayData= data.filtered.data
                    displayData.forEach(a=>{
                        $('.loader').hide();
                        $('#call').show();
                        $('#put').show();
                     //  console.log(a)
                        var cllcoipct = ((a.CE.changeinOpenInterest)/(a.CE.openInterest - a.CE.changeinOpenInterest))*100
                        var putcoipct = ((a.PE.changeinOpenInterest)/(a.PE.openInterest - a.PE.changeinOpenInterest))*100
                       // console.log(cllcoipct)
                        if(cllcoipct==NaN || cllcoipct==Infinity){
                            cllcoipct = '-';
                        }
                        else{
                            cllcoipct = cllcoipct.toFixed(2);
                        }
                        if(putcoipct==(NaN || Infinity)){
                            putcoipct = '-';
                        }
                        else{
                            putcoipct = putcoipct.toFixed(2);
                        }
                        $('#call').append(`<tr> 
        <td>${a.CE.strikePrice}</td> 
        <td>${a.CE.openInterest}</td> 
        <td>${a.CE.changeinOpenInterest}</td> 
        <td>${cllcoipct}</td> 
 
        

 
    </tr>`);
    $('#put').append(`<tr> 
        <td>${a.PE.strikePrice}</td> 
        <td>${a.PE.openInterest}</td> 
        <td>${a.PE.changeinOpenInterest}</td> 
        <td>${putcoipct}</td> 
 
        

 
    </tr>`)
                    })
                   //  alert(data);
                    // setTimeout(() => {
                    //   window.location.reload()
                    // }, 3000);
                    // 
                    // $("p").text(data);

                }
            });
}
   window.onload = function () {
    $('#call').hide();
    $('#put').hide();
    getniftyData();
    setInterval(function () {
    // Invoke function every 2 minutes
    // getniftyData();
    window.location.reload();
  }, 120000);
   }
</script>
</head>
<body>
<button class="btn btn-warning"><a href="niftyDashboard.php" style="
    text-decoration: none;
    color: white;
    font-weight: 700;">BAck To DashBoard</a></button>
<h2 >Bank NiftyCOi PErcent</h2>
<button class="btn btn-primary"><a href="niftycoipercent.php"  style="
    text-decoration: none;
    color: white;
    font-weight: 700;">Nifty COI PERCENT</a></button>
<!-- <p>How to create side-by-side tables with CSS:</p> -->
<div class="loader" style="margin:auto"></div>
<div class="row">
  <div class="column">
  <h2 style="text-align:center;color:blue">CALL</h2>
    <table id="call" class="table table-dark table-striped table-hover table-sm" >
      <tr class="table-light">
        <th>STRIKE</th>
        <th>OI</th>
        <th>COI</th>
        <th>COI%</th>
      </tr>
   
    </table>
  </div>
  <div class="column">
  <h2 style="text-align:center;color:blue">PUT</h2>
    <table id="put" class="table table-dark table-striped table-hover table-sm">
      <tr class="table-light">
      <th>STRIKE</th>
        <th>OI</th>
        <th>COI</th>
        <th>COI%</th>
      </tr>
 
    </table>
  </div>
</div>

</body>
</html>
    </div>

</body>
</html>