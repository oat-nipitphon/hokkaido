<?php
    $connect_db = mysqli_connect('localhost', 'root', '','hokkaido');
    if(mysqli_connect_errno())
    {
        echo"Connect Eroor".mysqli_connect_errno();
    }else{
        // echo "OK Connect";
    }
    mysqli_set_charset($connect_db,'utf8');
?>