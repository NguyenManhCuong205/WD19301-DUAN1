<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container mt-5">
    <!-- Tiêu đề -->
    <h2 class="text-primary mb-4">Thêm mới danh mục sản phẩm</h2>

    <!-- Form thêm danh mục -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?= ADMIN_URL . '?ctl=storedm' ?>" method="post" enctype="multipart/form-data">
                <!-- Tên danh mục -->
                <div class="mb-3">
                    <label for="cate_name" class="form-label">Tên danh mục</label>
                    <input type="text" name="cate_name" id="cate_name" class="form-control" required>
                </div>

                <!-- Loại sản phẩm -->
                <div class="mb-3">
                    <label class="form-label">Loại sản phẩm</label> <br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="type" value="1" class="form-check-input" checked id="laptop_lenovo">
                        <label class="form-check-label" for="laptop_lenovo">Laptop Lenovo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="type" value="0" class="form-check-input" id="laptop_other">
                        <label class="form-check-label" for="laptop_other">Laptop khác</label>
                    </div>
                </div>

                <!-- Nút Thêm mới -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a href="<?= ADMIN_URL . '?ctl=dm' ?>" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
