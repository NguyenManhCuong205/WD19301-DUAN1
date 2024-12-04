<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container mt-5">
    <h2 class="text-primary mb-4">Cập nhật sản phẩm</h2>
    <form action="<?= ADMIN_URL . '?ctl=updatesp' ?>" method="post" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-light">
        <!-- Tên sản phẩm -->
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
            <input type="text" name="name" id="name" value="<?= $product['name'] ?>" class="form-control" placeholder="Nhập tên sản phẩm" required>
        </div>

        <!-- Danh mục -->
        <div class="mb-3">
            <label for="category_id" class="form-label fw-bold">Danh mục</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <?php foreach ($categories as $cate): ?>
                    <option value="<?= $cate['id'] ?>" <?= ($product['category_id'] == $cate['id']) ? 'selected' : '' ?>>
                        <?= $cate['cate_name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- Hình ảnh -->
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Hình ảnh</label>
            <div class="mb-2">
                <img src="<?= ROOT_URL . 'images/' . $product['image'] ?>" class="img-thumbnail" width="100" alt="Hình sản phẩm">
            </div>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <!-- Giá -->
        <div class="mb-3">
            <label for="price" class="form-label fw-bold">Giá</label>
            <input type="number" name="price" id="price" value="<?= $product['price'] ?>" class="form-control" placeholder="Nhập giá sản phẩm" required>
        </div>

        <!-- Số lượng -->
        <div class="mb-3">
            <label for="quantity" class="form-label fw-bold">Số lượng</label>
            <input type="number" name="quantity" id="quantity" value="<?= $product['quantity'] ?>" class="form-control" placeholder="Nhập số lượng" required>
        </div>

        <!-- Trạng thái -->
        <div class="mb-3">
            <label class="form-label fw-bold">Trạng thái</label> <br>
            <div class="form-check form-check-inline">
                <input type="radio" name="status" id="status1" value="1" class="form-check-input" <?= $product['status'] ? 'checked' : '' ?>>
                <label for="status1" class="form-check-label">Đang kinh doanh</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="status" id="status0" value="0" class="form-check-input" <?= $product['status'] == 0 ? 'checked' : '' ?>>
                <label for="status0" class="form-check-label">Ngừng kinh doanh</label>
            </div>
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Mô tả sản phẩm</label>
            <textarea name="description" id="description" class="form-control" rows="6" placeholder="Nhập mô tả sản phẩm"><?= $product['description'] ?></textarea>
        </div>

        <!-- Hidden id -->
        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <!-- Nút Cập nhật -->
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Cập nhật
            </button>
        </div>
    </form>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
