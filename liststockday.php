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
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/style.css" rel="stylesheet">
<head>
    <title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
  font-size: 1.3em; /* 30px/16=1.875em */
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
    
    <body>
        <table border="0" width="100%">
        <tr>
            <td align="center"><img src="image/head.jpg" style="width: 100%;height: 100%;"></td>
        </tr>  
        </table>
        <table border="0" width="100%">
            <tr>
            
            <td width="30%" align="center"><img src="image/icon.png" style="width: 150px;height: 150px;"></td>
            <td align="center"><h2><?php
                echo"สวัสดีคุณ $session_admin_name<br>กรุณาเลือกระบบที่ท่านต้องการ";
                ?></h2></td>
            </tr>
        </table>
        
         <table border="0" width="100%">
            <tr>
            
            <td width="30%" align="center"><h2>ค้นหารายงานยอดขายประจำวัน</h2></td>
            </tr>
        </table>
        
        <form action="checkstock.php" method="POST">
            <table border="0" width="100%">
            <tr>
                <td width="30%" align="center"><h2>:: กรุณาป้อนวันที่ ::</h2>
            
                <select name="daylist">
                <?php
                    $Sql="SELECT DISTINCT Bill_date FROM bill";
                    $Obj= mysqli_query($connect_db, $Sql);
                    while($Result= mysqli_fetch_array($Obj))
                    {
                        ?>
                    }
                        <option value="<?php echo $Result["Bill_date"];?>"><?php echo $Result["Bill_date"];?></option>
                        <?php
                    }
                    ?>
                </select> 
            </td>
            </tr>
            <tr>
                    <td width="10%" align="center"><button class="button">ค้นหา</button></td>
                </tr>
        </table>
           
        </form>
        <p align="center"><img src="image/menu3.jpg" style="width: 50%;height: 30%;"></p>
        <table botder="0" width="100%">
            <tr>
                <td></td>
                <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <a href="main.php"><button class="button">กลับเมนู</button></a></td>
                <td>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   
                    <a href="check_logout.php"><button class="button">ออกจากระบบ</button></a>
                </td>
            </tr>
        </table>
    </body>
</html>
