<div class="col-lg-6">
    <!-- Custom Text Color Utilities -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới</h6>
        </div>
        <div class="card-body">
        <?php 
            
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
                header("location:index.php?page=listcategory");
            }
        ?>
        <form method="post" action="">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" name="cat_name" id="cat_name">
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