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
        }else{
            echo "Chào:".$_SESSION["login"][1];
            echo "<a href='logout.php'>Logout </a>";
        }
        include("connection.php");
        if(isset($_POST["addNew"])){
            // echo "<Pre>";
            // print_r($_POST);
            // die;
            $date = date("Y-m-d H:i:s");
            $name = $_POST["cat_name"];
            $status = isset($_POST["status"])?"1":"0";
            $sqlInsert = "INSERT INTO tbl_category (cat_name,`status`,date_create) VALUES ('$name','$status','$date')";
            // echo $sqlInsert;
            mysqli_query($conn,$sqlInsert) or die("Không thêm mới dc bản ghi");
            header("location:listcategory.php");
        }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Tên Danh Mục</td>
                <td>
                    <input type="text" name="cat_name" id="cat_name">
                </td>
            </tr>
            <tr>
                <td>Trạng Thái</td>
                <td>
                    <input type="checkbox" name="status" id="status" value="1" />Ẩn/Hiện
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Thêm Mới" name="addNew">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>