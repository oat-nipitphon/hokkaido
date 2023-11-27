<!DOCTYPE html>
<?php
    require 'session.php';
    include 'connect_db.php';
    date_default_timezone_set("Asia/Bangkok");
?>
<html lang="th">
<head>
    <title>หน้าหลัก</title>
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
  border: 3px solid #ffffff;
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
  padding: 10px 50px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.3s; /* Safari */
  transition-duration: 0.3s;
  border-radius: 10px;
  border: 3px solid #ffffff;
}
.button3:hover {
    padding: 15px 55px;
    border-radius: 30px;
    background-color: #ff8000;
    color: #ffffff;
    font-size: 20px;
    border: 4px solid #ffffff;
}
[class*="te"] {
  background: #e8a97e;
  border-color: back;
  border: none;
  color: white;
  padding: 15px 32px;
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

    </style>
</head>
<body onload="startTime()" style="background-color: #937761;">
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
        </tr>  
        </table>
    <br>
    
        <table border="0" width="50%" align="center">
            <tr>
            <td align="center" ><font color="#ffffff" size="4px">
                <?php
                echo"สวัสดีคุณ $session_admin_name<br>กรุณาเลือกระบบที่ท่านต้องการ";
                ?></td>
                
            </tr>
           
        </table>
    <br>
    <table border="0" width="100%" align="center" style="background-color: #937761;">
            <tr>
                <td width="50%" align="center"><a href="menu.php">
                        <img src="image/buy.PNG" style="width: 100px;height: 70px;">
                        <a href="menu.php"<button class="button2 button3">ระบบขายสินค้า</button></a></td>
            </tr>
    </table>
    
    <br><table border="0" width="100%" align="center" style="background-color: #937761;">
            <tr>
              
                
                <td  align="center">
                        <a href="stock.php"<button class="button2 button3">ระบบขายสต็อกสินค้า</button></a>
                        <a href="stock.php"><img src="image/product.PNG" style="width: 100px;height: 70px;"></a>
                </td>
             
            </tr>
    </table>
    <br><table border="0" width="100%" align="center" style="background-color: #937761;">
            <tr>
              
                
                <td  align="center"><a href="menuadmin.php">
                        <img src="image/admin.PNG" style="width: 100px;height: 70px;">
                        <a href="menuadmin.php"<button class="button2 button3">ระบบจัดการพนักงาน</button></a></td>
               
            </tr>
    </table>
    <br><table border="0" width="100%" align="center" style="background-color: #937761;">
            <tr>
              
               
                <td  align="center">
                <a href="menustock.php"<button class="button2 button3">ระบบเช็ดยอดขาย</button></a>
                <a href="menustock.php"><img src="image/sell.PNG" style="width: 100px;height: 70px;"></a>
                </td>
              
            </tr>
        </table>
    <br><br><br>
        <table border="0" width="100%" align="center">
            <tr>
                <td></td>
                <td align="center" width="50%"><a href="check_logout.php"<button class="button button5">ออกจากระบบ</button></a></td>
              
            </tr>
        </table>
    </body>
</html>
