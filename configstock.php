<!DOCTYPE html>
<?php
    require 'session.php';
    include 'connect_db.php';
    date_default_timezone_set("Asia/Bangkok");
?>
<html lang="th">
<head>
    <title>ระบบสต๊อกสินค้า</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="css/style.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="image/icon.png" />
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  var d = today.getDay();
  var m = today.getMonth();
  var y = today.getFullYear();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
 h + ":" + m + ":" + s +" น.";
  
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
<style>
     .button {
  background-color: #de7b3a; 
  border: none;
  color: #ffffff;
  padding: 5px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.3s; /* Safari */
  transition-duration: 0.3s;
  border-radius: 10px;
  border: 3px solid #de7b3a;
}
.button5:hover {
    padding: 5px 30px;
    border-radius: 30px;
    background-color: #fa2626;
    color: #ffffff;
    font-size: 20px;
    border: 3px solid #ffffff;
}
    .button2 {
  background-color: #de7b3a; /* Green */
  border: none;
  color: white;
  padding: 15px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.3s; /* Safari */
  transition-duration: 0.3s;
  border-radius: 10px;
 border: 3px solid #de7b3a;
}
.button3:hover {
    padding: 15px 30px;
    border-radius: 30px;
    background-color: #ff8000;
    color: #000000;
    font-size: 18px;
    border: 3px solid #ffffff;
}
[class*="te"] {
  background: white;
  border-color: #000000;
  border-style: solid;
  border-width: 10px 10px;
  
  border: none;
  
  font-size: 20px;
}
h1 {
  font-size: 2.5em; /* 40px/16=2.5em */
}

h2 {
  font-size: 1.875em; /* 30px/16=1.875em */
  color: #ffffff;
 }

p {
  font-size: 1.2em; /* 14px/16=0.875em */
  color: #ffffff;
}
h3 {
  font-size: 0.9em; /* 14px/16=0.875em */
  color: #ffffff;
}
body {
    font-size: 100%; /* มีค่าประมาณ 14px */
}

</style>
    </head>
<body onload="startTime()" style="background-color: #937761;">
   <?php
   $Up=$_POST['up'];
   $Upid=$_POST['upid'];
   $Amo=$_POST['amo'];
   $Mfd=$_POST['mfd'];
   $Date_up = date("Y/m/d");
   
   $Amo+=$Up;
   $Sql="UPDATE `ingredient` SET `amount`='$Amo' WHERE increment_id='$Upid'";
   $Obj= mysqli_query($connect_db, $Sql);
   
   $MFD = substr($Mfd,5,7);
   $MFDSTR = substr($MFD,0,2);
   $Expm = $MFDSTR+5;
   $Yexp = date("Y");
   $dexp = date("d");
   $Upexp = $Yexp."/".$Expm."/".$dexp;
   
   $Sqlup="INSERT INTO `order`(`ingredient_ID`, `Admin_ID`, `MFD`, `EXP`, `Bill_date`) VALUES "
           . "('$Upid','$session_admin_id','$Mfd','$Upexp','$Date_up')";
   $Objup= mysqli_query($connect_db, $Sqlup);
  
   
   ?>
    <table border="0" width="100%">
        <tr>
           
            <td align="center"><img src="image/head.jpg" style="width: 100%;height: 250px;">
            
            </td>
        </tr>  
    </table>
    <table border="0" width="70%" align="center">
        <tr>
            <td align="center" style="background-color: #ffffff;"><font color="#000000" size="3px"><?php echo "วันที่ ". date("d")." เดือน ". date("m")." ปี ". date("Y");?></td>
       
            <td style="background-color: #ffffff;"><font color="#000000" size="3px"><div id="txt"></div></td>
        </tr>  
    </table>
    <br>
    <table border="0" width="100%">
        <tr>
            <td align="center"><a href="stock.php"><button class="button2 button3">ต้องการ</button></a></td>
            <td align="center"><a href="main.php"><button class="button2 button3">ไม่ต้องการ</button></a></td>
        </tr>
    </table>
    <br>
    <table border="0" width="100%">
             <tr>
                 <td align="center"><img src="image/menu3.jpg" style="width: 520px;height: 480px;"></td>
            </tr>
        </table>
    <br><br>
    <table border="0" width="100%">
        <tr><td width="60%"></td>
                 <td align="center" width="40%">
                     <a href="check_logout.php"><button class="button button5">ออกจากระบบ</button></a></td>
            </tr>
        </table>
  
    </body>
</html>
