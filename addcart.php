<?php 
    if(isset($_POST["pro_id"])){
        include("connection.php");
        $pro_id =  $_POST["pro_id"];
        $sqlDetail = "SELECT * FROM tbl_product WHERE pro_id = ".$pro_id;
        $result = mysqli_query($conn,$sqlDetail) or die("Lỗi truy vấn");
        $row = mysqli_fetch_row($result);

        if(isset($row)){
            session_start();
            if(!isset($_SESSION["cart"])){//lan dau mua hang
                $cart[$pro_id]=[
                    "pro_name"=>$row[1],
                    "pro_price"=>$row[2],
                    "pro_image"=>$row[3],
                    "pro_quanlity"=>1
                ];
                $_SESSION["cart"] = $cart;
            }else{
                $cart = $_SESSION["cart"];
                if(array_key_exists($pro_id,$cart)){
                    $cart[$pro_id]=[
                        "pro_name"=>$row[1],
                        "pro_price"=>$row[2],
                        "pro_image"=>$row[3],
                        "pro_quanlity"=>$cart[$pro_id]["pro_quanlity"] +1
                    ];
                }else{
                    $cart[$pro_id]=[
                        "pro_name"=>$row[1],
                        "pro_price"=>$row[2],
                        "pro_image"=>$row[3],
                        "pro_quanlity"=>1
                    ];
                }
                $_SESSION["cart"] = $cart;
            }
            $total=0;
            foreach($_SESSION["cart"] as $key=>$val){
                $total +=$val["pro_quanlity"];
            } 
            echo $total; 
        }
    }
?>