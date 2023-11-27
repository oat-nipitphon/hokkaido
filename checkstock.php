<!DOCTYPE html>
<?php
    //require 'session.php';
    include 'connect_db.php';
    date_default_timezone_set("Asia/Bangkok");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ยืนยันบิล</title>
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
  color: #ffffff;
 
}

h2 {
  font-size: 1.575em; /* 30px/16=1.875em */
  color: #000;
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
      $_POST["daylist"];
      $daylist = $_POST["daylist"];
      $Listday= substr($daylist,8,9);
      $Listmonth= substr($daylist,5,7);
      $Lisyear= substr($daylist,0,4);
      $ListMonth= substr($Listmonth,0,2);
  
      $Sql="SELECT * FROM bill LEFT JOIN detail_bill ON bill.Bill_ID = detail_bill.Bill_ID WHERE Bill_date='$daylist'";
      $Obj= mysqli_query($connect_db, $Sql);
      ?>
        <table botder="1" width="100%">
            <tr>
                <td><img src="image/head.jpg" style="width: 100%;height: 250px;"></td>
            </tr>
            <tr>
                <td align="center"><img src="image/icon.png" style="width: 150px;height: 150px;">
                <br><h2>รายการยอดขายประจำวัน</h2>
                <br><h2><?php echo "วัน &nbsp".$Listday." &nbspเดือน&nbsp ".$ListMonth." &nbspปี&nbsp ".$Lisyear;?></h2>
                </td>
            </tr>
        </table>
        <table botder="1" width="100%">
            <tr style="background-color: #fff;">
                <td align="center" ><h2>รหัสสินค้า</h2></td>
                <td align="center" ><h2>รวมจำนวนแก้ว</h2></td>
                <td align="center" ><h2>จำนวนเงิน</h2></td>
            </tr>
            <?php
            while($Result= mysqli_fetch_array($Obj))
            {
                ?>
            <tr>
                <td align="center"><h2><?php echo $Result["Product_ID"];?></h2></td>
                <td align="center"><h2><?php echo $Result["Qty"];
                $total=$Result["Qty"]*40;
                        ?>  
                </h2></td>
                <td align="center"><h2><?php 
                echo $total;
                ?></h2></td>
            </tr>
            <?php
            }
            ?>
        </table>
        
         <table botder="1" width="100%">
              <?php
              $totalstock=0;
        $Sqls="SELECT * FROM bill WHERE Bill_date='$daylist'";
        $Objs= mysqli_query($connect_db, $Sqls);
        while($Results= mysqli_fetch_array($Objs))
            {
                ?>
            <tr>
                <td></td>
                <td width="50%"></td>
                <td><h2><?php /*echo "ยอดรวม&nbsp&nbsp&nbsp&nbsp&nbsp ".$Results["Total_price"]." &nbsp&nbsp&nbsp&nbsp&nbspบาท";*/
                $totalstock+=$Results["Total_price"];
                ?></h2>
                </td>
            </tr>
             <?php
            }
            ?>
        </table>
        <table botder="0" width="100%">
            <tr>
                <td><center><h2><?php echo "ยอดรวม&nbsp&nbsp&nbsp&nbsp&nbsp ".$totalstock." &nbsp&nbsp&nbsp&nbsp&nbspบาท";?></h2></center></td>
            </tr>
        </table>
         <table botder="0" width="100%">
            <tr>
                <td></td>
                <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                    <a href="menustock.php"><button class="button">กลับเมนู</button></a></td>
                <td>
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="check_logout.php"><button class="button">ออกจากระบบ</button></a>
                </td>
            </tr>
        </table>
    </body>
</html>
