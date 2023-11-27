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
  font-size: 1.2em; /* 30px/16=1.875em */
  color: #000000;
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
    <body style="background-color: #ffffff;">
       
        <?php
        $time_now=$_POST["time_now"];
        $Day_now=$_POST["day_now"];
        $billid=$_POST["bill_id"];
        $sumtotal=0;
        $subtotal=0;  
       
        ?>
        <h2>
        <table border="0" width="100%" aling="center">
            <tr>
                <td><img src="image/head.jpg" width="100%" style="width: 100%;height: 250px;"></td>
            </tr>
            
            <tr>
                <td align="center"><img src="image/icon.png" style="width: 150px;height: 150px;"><br>
                  
                    <?php 
                   
                            echo 'วันที่ '. date("d/m/Y")." เวลา ".$time_now;
                    ?>
                </td>
            </tr>
        </table><br>
            <form action="configbill.php" method="POST">
                
                <table border="1" width="100%" align="center" style="background-color: #ffffff;">
            <tr>
                <td align="center"><font color="#000000" size="3px">รหัสสินค้า</td>
                <td align="center"><font color="#000000" size="3px">ชื่อสินค้า</td>
                <td align="center"><font color="#000000" size="3px">จำนวน / แก้ว</td>
                <td align="center"><font color="#000000" size="3px">จำนวนเงิน / บาท</td>
            </tr>
            <?php
            $Sql="SELECT * FROM product "
                    . "LEFT JOIN detail_bill ON product.Product_ID = detail_bill.Product_ID WHERE Date_now='$Day_now'";
            $obj= mysqli_query($connect_db, $Sql);
            while($Result= mysqli_fetch_array($obj)){
                ?>
            <tr>
                
                <td align="center"><font color="#000000" size="3px"><?php echo $Result["Product_ID"];?>
                    <input type="hidden" name="productid" value="<?php echo $Result["Product_ID"];?>">
                </td>
                <td align="center"><font color="#000000" size="3px"><?php echo $Result["Product_name"];?></td>
                <td align="center"><font color="#000000" size="3px"><?php echo $Result["Qty"];?></td>
                <td align="center"><font color="#000000" size="3px"><?php
                  $money=$Result["Saleprice"];
                  $qty=$Result["Qty"];
                  echo $total=$money*$qty;
                ?>
                </td>
           
            </tr>
            <?php 
            $sumtotal+=$total;
            }
            $subtotal+=$sumtotal;
            ?>
        </table>
        
           
        <table border="0" width="100%" aling="center">
           <h2><center><?php echo "ยอดรวม&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$subtotal."&nbsp&nbsp&nbsp&nbsp&nbsp&nbspบาท";
                    $Time_now = date("h:s");
                ?>
               </center></h2>
            <tr>
                <td></td>
                <td>
                  <input type="hidden" name="billid" value="<?php echo $billid;?>">  
                  <input type="hidden" name="Time_now" value="<?php echo $Time_now;?>">
                 <input type="hidden" name="sumtotal" value="<?php echo $subtotal;?>">
                </td>
                <td></td>
            </tr>
        </table>
                <table border="0" width="100%" aling="center">
            <tr>
                <td align="center"><button class="button2 button3">พิมพ์ใบเสร็จ</button></td>
                <td align="center"></td>
            </tr>
        </table> 
            </form>
            <br><br><br><br><br><br><br><br><br><br>
        <table border="0" width="100%" aling="center">
            <tr>
                <td align="center"></td>
                <td align="center" width="40%"><a href="check_logout.php"<button class="button button5">ออกจากระบบ</button></a></td>
            </tr>
        </table>
    </body>
</html>
