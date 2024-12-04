<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container mt-5">
    <!-- Tiêu đề -->
    <h2 class="text-primary mb-4">Quản lý danh mục sản phẩm</h2>

    <!-- Thông báo -->
    <?php if ($message != ''): ?>
        <div class="alert alert-success mb-4">
            <?= $message ?>
        </div>
    <?php endif ?>

    <!-- Bảng danh sách danh mục -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="mb-3 text-end">
                <a href="<?= ADMIN_URL . '?ctl=adddm' ?>" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Thêm danh mục
                </a>
            </div>
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Loại sản phẩm</th>
                        <th scope="col" class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $cate): ?>
                        <tr>
                            <th scope="row"><?= $cate['id'] ?></th>
                            <td><?= $cate['cate_name'] ?></td>
                            <td><?= $cate['type'] ? 'Laptop' : 'Laptop Lenovo' ?></td>
                            <td class="text-center">
                                <a href="<?= ADMIN_URL . '?ctl=editdm&id=' . $cate['id'] ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Sửa
                                </a>
                                <a href="<?= ADMIN_URL . '?ctl=deletedm&id=' . $cate['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không?')">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
