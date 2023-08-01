<div class="col-lg-6">
    <!-- Custom Text Color Utilities -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php 
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
        </div>
    </div>
</div>