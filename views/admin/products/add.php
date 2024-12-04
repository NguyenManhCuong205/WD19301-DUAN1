<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container mt-5">
    <h2 class="text-primary mb-4">Thêm sản phẩm mới</h2>
    <form action="<?= ADMIN_URL . '?ctl=storesp' ?>" method="post" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-light">
        <!-- Tên sản phẩm -->
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
        </div>

        <!-- Danh mục -->
        <div class="mb-3">
            <label for="category_id" class="form-label fw-bold">Danh mục</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <?php foreach ($categories as $cate): ?>
                    <option value="<?= $cate['id'] ?>"><?= $cate['cate_name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- Hình ảnh -->
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <!-- Giá -->
        <div class="mb-3">
            <label for="price" class="form-label fw-bold">Giá</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="Nhập giá sản phẩm" required>
        </div>

        <!-- Số lượng -->
        <div class="mb-3">
            <label for="quantity" class="form-label fw-bold">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Nhập số lượng" required>
        </div>

        <!-- Trạng thái -->
        <div class="mb-3">
            <label class="form-label fw-bold">Trạng thái</label> <br>
            <div class="form-check form-check-inline">
                <input type="radio" name="status" id="status1" value="1" class="form-check-input" checked>
                <label for="status1" class="form-check-label">Đang kinh doanh</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="status" id="status0" value="0" class="form-check-input">
                <label for="status0" class="form-check-label">Ngừng kinh doanh</label>
            </div>
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Mô tả sản phẩm</label>
            <textarea name="description" id="description" class="form-control" rows="6" placeholder="Nhập mô tả sản phẩm"></textarea>
        </div>

        <!-- Nút Thêm mới -->
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Thêm mới
            </button>
        </div>
    </form>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
