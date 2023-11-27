<!DOCTYPE html>
<?php
    require 'session.php';
    include 'connect_db.php';
    date_default_timezone_set("Asia/Bangkok");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบขายสินค้า</title>
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
  border-radius: 0px;
  border: 3px solid #de7b3a;
}
.button3:hover {
    padding: 10px 50px;
    border-radius: 40px;
    background-color: #de7b3a;
    color: #ffffff;
    font-size: 18px;
    border: 3px solid #ffffff;
}
[class*="te"] {
  background: #ffffff;
  border-color: #de7b3a;
  border-radius: 10px;
  border-style: solid;
  border: 3px solid #de7b3a;
  font-size: 18px;
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
.box-number-order{
  width: 70px;
  height: 30px; 
  text-align: center;
  font-size: 18px;
  margin-left: 25px;
}
</style>
    </head>
    <body onload="startTime()" style="background-color: #937761;">
        <table border="0" width="100%">
        <tr>
            <td align="center"><img src="image/head.jpg" style="width: 100%;height: 250px;"></td>
        </tr>  
        </table>
        <table border="0" width="60%" align="center">
        <tr>
            <td align="center" style="background-color: #ffffff;"><font color="#000000" size="3px"><?php echo "วันที่ ". date("d")." เดือน ". date("m")." ปี ". date("Y");?></td>
       
            <td align="center" style="background-color: #ffffff;"><font color="#000000" size="3px"><div id="txt"></div></td>
        </tr>  
        </table>
        <br>
       <table border="0" width="100%" align="center">
            <tr>
                <td width="35%"></td>
                <td align="center"><img src="image/icon.png" style="width: 150px;height: 150px;"></td>
                <td align="center"><img src="image/menuss.png"></td>
                 <td width="35%"></td>
            </tr>
       </table>
        
        
        <form action="menubuy.php" method="POST" >
           
            <table border="0" width="50%" align="center"> 
          <tr>
              <td ></td>
            <td align="right" width="20%"> 
                <font color="#ffffff">
            <?php
            $SqlProduct="SELECT * FROM product";
            $QryProduct = mysqli_query($connect_db, $SqlProduct);
           
                while($RsProduct = mysqli_fetch_array($QryProduct))
                {
                    $Stringprice = (int)($RsProduct["Saleprice"]);
                    echo $RsProduct["Product_name"]."<br><br><br>";
                    
                }     
            ?>
                </font>
            </td>
            <td width="30%">
                <input type="text" name="numble1" class="first_test box-number-order"> <font color="#ffffff">40 บ. / 1 แก้ว<br><br>
                <input type="text" name="numble2" class="first_test box-number-order"> <font color="#ffffff">40 บ. / 1 แก้ว<br><br>
                <input type="text" name="numble3" class="first_test box-number-order"> <font color="#ffffff">40 บ. / 1 แก้ว<br><br>
                <input type="text" name="numble4" class="first_test box-number-order"> <font color="#ffffff">40 บ. / 1 แก้ว<br><br>
                <input type="text" name="numble5" class="first_test box-number-order"> <font color="#ffffff">40 บ. / 1 แก้ว<br><br>
                <input type="text" name="numble6" class="first_test box-number-order"> <font color="#ffffff">40 บ. / 1 แก้ว<br><br>
                <input type="text" name="numble7" class="first_test box-number-order"> <font color="#ffffff">40 บ. / 1 แก้ว<br><br>
            </td>
            <td ></td>
          </tr>
        </table>
            
            <table border="0" width="90%" align="center">
                <tr>
                    <td><p align="center"><button class="button2 button3" name="butbuymenu">สั่งซื้อสินค้า</button></p>
        </form></td>
                </tr>
    </body>
</html>
