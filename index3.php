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
        $arrError = [
            "File upload Ok",
            "The uploaded file exceeds the upload_max_filesize directive in",
            "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form"
        ];
        $path = "uploads/";
        if(isset($_POST['upload'])){
            if(isset($_FILES["avata"]["name"])){
                if($_FILES["avata"]["type"]=="image/jpeg" ||$_FILES["avata"]["type"]=="image/png" || $_FILES["avata"]["type"]=="image/gif"){
                    if($_FILES["avata"]["error"]==0){
                        if($_FILES["avata"]["size"]>2048){
                            //thực hiện đưa file lên server
                            move_uploaded_file($_FILES["avata"]["tmp_name"],$path.$_FILES["avata"]["name"]);
                        }else{
                            echo "File lớn quá";
                        }
                    }else{
                        echo $arrError[$_FILES["avata"]["error"]];
                    }
                }else{
                    echo "Bạn chỉ dc đưa lên file ảnh jpg png gif";
                }
            }else{
                echo "Bạn chưa chọn FIle";
            }
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="avata" id="avata">
        <input type="submit" value="Upload" name="upload">
    </form>
</body>
</html>