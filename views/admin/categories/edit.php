<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container mt-5">
    <!-- Tiêu đề -->
    <h2 class="text-primary mb-4">Cập nhật danh mục sản phẩm</h2>

    <!-- Thông báo -->
    <?php if ($message != ''): ?>
        <div class="alert alert-success mb-4">
            <?= $message ?>
        </div>
    <?php endif ?>

    <!-- Form cập nhật danh mục -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?= ADMIN_URL . '?ctl=updatedm' ?>" method="post">
                <div class="mb-3">
                    <label for="cate_name" class="form-label">Tên danh mục</label>
                    <input type="text" name="cate_name" value="<?= $category['cate_name'] ?>" class="form-control" id="cate_name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Loại sản phẩm</label> <br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="type" value="1" class="form-check-input" <?= $category['type'] ? 'checked' : '' ?> id="laptop_lenovo">
                        <label class="form-check-label" for="laptop_lenovo">Laptop Lenovo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="type" value="0" class="form-check-input" <?= $category['type'] == 0 ? 'checked' : '' ?> id="laptop_other">
                        <label class="form-check-label" for="laptop_other">Laptop khác</label>
                    </div>
                </div>

                <!-- Lưu id vào hidden -->
                <input type="hidden" name="id" value="<?= $category['id'] ?>">

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="<?= ADMIN_URL . '?ctl=dm' ?>" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
