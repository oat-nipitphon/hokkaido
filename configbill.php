<!DOCTYPE html>
<?php
    require 'session.php';
    include 'connect_db.php';
    date_default_timezone_set("Asia/Bangkok");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet">
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  "เวลา "+h + ":" + m + ":" + s +" น.";
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
  padding: 10px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.6s; /* Safari */
  transition-duration: 0.6s;
  border-radius: 10px;
  border: 3px solid #de7b3a;
}
.button5:hover {
    padding: 10px 30px;
    border-radius: 30px;
    background-color: #fa2626;
    color: #ffffff;
    font-size: 18px;
    border: 3px solid #ffffff;
}
.button2 {
  background-color: #de7b3a; 
  border: none;
  color: #ffffff;
  padding: 10px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.6s; /* Safari */
  transition-duration: 0.6s;
  border-radius: 10px;
  border: 3px solid #de7b3a;
 
}
.button3:hover {
   padding: 10px 30px;
    border-radius: 30px;
    background-color: #ff8000;
    color: #ffffff;
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
  color: #ffffff;
 
}

h2 {
  font-size: 1.3em; /* 30px/16=1.875em */
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
        $Time_now= date("h:i");
        $sumtotal=$_POST["sumtotal"];
        $billid=$_POST["billid"];
        $day = date("Y/m/d");
        $Sql="INSERT INTO `bill`(`Bill_ID`, `Bill_date`,`Total_price`, `Admin_ID`) "
                . "VALUES ('$billid','$day','$sumtotal','$session_admin_id')";
        $obj= mysqli_query($connect_db, $Sql);
        //echo $Sql;
        ?>
        <table border="0" width="100%">
            <tr>
                <td><img src="image/head.jpg" style="width: 100%;height: 250px;"></td>
            </tr>
        </table>
        <table border="0" width="60%" align="center">
        <tr>
            <td align="center" style="background-color: #ffffff;"><font color="#000000" size="3px"><?php echo "วันที่ ". date("d")." เดือน ". date("m")." ปี ". date("Y");?></td>
       
            <td align="center" style="background-color: #ffffff;"><font color="#000000" size="3px"><div id="txt"></div></td>
        </tr>  
    </table>
        <table border="0" width="100%">
             <tr>
                 
                 <td align="center" width="50%"><h2>ยืนยันคำสั่งซื้อ<br>กรุณารอรับสินค้า</h2></td>
                
            </tr>
        </table>
        <table border="0" width="100%">
             <tr>
                 <td align="center"><img src="image/bill.PNG" style="width: 450px;height: 470px;"></td>
            </tr>
             
             <tr>
                 <td align="center">
                     <a href="main.php"><button class="button2 button3">กลับเมนู</button></a>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <a href="check_logout.php"><button class="button button5">ออกจากระบบ</button></a></td>
            </tr>
        </table>
        
    </body>
</html>
