<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Sản phẩm</h1>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($products as $pro): ?>
            <div class="col">
                <div class="card shadow-sm h-100">
                    <img src="images/<?= $pro['image'] ?>" alt="<?= $pro['name'] ?>" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <a href="<?= ROOT_URL . '?ctl=detail&id=' . $pro['id'] ?>" class="text-decoration-none">
                            <h5 class="card-title"><?= $pro['name'] ?></h5>
                        </a>
                        <p class="card-text">Giá: <?= $pro['price'] ?> VNĐ</p>
                        
                        <div class="mt-auto">
                            <button class="btn btn-danger w-100">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>