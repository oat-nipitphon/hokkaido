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
  background-color: #e8a97e;
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
[class*="te"] {
  background: #e8a97e;
  border-color: back;
  border: none;
  color: white;
  padding: 10px 1%;
  font-size: 20px;
}
h1 {
  font-size: 80%; /* 30px/16=1.875em */
  color: #000000;
 }


h2 {
  font-size: 1em; /* 30px/16=1.875em */
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
<body style="background-color: #937761;">
    <table border="0" width="100%">
        <h2>
            <tr>
                <td align="center">
                    <img src="image/icon.png" style="width: 150px;height: 150px;">
                    <font size="5px" color="#ffffff"><?php
                    echo"<br><br>สวัสดีคุณ ".$session_admin_name."<br>คุณกำลังเข้าสู่ระบบสต็อคสินค้า<br><br>"
                            ?>
                </td>
            </tr>
    </table><form action="configstock.php" method="POST">
        <table border="0" width="50%" style="background-color: #ffffff;" align="center">
        
            <tr>
                <td align="center"  style="background-color: #ffffff;"><h1><font size="4px">รหัสวัตถุดิบ</h1></td>
                <td align="center" style="background-color: #ffffff;"><h1><font size="4px">รายชื่อวัตถุดิบ</h1></td>
                <td align="center" style="background-color: #ffffff;"><h1><font size="4px">ปริมาณคงเหลือ</h1></td>
            </tr>
        
        
     <?php
     $icm_id=$_GET['id'];
     $Sql="SELECT * FROM ingredient WHERE increment_id='$icm_id'";
     $obj= mysqli_query($connect_db, $Sql);
     while ($Result= mysqli_fetch_array($obj))
     {
         
         ?><tr>
             <td align="center"><font size="4px"><?php echo $Result['increment_id'];?>
            <input type="hidden" name="upid" value="<?php echo $Result['increment_id'];?>"></td>
             <td align="center"><font size="4px"><?php echo $Result['increment_name'];?>
            <input type="hidden" name="nameup" value="<?php echo $Result['increment_name'];?>">
            </td>
            <td align="center"><font size="4px"><?php echo $Result['amount'];?>
            <input type="hidden" name="amo" value="<?php echo $Result['amount'];?>"></td>
           </tr>
         <?php
     }
     ?>  
        </table>
        <br><br><br><br>
        <table border="0" width="50%" style="background-color: #ffffff;" align="center">
            <tr>
                <td align="center"><font size="4px">วันผลิต<br>
                   <font size="4px"> <?php
                    echo"". date("Y/m/d");
                        $mfd= date("Y/m/d");
                    ?>
                    <input type="hidden" name="mfd" value="<?php echo $mfd;?>">
                     </td>
                <td align="center"><input type="text" name="up" class="first_test"></td>
                <td align="center"><font size="4px">วันหมดอายุ<br>
                   <font size="4px"> <?php
                        $m = date("m");
                        $expm = $m+5;
                        $d = date("d");
                        $y = date("Y");
                        echo $y."/".$expm."/".$d;
                    ?>
                    
                    <input type="hidden" name="expm" value="<?php echo $expm;?>">
                </td>
            </tr>
    </table>
        <table width="50%" border="0" style="background-color: #ffffff;" align="center"><tr>
                <td align="center"><button class="button">ยืนยันการสั่ง</button></td>
            </tr></table>
    </form>
</h2>
</body>
</html>
