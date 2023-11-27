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
  padding: 10px 50px;
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
    padding: 10px 50px;
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
    <h2>
       <table border="0" width="100%">
            <tr>
                <td align="center"><img src="image/icon.png" style="width: 150px;height: 150px;">
                </td>
                <td align="center"><font color="#ffffff" size="3px"><?php
                    echo"สวัสดีคุณ ".$session_admin_name."<br>คุณกำลังเข้าสู่ระบบสต็อคสินค้า"
                ?></td>
            </tr>
       </table>
        <table border="0" width="100%">
        
        <tr align="center"  style="background-color:#fff;">
                <td><font color="#000" size="3px">รหัสวัตถุดิบ</td>
                <td><font color="#000" size="3px">รายชื่อวัตถุดิบ</td>
                <td><font color="#000" size="3px">ปริมาณคงเหลือ</td>
                <td><font color="#000" size="3px">สั่งเพิ่ม</td>
        </tr>
        <?php
        $Sqlige="SELECT * FROM ingredient";
        $objige = mysqli_query($connect_db, $Sqlige);
        while($Resultige = mysqli_fetch_array($objige))
        {
        ?>
            <tr style="background-color:">
                <td align="center"><font color="#ffffff" size="3px"><?php echo $Resultige["increment_id"];?>
                    <input type="hidden" name="icm_id" value="<?php echo $Resultige["increment_id"];?>"></td>
                <td align="center"><font color="#ffffff" size="3px"><?php echo $Resultige["increment_name"];?>
                <input type="hidden" name="icm_name" value="<?php echo $Resultige["increment_name"];?>"></td>
                <td align="center"><font color="#ffffff" size="3px"><?php echo $Resultige["amount"];?>
                <input type="hidden" name="amo" value="<?php echo $Resultige["amount"];?>"></td>
                <td align="center">
                    <a href="buystock.php?id=<?php echo $Resultige['increment_id'];?>"><font color="#ffffff" size="3px">เพิ่มวัตถุดิบ</a>
                </td>
            </tr>
         <?php
        }
      ?>
            </table>
    <table botder="0" width="100%" style="margin-top: 40px;">
            <tr>
                
                <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                    <a href="main.php"><button class="button2 button3">กลับเมนู</button></a></td>
                <td width="20%"></td>
                <td align="center">
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="check_logout.php"><button class="button button5">ออกจากระบบ</button></a>
                </td>
            </tr>
        </table>
    </body>
</html>
