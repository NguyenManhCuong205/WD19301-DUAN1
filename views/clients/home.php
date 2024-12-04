 <?php include_once ROOT_DIR . "views/clients/header.php" ?>
 <div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
     <div class="carousel-inner">
         <div class="carousel-item active">
             <img src="images/0.jpg" class="d-block w-100" alt="Banner 1">
         </div>
         <div class="carousel-item active">
             <img src="images/1.jpg" class="d-block w-100" alt="Banner 2">
         </div>
         <div class="carousel-item active">
             <img src="images/2.jpg" class="d-block w-100" alt="Banner 3">
         </div>
         <div class="carousel-item active">
             <img src="images/3.jpg" class="d-block w-100" alt="Banner 4">
         </div>
     </div>
     <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
     </button>
     <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
     </button>
 </div>


 <!-- Bộ lọc sản phẩm -->

 <section class="filters py-4">
     <div class="container">
         <h2>Lọc sản phẩm</h2>
         <div class="row">
             <div class="col-md-4">
                 <select class="form-select">
                     <option value="all">Tất cả</option>
                     <option value="dogs">Gaming</option>
                     <option value="cats">Văn phòng</option>
                     <option value="other">Khác</option>
                 </select>
             </div>
             <div class="col-md-4">
                 <select class="form-select">
                     <option value="low-high">Giá từ thấp đến cao</option>
                     <option value="high-low">Giá từ cao đến thấp</option>
                 </select>
             </div>
             <div class="col-md-4">
                 <select class="form-select">
                     <option value="newest">Mới nhất</option>
                     <option value="bestseller">Bán chạy</option>
                 </select>
             </div>
         </div>
     </div>
 </section>

 <!-- Danh sách sản phẩm -->
 <section id="products" class="product-list py-4">
     <div class="container">
         <h2>Các mẫu Laptop</h2>
         <div class="row">
             <?php
                $count = 0;
                foreach ($list_products as $pro):
                    if ($count == 12) break;
                ?>
                 <div class="col-md-3 mb-4">
                     <div class="product card shadow-sm">
                         <img src="images/<?= $pro['image'] ?>" alt="<?= $pro['name'] ?>" class="card-img-top">
                         <div class="card-body text-center">
                             <a href="<?= ROOT_URL . '?ctl=detail&id=' . $pro['id'] ?>">
                                 <h5 class="card-title"><?= $pro['name'] ?></h5>
                             </a>
                             <p class="card-text">Giá: <?= $pro['price'] ?> VND</p>
                             <div class="add-to-cart mt-3">
                                 <a href="<?= ROOT_URL . '?ctl=add-cart&id=' . $pro['id'] ?>" class="btn btn-danger btn-lg">
                                     <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php
                    $count++;
                endforeach;
                ?>
         </div>
         <!-- Phân trang -->
         <div class="pagination d-flex justify-content-center mt-3">
             <button class="btn btn-danger me-2">&lt;</button>
             <button class="btn btn-danger me-2">1</button>
             <button class="btn btn-danger me-2">2</button>
             <button class="btn btn-danger me-2">3</button>
             <button class="btn btn-danger">&gt;</button>
         </div>
     </div>
 </section>

 <!-- Sản phẩm khác -->


 <!-- Footer -->
 <?php include_once ROOT_DIR . "views/clients/footer.php" ?>