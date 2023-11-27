<?php
 session_start();
    if(!isset($_SESSION['Admin_ID'])){
        header("Location: index.php");
    }
    require 'connect_db.php';
    $session_admin_id = $_SESSION['Admin_ID'];
    $qry_user = "SELECT * FROM admin WHERE Admin_ID=$session_admin_id";
    $result_user = mysqli_query($connect_db, $qry_user);
    if($result_user){
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $session_admin_id = $row_user['Admin_ID'];
        $session_admin_name = $row_user['Admin_name'];
        mysqli_free_result($result_user);
    }
    
    mysqli_close($connect_db);

