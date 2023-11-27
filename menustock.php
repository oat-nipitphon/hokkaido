<!DOCTYPE html>
<?php
    require 'session.php';
    include 'connect_db.php';
    date_default_timezone_set("Asia/Bangkok");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>รายงานยอดขาย</title>
        <script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
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
  background-color: #de7b3a; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */
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
  font-size: 1.4em; /* 30px/16=1.875em */
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
    <body style="background-color: #937761;">
        <table border="0" width="100%">
        <tr>
            <td align="center"><img src="image/head.jpg" style="width: 100%;height: 200px;"></td>
        </tr>  
        </table>
        <table border="0" width="100%" align="center">
            <tr>
                <td ></td>
                <td align="center"><img src="image/icon.png" style="width: 150px;height: 150px;"></td>
                <td align="center"><h2><?php echo"สวัสดีคุณ $session_admin_name <br> ขณะที่คุณกำลังเข้าสู่ระบบรายการ"?></h2></td>
                 <td width="10%"></td>
            </tr></table>
        <table border="0" width="100%">
            
            <tr>
                <td align="center"><h2>กรุณาเลือกยอดขายที่<br>ท่านต้องการดู</h2></td>
            </tr>
        </table>
        
         <table border="0" width="100%">
            <tr>
                <td align="center"><h2><a href="liststockday.php" <button class="button">รายวัน</button></a></h2></td>
                <td align="center"><h2><a href="liststockmonth.php" <button class="button">รายเดือน</button></a></h2></td>
            </tr>
        </table>
        
        <table border="0" width="100%">
            <tr>
                <td align="center"><img src="image/menu3.jpg" style="width: 420px;height: 350px;"></td>
            </tr>
        </table>
        
        
        <table botder="0" width="100%">
            <tr>
                <td></td>
                <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="main.php"><button class="button">กลับเมนู</button></a></td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="check_logout.php"><button class="button">ออกจากระบบ</button></a>
                </td>
            </tr>
        </table>
    </body>
</html>
