<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container mt-5">
    <!-- Hiển thị thông báo -->
    <?php if ($message != '') : ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif ?>
    
    <!-- Tiêu đề và nút thêm -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Quản lý sản phẩm</h2>
        <a href="<?= ADMIN_URL . '?ctl=addsp' ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Thêm sản phẩm
        </a>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $pro): ?>
                    <tr>
                        <th scope="row"><?= $pro['id'] ?></th>
                        <td><?= $pro['name'] ?></td>
                        <td>
                            <img src="<?= ROOT_URL . 'images/' . $pro['image'] ?>" width="60" class="img-thumbnail" alt="Hình sản phẩm">
                        </td>
                        <td><?= $pro['price'], '', '' ?>₫</td>
                        <td><?= $pro['quantity'] ?></td>
                        <td>
                            <span class="badge <?= $pro['status'] ? 'bg-success' : 'bg-danger' ?>">
                                <?= $pro['status'] ? "Đang kinh doanh" : "Ngừng kinh doanh" ?>
                            </span>
                        </td>
                        <td><?= $pro['cate_name'] ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="<?= ADMIN_URL . '?ctl=editsp&id=' . $pro['id'] ?>" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil"></i> Sửa
                                </a>
                                <a href="<?= ADMIN_URL . '?ctl=deletesp&id=' . $pro['id'] ?>" class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
