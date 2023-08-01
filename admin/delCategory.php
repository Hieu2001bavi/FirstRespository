<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION["login"])){
            header("location:login.php");
        }
        if(isset($_GET["id"])){
            include("connection.php");
            $id = $_GET["id"];
            $sqlDel = "DELETE FROM tbl_category WHERE cat_id = ".$id;
            mysqli_query($conn,$sqlDel) or die("Lỗi cập nhật");
            header("location:listcategory.php");
        }
    ?>
</body>
</html>