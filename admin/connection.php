<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dataBase = "c2303lm";
    
    // Create connection
    $conn = @mysqli_connect($servername, $username, $password,$dataBase) or die("Không thể kết nối sang CSDL");
    mysqli_set_charset($conn,"utf-8");
?>