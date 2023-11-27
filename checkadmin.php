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
            <td align="center"><img src="image/head.jpg" style="width: 100%;height: 150px;"></td>
        </tr>  
    </table>
        <table border="0" width="100%">
        <tr>
            <td align="center"><img src="image/icon.png" style="width: 150px;height: 150px;"></td>
        </tr>  
        </table>
        
        <table border="0" width="100%">
            <tr>
           <td align="center"><h2></h2></td>
        </tr> 
        <tr>
           <td align="center"><h2></h2></td>
        </tr>  
        </table>
        <?php
        $User=$_POST['username'];
        $Pass=$_POST['password'];
        $Name=$_POST['adminname'];
        $Tel=$_POST['tel'];
        $Salary=$_POST['salary'];
        $Add=$_POST['add'];
        $Sql="INSERT INTO `admin`(`Admin_name`, `Tel`, `Salary`, `Add`, `Username`, `Password`) "
                . "VALUES ('$Name','$Tel','$Salary','$Add','$User','$Pass')";
        $Obj= mysqli_query($connect_db, $Sql);
        if($Obj)
        {
            ?>
    <center> <a href="main.php"<button class="button">กลับเมนู</button></a></center>
                <?php
        }
        ?>
    </body>
</html>
