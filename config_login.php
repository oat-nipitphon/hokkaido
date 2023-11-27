<?php

    require 'connect_db.php';
    $Username = mysqli_real_escape_string($connect_db,$_POST['username']);
    $Password = mysqli_real_escape_string($connect_db,$_POST['password']);

    $Sql = "SELECT * FROM admin WHERE Username=? AND Password=?";
    $stmt = mysqli_prepare($connect_db, $Sql);
    mysqli_stmt_bind_param($stmt, "ss", $Username,$Password);
    mysqli_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);
    if($result_user->num_rows == 1){
        session_start();
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $_SESSION['Admin_ID'] = $row_user['Admin_ID'];
        header("Location: main.php");
    }
    else{
        echo "ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
     mysqli_close($connect_db);



