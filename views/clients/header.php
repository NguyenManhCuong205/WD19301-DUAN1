<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenovo Store <?= $title ?? '' ?></title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .cart-icon {
        position: relative;
        color: #333;
        text-decoration: none;
        margin-left: 15px;
        font-size: 20px;
        padding-right: 20px;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: 10px;
            background-color: #ff4500;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
        .btdn {
            background-color: #dc3545;
            width: 100px;
            height: 36.23px;
            border: none;
            color: white;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .btdn:hover {
            background-color: #b02a37;
        }

        .logo {
            border-radius: 10px;
        }

        .nav-link {
            text-decoration: none;
            font-weight: bold;
            color: black;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .btndanger {
            width: 100px;
            padding: 5px 10px;
        }

        body {
            margin: auto;
            width: 1200px;
        }

        .card-title {
            color: black;
        }

        .form-control {
            width: 200px; /* Giảm chiều rộng */
            
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #dc3545;
            
        }

        .search-container {
            display: flex;
            gap: 10px;
            align-items: center;
            padding-left: 70px;
        }
        /* Nút Đăng nhập */
        .btdn {
            background-color: #dc3545;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btdn:hover {
            background-color: #b02a37;
        }

        /* Overlay (phần nền tối khi popup hiện) */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        /* Popup container */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1001;
        }

        .popup h2 {
            margin-top: 0;
            color: #dc3545;
        }

        .popup .tab {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .popup .tab button {
            flex: 1;
            padding: 10px;
            border: none;
            background: #f5f5f5;
            cursor: pointer;
            font-size: 16px;
        }

        .popup .tab button.active {
            background: #dc3545;
            color: white;
        }

        .popup form {
            display: none;
        }

        .popup form.active {
            display: block;
        }

        .popup form .form-group {
            margin-bottom: 15px;
        }

        .popup form .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .popup form .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .popup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }
        
    </style>
</head>

<body onload="start()">
    <!-- Thanh điều hướng -->
    <header class="bg-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <img class="logo" src="images/images.png" width="150px" height="50px" alt="Logo">
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="<?= ROOT_URL ?>">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($categories as $cate): ?>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                                        <?= $cate['cate_name'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        </select></li>
                    <li class="nav-item"><a class="nav-link" href="<?= ROOT_URL . '?ctl=category&id='. 1?>">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= ROOT_URL . 'views/clients/contact.php'?>">Liên hệ</a></li>
                    <li>
                        <div class="search-container">
                            <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                            <button class="btn btn-danger btndanger">Tìm kiếm</button>
                        </div>
                    </li>
                    <li class="nav-item" style="font-size: 12px;">
                        <a class="nav-link dropdown-toggle" href="<?= ROOT_URL ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <?= $_SESSION['user']['fullname'] ?? '' ?>
                        </a>
                            <ul class="dropdown-menu">
                                    <?php if (isset($_SESSION['user'])) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= ROOT_URL ?>">
                                            Thông tin tài khoản
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=logout'?>">
                                            Đăng xuất
                                        </a>
                                    </li>
                                    <?php else : ?>
                                        <li>
                                        <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=login'?>">
                                            Đăng nhập
                                        </a>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="<?= ROOT_URL . '?ctl=register'?>">
                                            Đăng ký
                                        </a>
                                    </li>
                                    <?php endif ?>
                                </ul>
                    </li>
                </ul>
            </nav>
            

            <a href="<?= ROOT_URL . '?ctl=view-cart' ?>" class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count"><?= $_SESSION['totalQuantity'] ?? '0' ?></span>
            </a>
            <!-- Nút Đăng nhập -->
   
        </div>
        
    </header>
</body>

</html>