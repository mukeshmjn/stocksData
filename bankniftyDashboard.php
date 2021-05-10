<?php

include("auth_session.php");


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <style>
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
body{
        background-image: url("./assets/tblbg.jpg");
        background-repeat: no-repeat;
    
 
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
    width: 75%;
    padding: 30px 25px;
    background: grey;
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    function callfunction(){

      $.ajax({
        type: "GET",
        url: "https://www.nseindia.com/api/option-chain-indices?symbol=BANKNIFTY",
        
        success: function (data) {
        
            var dssCE = data.filtered.data
            var dssPE = data.filtered.data
            var totCECOI = 0 ;
            var totPECOI = 0 ;
            dssCE.forEach(abc=>{
         
              totCECOI = totCECOI + abc.CE.changeinOpenInterest
            })
    
            dssPE.forEach(abc=>{
          
              totPECOI = totPECOI + abc.PE.changeinOpenInterest
            })
       
            var minuspc = totPECOI - totCECOI;
            var dividepc = totPECOI / totCECOI;
             var display = data.filtered.PE.totOI - data.filtered.CE.totOI
             let date_ob = new Date();

// adjust 0 before single digit date
              let date = ("0" + date_ob.getDate()).slice(-2);

              // current month
              let month = ("0" + (date_ob.getMonth() + 1)).slice(-2);

              // current year
              let year = date_ob.getFullYear();

              // current hours
              let hours = date_ob.getHours();

              // current minutes
              let minutes = date_ob.getMinutes();

              // current seconds
              let seconds = date_ob.getSeconds();

              // prints date & time in YYYY-MM-DD HH:MM:SS format
              var finalDate = year + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds;
              console.log(finalDate)
             $.ajax({
                type: 'POST',
                url: `bankSaveData.php/?clcoi=${totCECOI}&putcoi=${totPECOI}&diff=${minuspc}&pcr=${dividepc.toFixed(2)}&time=${finalDate}`,
                success: function(data) {
                    // alert(data);
                    // window.location.reload()
                    // $("p").text(data);
                    setTimeout(() => {
                     // window.location.reload()
                     $('table').append(`<tr> 
        <td>${finalDate}</td> 
        <td>${totCECOI}</td> 
        <td>${totPECOI}</td> 
        <td>${minuspc}</td> 
        <td>${dividepc.toFixed(2)}</td> 
        

 
    </tr>`);
                    }, 300);
                }
            });



       
        },
        error: function (err) {
            console.log(err,'rttt')
            // callfunction();
        }
    });
    }
    window.onload = function () {
  // Initial function call
  
  var nfiftime = new Date(2022,03,05,09,15,00)
  var ththty = new Date(2022,03,05,15,30,00)
  if(((nfiftime.getTime())>(new Date().getTime())) && ((ththty.getTime())>(new Date().getTime()))){
    console.log('work')
    let date_ob = new Date();

// adjust 0 before single digit date
let date = ("0" + date_ob.getDate()).slice(-2);

// current month
let month = ("0" + (date_ob.getMonth() + 1)).slice(-2);

// current year
let year = date_ob.getFullYear();

// current hours
let hours = date_ob.getHours();

// current minutes
let minutes = date_ob.getMinutes();

// current seconds
let seconds = date_ob.getSeconds();

// prints date & time in YYYY-MM-DD HH:MM:SS format
console.log(year + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds);
    callfunction();
    setInterval(function () {
    // Invoke function every 10 minutes
    callfunction();
  }, 180000);
  }
  else{
    console.log('notwork');
  }
  //console.log(new Date(2022,03,05,09,15,00))
//  console.log(new Date().getTime())
  //  callfunction();
  // alert('For using the website please add this extension: link: https://chrome.google.com/webstore/detail/allow-cors-access-control/lhobafahddgcelffkeicbaginigeejlf')
  // if (window.confirm('For seeing the latest data please add this extension, Click on OK to download,if already installed cancel'))
  //  {
  //  window.open('https://chrome.google.com/webstore/detail/allow-cors-access-control/lhobafahddgcelffkeicbaginigeejlf', '_blank');
  //  };

}

    $(document).ready(function(){
  $("#bton").click(function(){

    $.ajax({
        type: "GET",
        url: "https://www.nseindia.com/api/option-chain-indices?symbol=BANKNIFTY",
        
        success: function (data) {
        
            var dssCE = data.filtered.data
            var dssPE = data.filtered.data
            var totCECOI = 0 ;
            var totPECOI = 0 ;
            dssCE.forEach(abc=>{
         
              totCECOI = totCECOI + abc.CE.changeinOpenInterest
            })
    
            dssPE.forEach(abc=>{
          
              totPECOI = totPECOI + abc.PE.changeinOpenInterest
            })
       
            var minuspc = totPECOI - totCECOI;
            var dividepc = totPECOI / totCECOI;
             var display = data.filtered.PE.totOI - data.filtered.CE.totOI
             totPECOI =    totPECOI.toLocaleString();
         totCECOI = totCECOI.toLocaleString();
         minuspc = minuspc.toLocaleString();
             let date_ob = new Date();

// adjust 0 before single digit date
              let date = ("0" + date_ob.getDate()).slice(-2);

              // current month
              let month = ("0" + (date_ob.getMonth() + 1)).slice(-2);

              // current year
              let year = date_ob.getFullYear();

              // current hours
              let hours = date_ob.getHours();

              // current minutes
              let minutes = date_ob.getMinutes();

              // current seconds
              let seconds = date_ob.getSeconds();

              // prints date & time in YYYY-MM-DD HH:MM:SS format
              var finalDate = year + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds;
             // console.log(year + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds);
             $.ajax({
                type: 'POST',
                url: `bankSaveData.php/?clcoi=${totCECOI}&putcoi=${totPECOI}&diff=${minuspc}&pcr=${dividepc.toFixed(2)}&time=${finalDate}`,
                success: function(data) {
                   //  alert(data);
                    setTimeout(() => {
                      window.location.reload()
                    }, 3000);
                    // 
                    // $("p").text(data);

                }
            });



       
        },
        error: function (err) {
            console.log(err,'rttt')
          
        }
    });
  });
});
</script>
</head>
<body>
    <div class="form">
   
    <button class="btn btn-warning"><a href="niftycoipercent.php" style='    text-decoration: none;
    color: white;
    font-weight: 700;'>Nifty COI PERCENT</a></button>
    <button class="btn btn-warning"><a href="bankniftycoipercent.php" style="    text-decoration: none;
    color: white;
    font-weight: 700;">bankNifty COI PERCENT</a></button>
    <a href="logout.php">   <button style="    background-color: lightskyblue;
    cursor: pointer;
    float: right;
    width: 10%;
    font-weight: 700;
    height: 66%;
    color: white;
    padding: 7px;
    border-radius: 20px;
    font-size: 18px;">Logout</button></a>
       
      
    <h2 style="color:blue">DASHBOARD</h2>
    <p>Hey, <?php echo $_SESSION['name'].'! '.$_SESSION['trialdays'].' days left';?> </p>
        <!-- <?php
          echo '<script language="javascript">';
         echo 'alert("'.$_SESSION['trialdays'].' days left")';
         echo ' </script>'; 
        
        ?> -->
   

        <div class="input-group" style="width:33%">
<h4>View Options Contracts for:</h4>
  <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" > 
    <option selected>Choose...</option>
    <option value="nifty">NIFTY</option>
    <option value="banknifty">BANKNIFTY</option>
   
  </select>
  <button class="btn btn-primary" type="button"><a href="niftyDashboard.php" style="
    text-decoration: none;
    color: white;
    font-weight: 700;
">GO</a></button>
</div>
       <br>
        
<button name="update" type="submit" id="bton" class="btn btn-warning">Fetch Stocks Data</button>
<!-- <button name="delete" type="submit">Delete</button> -->
<table style="margin-top:15px" class="table table-dark table-striped table-hover table-sm">
  <tr class="table-light">
    <th>Time</th>
    <th>Call</th>
    <th>Put</th>
    <th>Diff</th>
    <th>PCR</th>
  </tr>
  <?php

require('db.php');
 $query = "SELECT * FROM bankniftystock";
 $result   = mysqli_query($con, $query);
 if ($result) {
  //  echo 'result';
    while ($row = $result->fetch_assoc()) {

        $field1name = $row["clcoi"];
        $field2name = $row["putcoi"];
        $field3name = $row["diff"];
        $field4name = $row["pcr"];
        $field5name = $row["time"];
        echo '<tr> 
        <td>'.$field5name.'</td> 
        <td>'.$field1name.'</td> 
        <td>'.$field2name.'</td> 
        <td>'.$field3name.'</td> 
        <td>'.$field4name.'</td> 
        

 
    </tr>';

    }   
 }
?>

</table>

    </div>
</body>
</html>