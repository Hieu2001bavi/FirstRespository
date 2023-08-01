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
        include("connection.php");
        if(isset($_POST["login"])){
            $user_name =$_POST["user_name"];
            $password = md5($_POST["password"]);
            $sqlCheck = "SELECT * FROM tbl_users WHERE user_name = '$user_name' AND `password`='$password'";
            $result = mysqli_query($conn,$sqlCheck) or die("Lỗi");
            $row = mysqli_fetch_row($result);//=>array
            if($row){
                // echo "<prE>";
                // print_r($row);
                $_SESSION["login"] = $row;
                // print_r($_SESSION);
                header("location:index.php");
            }else{
                echo "Tên đăng nhập và mật khẩu không đúng";
            }
            
        }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>user name</td>
                <td>
                    <input type="text" name="user_name" id="user_name">
                </td>
            </tr>
            <tr>
                <td>password</td>
                <td>
                    <input type="text" name="password" id="password">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Login" name="login">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>