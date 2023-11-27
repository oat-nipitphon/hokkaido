<!DOCTYPE html>
<?php
    require 'session.php';
    include 'connect_db.php';
    date_default_timezone_set("Asia/Bangkok");
?>
<html lang="th">
<head>
    <title>ระบบแอดมิน</title>
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
 "เวลา " + h + ":" + m + ":" + s +" น.";
  
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
  padding: 5px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.5s; /* Safari */
  transition-duration: 0.5s;
  border-radius: 10px;
  border: 3px solid #de7b3a;
}
.button5:hover {
    padding: 5px 20px;
    border-radius: 30px;
    background-color: #fa2626;
    color: #ffffff;
    font-size: 20px;
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
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.5s; /* Safari */
  transition-duration: 0.5s;
  border-radius: 10px;
  border: 3px solid #de7b3a;
}
.button3:hover {
     padding: 10px 30px;
    border-radius: 30px;
    background-color: #ff8000;
    color: #ffffff;
    font-size: 20px;
    border: 3px solid #ffffff;
}
[class*="te"] {
  background: #ffffff;
  border-color: back;
  border: 2px solid #de7b3a;
  color: white;
  padding: 20px 20px;
  font-size: 16px;
}
h1 {
  font-size: 2.5em; /* 40px/16=2.5em */
}

h2 {
  font-size: 1.375em; /* 30px/16=1.875em */
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

    </style>
    </head>
    <body style="background-color: #937761;" onload="startTime()">
        <table border="0" width="100%">
        <tr>
            <td align="center"><img src="image/head.jpg" style="width: 100%;height: 250px;"></td>
        </tr>  
    </table>
        <table border="0" width="70%" align="center">
        <tr>
            <td align="center" style="background-color: #ffffff;"><font color="#000000" size="3px"><?php echo "วันที่ ". date("d")." เดือน ". date("m")." ปี ". date("Y");?></td>
       
            <td style="background-color: #ffffff;"><font color="#000000" size="3px"><div id="txt"></div></td>
        </tr>  
    </table>
        <table border="0" width="100%">
            <tr>
                 <td align="center"><img src="image/icon.png" style="width: 150px;height: 150px;"></td>
                <td align="center"><h2><?php
                    echo"สวัสดีคุณ ".$session_admin_name."<br>คุณกำลังเข้าสู่ระบบสต็อคสินค้า"
                            ?></h2></td>
            </tr>
       </table>
        <form action="checkadmin.php" method="POST">
            <table border="0" width="100%" align="center">
            <tr>
                
                <td  width="50%" align="center"><h2>Username</h2></td>
                <td ><input type="text" name="username" style="height: 25px;"></td>
            </tr>
            <tr>
               
                 <td  align="center"><h2>Password</h2></td>
                <td ><input type="text" name="password"  style="height: 25px;"></td>
            </tr>
            <tr>
               
                <td  align="center"><h2>ชื่อ-นามสกุล</h2></td>
                <td ><input type="text" name="adminname"  style="height: 25px;"></td>
            </tr>
            <tr>
                
                 <td  align="center"><h2>เบอร์โทร</h2></td>
                <td ><input type="text" name="tel"  style="height: 25px;"></td>
            </tr>
            <tr>
                
                 <td align="center"><h2>เงินเดือน</h2></td>
                <td ><input type="text" name="salary"  style="height: 25px;"></td>
            </tr>
            <tr>
               
                <td width="30%" align="center"><h2>ที่อยู่</h2></td>
                <td ><input type="text" name="add" style="height: 25px;"></td>
            </tr>
       </table>
           <br>
            <table botder="0" width="100%">
            <tr>
                <td></td>
                <td width="50%" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button class="button2 button3">สมัคร</button></td>
                <td align="center">
                    
                    
                </td>
            </tr>
        </table>
             </form>
            <table botder="0" width="100%">
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   
                    <a href="main.php"><button class="button button5">กลับเมนู</button></a></td>
                <td width="50%">
                    
                    </td>
                <td align="center">
                </td>
            </tr>
        </table>
       
    </body>
</html>
