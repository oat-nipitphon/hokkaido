<!DOCTYPE html>
<?php
    include 'connect_db.php';
    date_default_timezone_set("Asia/Bangkok");
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" rel="stylesheet">
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
    <table border="0" width="60%" align="center">
        <tr>
            <td align="center" style="background-color: #ffffff;"><font color="#000000" size="3px"><?php echo "วันที่ ". date("d")." เดือน ". date("m")." ปี ". date("Y");?></td>
       
            <td align="center" style="background-color: #ffffff;"><font color="#000000" size="3px"><div id="txt"></div></td>
        </tr>  
        </table>
    <table border="0" width="100%" aling="center">
        <tr>
            <td align="center"><img src="image/icon.png" style="width: 150px;height: 150px;">
                <br><h2>กรุณาเข้าสู่ระบบ</h2></td>
        </tr>  
    </table>
    <form action="config_login.php" method="POST">
    <table border="0" width="100%">
        <tr>
            <td align="center"><p>Username :: <input type="text" name="username" placeholder="Username" required class="first_test" style="height: 25px;"></td>
            </p>
        </tr>
        <tr>
            <td align="center"><p>Password :: <input type="password" name="password" placeholder="Password" required class="first_test" style="height: 25px;"></td>
            </p>
        </tr> 
    </table>
        <table border="0" width="100%">
        <tr>
            <td align="center"><button class="button">เข้าสู่ระบบ</button></td>
        </tr> 
    </table>
</form>
</body>
</html>
