<?php include_once ROOT_DIR . "./views/clients/header.php" ?>

<!-- Product Details Section -->
<section class="product-details container py-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <img src="<?= 'images/' . $product['image'] ?>" alt="<?= $product['name'] ?>" class="img-fluid rounded shadow-sm">
        </div>

        <!-- Product Info -->
        <div class="col-md-6">
            <h1 class="display-4"><?= $product['name'] ?></h1>
            <p class="price text-danger h3">Giá: <?= $product['price'] ?> VNĐ</p>
            <p class="description"><?= $product['description'] ?></p>

            <div class="additional-info mt-4">
                <h3 class="h4">Thông tin chi tiết</h3>
                <ul class="list-unstyled">
                    <li><strong>Số lượng còn:</strong> <?= $product['quantity'] ?></li>
                    <li><strong>Trạng thái:</strong> 
                        <span class="badge <?= $product['quantity'] ? 'bg-success' : 'bg-danger' ?>">
                            <?= $product['quantity'] ? 'Còn hàng' : 'Hết hàng' ?>
                        </span>
                    </li>
                </ul>
            </div>
            
            <div class="add-to-cart mt-3">
                <a href="<?= ROOT_URL . '?ctl=add-cart&id='. $product['id'] ?>" class="btn btn-danger btn-lg">
                    <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="reviews container py-5">
    <h2 class="h3 mb-4">Đánh giá từ khách hàng</h2>
    <div class="review mb-4">
        <p><strong>Nguyễn Văn A</strong> <span>★★★★★</span></p>
        <p>Sản phẩm rất tốt, sử dụng mượt mà và pin lâu. Rất hài lòng!</p>
    </div>
    <div class="review mb-4">
        <p><strong>Trần Thị B</strong> <span>★★★★☆</span></p>
        <p>Máy đẹp và nhẹ, rất tiện lợi mang đi làm.</p>
    </div>
</section>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
