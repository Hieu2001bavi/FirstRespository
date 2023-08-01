<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table width="500" border="1">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php 
            session_start();
            if(!isset($_SESSION["login"])){
                header("location:login.php");
            }
            include("connection.php");
            $sqlSelectCat = "SELECT * FROM tbl_category";
            $query = mysqli_query($conn,$sqlSelectCat) or die("Lỗi truy vấn");
            $i=0;
            foreach($query as $val):
                $i++;
        ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $val["cat_name"]; ?></td>
                <td><?= ($val["status"])?"Hiển thị":"Ẩn"; ?></td>
                <td><?= date("d-m-Y",strtotime($val["date_create"])); ?></td>
                <td>
                    <a href="editCategory.php?id=<?= $val["cat_id"]; ?>">Edit</a>
                    <a href="delCategory.php?id=<?= $val["cat_id"]; ?>" onclick="return confirm('Bạn muốn xóa không?')">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>