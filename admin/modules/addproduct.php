<div class="col-lg-8">
    <!-- Custom Text Color Utilities -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới</h6>
        </div>
        <div class="card-body">
        <?php 
            include("connection.php");
            $pro_images="";
            if(isset($_POST["addNew"])){
                $date = date("Y-m-d H:i:s");
                $pro_name = $_POST["pro_name"];
                $cat_id = $_POST["cat_id"];
                $pro_price = $_POST["pro_price"];
                $price_sale = $_POST["price_sale"];
                $pro_description = $_POST["pro_description"];
                $status = isset($_POST["status"])?"1":"0";
                $path = "../uploads/";
                if(isset($_FILES["pro_images"]["name"])){
                    if($_FILES["pro_images"]["type"]=="image/jpeg" ||$_FILES["pro_images"]["type"]=="image/png" || $_FILES["pro_images"]["type"]=="image/gif"){
                        if($_FILES["pro_images"]["error"]==0){
                            if($_FILES["pro_images"]["size"]>2048){
                                //thực hiện đưa file lên server
                               $pro_images =  $path.$_FILES["pro_images"]["name"];
                                move_uploaded_file($_FILES["pro_images"]["tmp_name"],$path.$_FILES["pro_images"]["name"]);
                            }else{
                                echo "File lớn quá";
                            }
                        }else{
                            echo $arrError[$_FILES["pro_images"]["error"]];
                        }
                    }else{
                        echo "Bạn chỉ dc đưa lên file ảnh jpg png gif";
                    }
                }else{
                    echo "Bạn chưa chọn FIle";
                }

                $sqlInsert = "INSERT INTO tbl_product(pro_name,pro_price,pro_images,pro_description,cat_id,`status`,date_create,price_sale)";
                $sqlInsert .= " VALUES('$pro_name','$pro_price','$pro_images','$pro_description','$cat_id','$status','$date','$price_sale')";
                // echo $sqlInsert;
                mysqli_query($conn,$sqlInsert) or die("Không thêm mới dc bản ghi");
                header("location:index.php?page=listproduct");
            }
        ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="pro_name" id="pro_name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Danh mục sản phẩm</label>
                <select class="form-control" aria-label="Default select example" name="cat_id" id="cat_id">
                    <option selected>--- Chọn Danh Mục ---</option>
                    <?php 
                        $sqlSelectCat = "SELECT * FROM tbl_category";
                        $query = mysqli_query($conn,$sqlSelectCat) or die("Lỗi truy vấn");
                        $i=0;
                        foreach($query as $val):
                            $i++;
                    ?>
                        <option value="<?= $val["cat_id"]; ?>"><?= $val["cat_name"]; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giá sản phẩm</label>
                <input type="text" class="form-control" name="pro_price" id="pro_price">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giá sale</label>
                <input type="text" class="form-control" name="price_sale" id="price_sale" value="0">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ảnh sản phẩm</label>
                <input type="file" name="pro_images" id="pro_images">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mô tả sản phẩm</label>
                <textarea class="form-control" id="pro_description" name="pro_description" rows="3"></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="status" id="status" value="1" />
                <label class="form-check-label" for="exampleCheck1">Ẩn/Hiện</label>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <input type="submit" value="Thêm Mới" name="addNew" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
