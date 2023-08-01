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
        $cat_id = 0;
        $cat_name = "";
        $status = false;
        include("connection.php");
        //lấy dữ liệu từ CSDL ra form
        if(isset($_GET["id"])){
            
            $cat_id =  $id = $_GET["id"];
            $sqlSelectCat = "SELECT * FROM tbl_category WHERE cat_id = ".$id;
            $query = mysqli_query($conn,$sqlSelectCat) or die("Không lấy dc bản ghi");
            $row = mysqli_fetch_row($query);
            $cat_name = $row[1];
            $status = $row[2];
        }
        //cập nhật lại dữ liệu vào CSDL
        if(isset($_POST["addNew"])){
            $date = date("Y-m-d H:i:s");
            $name = $_POST["cat_name"];
            $id = $_POST["cat_id"];
            $status = isset($_POST["status"])?"1":"0";

            $sqlUpdate = "UPDATE tbl_category SET cat_name = '$name',`status`='$status',date_create='$date' WHERE cat_id=$id";
            mysqli_query($conn,$sqlUpdate) or die("Lỗi cập nhật");
            header("location:listcategory.php");
        }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Tên Danh Mục</td>
                <td>
                    <input type="hidden" name="cat_id" id = "cat_id" value="<?= $cat_id ?>">
                    <input type="text" name="cat_name" id="cat_name" value="<?= $cat_name ?>">
                </td>
            </tr>
            <tr>
                <td>Trạng Thái</td>
                <td>
                    <input type="checkbox" name="status" id="status" value="1" <?= ($status)?"checked":"" ?> />Ẩn/Hiện
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Cập nhật" name="addNew">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>