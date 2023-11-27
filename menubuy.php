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
        <table border="0" width="100%">
        <tr>
            <td align="center"><img src="image/head.jpg" style="width: 100%;height: 250px;"></td>
        </tr>  
        </table>
       <table border="0" width="100%" align="center" >
           <tr><td width="30%"></td>
                <td align="center"><img src="image/icon.png" style="width: 150px;height: 150px;"></td>
                <td align="center"  width="70%"><img src="image/menubuy.png" style="width: 300px;height: 70px;"><br>
                    <h2>
                <?php
                        echo "รับออเดอร์โดย $session_admin_name<br>";
                        echo"วันที่ ". date("d/m/Y")." เวลา ". date("h:i");
                  ?>  
                    </h2>
                </td>
                
            </tr>
        <?php
            $Nameble1=(int)$_POST["numble1"];
            $Nameble2=(int)$_POST["numble2"];
            $Nameble3=(int)$_POST["numble3"];
            $Nameble4=(int)$_POST["numble4"];
            $Nameble5=(int)$_POST["numble5"];
            $Nameble6=(int)$_POST["numble6"];
            $Nameble7=(int)$_POST["numble7"];
        ?>
        <table border="0" width="100%">
            <tr>
            <td></td>
            </tr>
        </table>
        
        <table border="0" width="100%" style="background-color: #ffffff;">
            <tr>
                <td>
                    <form action="bill.php" method="POST">
        <?php
        $Date = date("h:i");
        $time_now = date("h:i");
        $bill_id = date("h").$session_admin_id. date("i")." ". date("s");
        $Day = date("Y/m/d");
        ?><input type="hidden" name="bill_id" value="<?php echo $bill_id;?>">
        <table border="0" width="100%">
            
            <td> <h2> 
            
            <?php
        
        if($Nameble1 != "") //นมสดฮอกไกโด
            {
                $product_id=001;
                $Sql = "SELECT * FROM product WHERE Product_ID='$product_id'";
                $quy = mysqli_query($connect_db, $Sql);
                while($Result = mysqli_fetch_array($quy)){
                  ?>
             <h2><center>
                              <?php
                               echo $Result["Product_name"];
                               $price1 = $Result["Saleprice"];
                               $conid = $Result["Product_ID"];
                               ?>
                 &nbsp;
                               <?php
                               echo "ราคา ".$price1Int = (int)($price1)." บาท";
                               echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Nameble1."<br>";
                              ?>
            </h2></center> 
                  <?php
                }
               ?>
                   <input type="hidden" name="id_pro1" value="<?php echo $conid;?>">
                   <input type="hidden" name="qry1" value="<?php echo $Nameble1;?>">
                   <?php
                   
                   //เพิ่มข้อมูลรายละเอียดบิล
               $Sqlin="INSERT INTO `detail_bill`(`Bill_ID`, `Product_ID`, `Saleprice`, `Qty`, `Date_now`) "
                       . "VALUES ('$bill_id','$conid','$price1Int','$Nameble1','$Date')";
               $objQuery = mysqli_query($connect_db, $Sqlin);
               
               //ลบวัตถุดิบ
               $in_id=0;
               $Sqlde="SELECT * FROM `ingredient` WHERE Product_ID LIKE '%$conid%'";
               $objde= mysqli_query($connect_db, $Sqlde);
               while($Resultde = mysqli_fetch_array($objde))
                {
                   $in_id = $Resultde["increment_id"];
                   $amount1 = $Resultde["amount"];
                }
                $dein=$amount1-$Nameble1;
                $Sqlup="UPDATE `ingredient` SET `amount`='$dein' WHERE Product_ID LIKE '%003%'";
                $objup= mysqli_query($connect_db, $Sqlup);
               
                    //เพิ่มข้อมูลการใช้วัตถุดิบ
               $Sqlinu="INSERT INTO `used_ingredient`(`Ingredient_ID`, `Product_ID`, `Date`, `Used_Qty`) "
                       . "VALUES ('$in_id','$conid','$Day','$dein')";
               $objinu = mysqli_query($connect_db, $Sqlinu);
            }
            
            if($Nameble2 != "") //นมสดฮอกไกโด
            {
                
                $product_id=002;
                $Sql = "SELECT * FROM product WHERE Product_ID='$product_id'";
                $quy = mysqli_query($connect_db, $Sql);
                
                while($Result = mysqli_fetch_array($quy)){
                   ?>
             <h2><center>
                              <?php
                               echo $Result["Product_name"];
                               $price1 = $Result["Saleprice"];
                               $conid = $Result["Product_ID"];
                               ?>
                 &nbsp;
                               <?php
                               echo "ราคา ".$price1Int = (int)($price1)." บาท";
                               echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Nameble2."<br>";
                              ?>
                 </center></h2>
                  <?php
                }
                ?>
                   <input type="hidden" name="id_pro2" value="<?php echo $conid;?>">
                   <?php
               $Sql="INSERT INTO `detail_bill`(`Bill_ID`, `Product_ID`, `Saleprice`, `Qty`, `Date_now`) "
                       . "VALUES ('$bill_id','$conid','$price1Int','$Nameble2','$Date')";
               $objQuery = mysqli_query($connect_db, $Sql);
               
               //ลบวัตถุดิบ
               $in_id=0;
               $Sqlde="SELECT * FROM `ingredient` WHERE Product_ID LIKE '%$conid%'";
               $objde= mysqli_query($connect_db, $Sqlde);
               while($Resultde = mysqli_fetch_array($objde))
                {
                $in_id = $Resultde["increment_id"];
                $amount2 = $Resultde["amount"];
                }
                $dein=$amount2-$Nameble2;
             
                $Sqlup="UPDATE `ingredient` SET `amount`='$dein' WHERE Product_ID LIKE '%003%'";
                $objup= mysqli_query($connect_db, $Sqlup);
               
                    //เพิ่มข้อมูลการใช้วัตถุดิบ
               $Sqlinu="INSERT INTO `used_ingredient`(`Ingredient_ID`, `Product_ID`, `Date`, `Used_Qty`) "
                       . "VALUES ('$in_id','$conid','$Day','$dein')";
               $objinu = mysqli_query($connect_db, $Sqlinu);
            }
            if($Nameble3 != "") //นมสดฮอกไกโด
            {
                $product_id=003;
                $Sql = "SELECT * FROM product WHERE Product_ID='$product_id'";
                $quy = mysqli_query($connect_db, $Sql);
                
                while($Result = mysqli_fetch_array($quy)){
                   ?>
             <center><h2>
                              <?php
                               echo $Result["Product_name"];
                               $price1 = $Result["Saleprice"];
                               $conid = $Result["Product_ID"];
                               ?>
                 &nbsp;
                               <?php
                               echo "ราคา ".$price1Int = (int)($price1)." บาท";
                               echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Nameble3."<br>";
                              ?>
             </h2></center>
                  <?php
                   ?>
                    <input type="hidden" name="id_pro3" value="<?php $Result["Product_ID"];?>">
                   <?php
                }
               $Sql="INSERT INTO `detail_bill`(`Bill_ID`, `Product_ID`, `Saleprice`, `Qty`, `Date_now`) "
                       . "VALUES ('$bill_id','$conid','$price1Int','$Nameble3','$Date')";
               $objQuery = mysqli_query($connect_db, $Sql);
              
               //ลบวัตถุดิบ
               $in_id=0;
               $Sqlde="SELECT * FROM `ingredient` WHERE Product_ID LIKE '%$conid%'";
               $objde= mysqli_query($connect_db, $Sqlde);
               while($Resultde = mysqli_fetch_array($objde))
                {
                   $in_id = $Resultde["increment_id"];
                $amount3 = $Resultde["amount"];
                }
                $dein=$amount3-$Nameble3;
                $Sqlup="UPDATE `ingredient` SET `amount`='$dein' WHERE Product_ID LIKE '%003%'";
                $objup= mysqli_query($connect_db, $Sqlup);
               
                    //เพิ่มข้อมูลการใช้วัตถุดิบ
               $Sqlinu="INSERT INTO `used_ingredient`(`Ingredient_ID`, `Product_ID`, `Date`, `Used_Qty`) "
                       . "VALUES ('$in_id','$conid','$Day','$dein')";
               $objinu = mysqli_query($connect_db, $Sqlinu);
            }
            if($Nameble4 != "") //นมสดฮอกไกโด
            {
                $product_id=004;
                $Sql = "SELECT * FROM product WHERE Product_ID='$product_id'";
                $quy = mysqli_query($connect_db, $Sql);
                
                while($Result = mysqli_fetch_array($quy)){
                    ?>
             <center><h2>
                              <?php
                               echo $Result["Product_name"];
                               $price1 = $Result["Saleprice"];
                               $conid = $Result["Product_ID"];
                               ?>
                 &nbsp;
                               <?php
                               echo "ราคา ".$price1Int = (int)($price1)." บาท";
                               echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Nameble4."<br>";
                              ?>
             </h2></center>
                  <?php
                   ?>
                    <input type="hidden" name="id_pro4" value="<?php $Result["Product_ID"];?>">
                   <?php
                }
                $Sql="INSERT INTO `detail_bill`(`Bill_ID`, `Product_ID`, `Saleprice`, `Qty`, `Date_now`) "
                       . "VALUES ('$bill_id','$conid','$price1Int','$Nameble4','$Date')";
               $objQuery = mysqli_query($connect_db, $Sql);
               
               //ลบวัตถุดิบ
               $in_id=0;
               $Sqlde="SELECT * FROM `ingredient` WHERE Product_ID LIKE '%$conid%'";
               $objde= mysqli_query($connect_db, $Sqlde);
               while($Resultde = mysqli_fetch_array($objde))
                {
                   $in_id = $Resultde["increment_id"];
                $amount4 = $Resultde["amount"];
                }
                $dein=$amount4-$Nameble4;
               $Sqlup="UPDATE `ingredient` SET `amount`='$dein' WHERE Product_ID LIKE '%003%'";
               $objup= mysqli_query($connect_db, $Sqlup);
               
                    //เพิ่มข้อมูลการใช้วัตถุดิบ
               $Sqlinu="INSERT INTO `used_ingredient`(`Ingredient_ID`, `Product_ID`, `Date`, `Used_Qty`) "
                       . "VALUES ('$in_id','$conid','$Day','$dein')";
               $objinu = mysqli_query($connect_db, $Sqlinu);
            }
            if($Nameble5 != "") //นมสดฮอกไกโด
            {
                $product_id=005;
                $Sql = "SELECT * FROM product WHERE Product_ID='$product_id'";
                $quy = mysqli_query($connect_db, $Sql);
                
                while($Result = mysqli_fetch_array($quy)){
                    ?>
             <center><h2>
                              <?php
                               echo $Result["Product_name"];
                               $price1 = $Result["Saleprice"];
                               $conid = $Result["Product_ID"];
                               ?>
                 &nbsp;
                               <?php
                               echo "ราคา ".$price1Int = (int)($price1)." บาท";
                               echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Nameble5."<br>";
                              ?>
             </h2></center>
                  <?php
                   ?>
                    <input type="hidden" name="id_pro5" value="<?php $Result["Product_ID"];?>">
                   <?php
                }
               $Sql="INSERT INTO `detail_bill`(`Bill_ID`, `Product_ID`, `Saleprice`, `Qty`, `Date_now`) "
                       . "VALUES ('$bill_id','$conid','$price1Int','$Nameble5','$Date')";
               $objQuery = mysqli_query($connect_db, $Sql);
               
               //ลบวัตถุดิบ
               $in_id=0;
               $Sqlde="SELECT * FROM `ingredient` WHERE Product_ID LIKE '%$conid%'";
               $objde= mysqli_query($connect_db, $Sqlde);
               while($Resultde = mysqli_fetch_array($objde))
                {
                   $in_id = $Resultde["increment_id"];
                $amount5 = $Resultde["amount"];
                }
                $dein=$amount5-$Nameble5;
                $Sqlup="UPDATE `ingredient` SET `amount`='$dein' WHERE Product_ID LIKE '%003%'";
                $objup= mysqli_query($connect_db, $Sqlup);
               
                    //เพิ่มข้อมูลการใช้วัตถุดิบ
               $Sqlinu="INSERT INTO `used_ingredient`(`Ingredient_ID`, `Product_ID`, `Date`, `Used_Qty`) "
                       . "VALUES ('$in_id','$conid','$Day','$dein')";
               $objinu = mysqli_query($connect_db, $Sqlinu);
            }
            if($Nameble6 != "") //นมสดฮอกไกโด
            {
                $product_id=006;
                $Sql = "SELECT * FROM product WHERE Product_ID='$product_id'";
                $quy = mysqli_query($connect_db, $Sql);
                
                while($Result = mysqli_fetch_array($quy)){
                    ?>
             <center><h2>
                              <?php
                               echo $Result["Product_name"];
                               $price1 = $Result["Saleprice"];
                               $conid = $Result["Product_ID"];
                               ?>
                 &nbsp;
                               <?php
                               echo "ราคา ".$price1Int = (int)($price1)." บาท";
                               echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Nameble6."<br>";
                              ?>
             </h2></center>
                  <?php
                   ?>
                    <input type="hidden" name="id_pro6" value="<?php $Result["Product_ID"];?>">
                   <?php
                }
               $Sql="INSERT INTO `detail_bill`(`Bill_ID`, `Product_ID`, `Saleprice`, `Qty`, `Date_now`) "
                       . "VALUES ('$bill_id','$conid','$price1Int','$Nameble6','$Date')";
               $objQuery = mysqli_query($connect_db, $Sql);
               
               //ลบวัตถุดิบ
               $in_id=0;
               $Sqlde="SELECT * FROM `ingredient` WHERE Product_ID LIKE '%$conid%'";
               $objde= mysqli_query($connect_db, $Sqlde);
               while($Resultde = mysqli_fetch_array($objde))
                {
                   $in_id = $Resultde["increment_id"];
                $amount6 = $Resultde["amount"];
                }
                $dein=$amount6-$Nameble6;
                $Sqlup="UPDATE `ingredient` SET `amount`='$dein' WHERE Product_ID LIKE '%003%'";
                $objup= mysqli_query($connect_db, $Sqlup);
               
                    //เพิ่มข้อมูลการใช้วัตถุดิบ
               $Sqlinu="INSERT INTO `used_ingredient`(`Ingredient_ID`, `Product_ID`, `Date`, `Used_Qty`) "
                       . "VALUES ('$in_id','$conid','$Day','$dein')";
               $objinu = mysqli_query($connect_db, $Sqlinu);
            }
            
            if($Nameble7 != "") //นมสดฮอกไกโด
            {
                $product_id=007;
                $Sql = "SELECT * FROM product WHERE Product_ID='$product_id'";
                $quy = mysqli_query($connect_db, $Sql);
                
                while($Result = mysqli_fetch_array($quy)){
                    ?>
             <center><h2>
                              <?php
                               echo $Result["Product_name"];
                               $price1 = $Result["Saleprice"];
                               $conid = $Result["Product_ID"];
                               ?>
                 &nbsp;
                               <?php
                               echo "ราคา ".$price1Int = (int)($price1)." บาท";
                               echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Nameble7."<br>";
                              ?>
             </h2></center>
                  <?php
                   ?>
                    <input type="hidden" name="id_pro7" value="<?php $Result["Product_ID"];?>">
                   <?php
                }
               $Sql="INSERT INTO `detail_bill`(`Bill_ID`, `Product_ID`, `Saleprice`, `Qty`, `Date_now`) "
                       . "VALUES ('$bill_id','$conid','$price1Int','$Nameble7','$Date')";
               $objQuery = mysqli_query($connect_db, $Sql);
               
               //ลบวัตถุดิบ
               $in_id=0;
               $Sqlde="SELECT * FROM `ingredient` WHERE Product_ID LIKE '%$conid%'";
               $objde= mysqli_query($connect_db, $Sqlde);
               while($Resultde = mysqli_fetch_array($objde))
                {
                   $in_id = $Resultde["increment_id"];
                $amount7 = $Resultde["amount"];
                }
                $dein=$amount7-$Nameble7;
                $Sqlup="UPDATE `ingredient` SET `amount`='$dein' WHERE Product_ID LIKE '%003%'";
                $objup= mysqli_query($connect_db, $Sqlup);
               
                    //เพิ่มข้อมูลการใช้วัตถุดิบ
               $Sqlinu="INSERT INTO `used_ingredient`(`Ingredient_ID`, `Product_ID`, `Date`, `Used_Qty`) "
                       . "VALUES ('$in_id','$conid','$Day','$dein')";
               $objinu = mysqli_query($connect_db, $Sqlinu);
            }
         
        ?>   
                    </font>
         </h2></td>
            <td></td>
            </tr>
        </table>
        

        <table border="0" width="100%">
            <tr>
                <td align="center"><h2><?php
                $totalqry=$Nameble1+$Nameble2+$Nameble3+$Nameble4+$Nameble5+$Nameble6+$Nameble7;
                $totalprice=$totalqry*40;
                echo "ราคาทั้งสิ้น&nbsp;&nbsp;&nbsp;".$totalprice."&nbsp;&nbsp;&nbsp;บาท";
            ?>
                    </h2>             
            </td>
            </tr>
        </table>
        <table border="0" width="100%">
            <tr>
            <input type="hidden" name="time_now" value="<?php
                echo $time_now;
            ?>">
                <input type="hidden" name="day_now" value="<?php
                echo $Date;
            ?>">
                <td align="center"><button class="button2 button3" name="configbill">สั่งซื้อสินค้า</button></td>
                
            </tr>
        </table>
                    </form>
                    <table width="100%">
                        <tr>
                <td align="center"><a href="menu.php"><button class="button button5" name="delectbill">แก้ไข</button></a>        
               <a href="main.php"><button class="button button5" name="cbill">ยกเลิก</button></td></a>\
                        </tr>
                    </table>
</body>
</html>
