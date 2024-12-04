 <?php

class CartController {
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart() {
        // unset( $_SESSION['cart']);
        // lấy giỏ hàng nếu có, còn không thì tạo giỏ hàng mới
        $carts = $_SESSION['cart'] ?? [];

        // lấy id sản phẩm muốn thêm từ giỏ hàng
        $id = $_GET['id'];
        // Tìm sản phẩm theo id
        $product = (new Product)->find($id);

        // nhặt hàng vào giỏ
        // nếu hàng đã tồn tai trong giỏ
        // thì tăng số lượng sản phẩm, nếu chưa tồn tại thì thêm mới
        if (isset($carts[$id])) {
            // tăng số lượng lên
            $carts[$id]['quantity'] += 1;
        } else {
            // đưa sản phẩm vào giỏ
            $carts[$id] = [
                'name'       => $product['name'],
                'image'      => $product['image'],
                'price'      => $product['price'],
                'quantity'   => 1,
            ];
        }
        // lấy tổng số lượng giỏ hàng lưu vào session
        $_SESSION['totalQuantity'] = $this-> totalSumQuantity($carts);
        // gán lại giỏ hàng cho session
        $_SESSION['cart'] = $carts;

        $uri = $_SESSION['URI']; // Thông tin của đường dẫn trước đó
        // unset( $_SESSION['URI']);
        // di chuyển website về trang cũ
        return header("Location: " . $uri);
    }
    //tính tổng số lượng sản phẩm trong giỏ hàng
    public function totalSumQuantity($carts)
    {   
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['quantity'];
        }
        return $total;
    }

    // tính tổng tiền đơn hàng
    public function totalPriceOrder(){
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['price'] * $cart['quantity'];
        }
        return $total;
        
    }
    // view của giỏ hàng
    public function viewCart() {
        $carts = $_SESSION['cart']?? [];
        $totalPriceOrder = (new CartController)->totalPriceOrder();
        $totalPriceOrder = $this->totalPriceOrder();
        return view('clients.carts.carts', compact('carts', 'totalPriceOrder'));
    }
    // Xóa sản phẩm trong giỏ hàng
    public function deleteProductInCart() {
        // lấy id
        $id = $_GET['id'];
        // xóa sản phẩm
        unset($_SESSION['cart'][$id]);
        // quay lại giỏ hàng

        $_SESSION['totalQuantity'] = (new CartController)->totalSumQuantity($_SESSION['cart']);
        return header("Location:" . ROOT_URL . '?ctl=view-cart');
    }

    // cập nhật giỏ hàng
    public function updateCart(){
        $quantities = $_POST['quantity'];
        // dd($quantities);
        // cập nhật số lượng
        foreach($quantities as $id => $qty){
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }

        // lấy tổng số lượng giỏ hàng lưu vào session
        $_SESSION['totalQuantity'] = $this-> totalSumQuantity($_SESSION['cart']);
        return header("Location:" . ROOT_URL . '?ctl=view-cart');
    }

    // hiển thị thông tin thanh toán
    public function viewCheckOut(){
        // kiểm tra xem người dung đăng nhập vào chưa, nếu chưa thì vào login
        if (!isset($_SESSION['user'])){
            return header("Location:" . ROOT_URL . '?ctl=login');
        }

        $user = $_SESSION['user'];
        $carts = $_SESSION['cart'] ?? [];
        $totalPriceOrder = (new CartController)->totalPriceOrder();
        return view("clients.carts.checkout", compact('user', 'carts', 'totalPriceOrder'));
    }

    // thanh toán
    public function checkOut(){
        // lấy thông tin người dùng
        $user = [
            'id' => $_POST['id'],
            'fullname' => $_POST['fullname'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'role' => $_SESSION['user']['role'],
            'active' => $_SESSION['user']['active'],
        ];

        $totalPriceOrder = (new CartController)->totalPriceOrder();
        // lấy thông tin thanh toán
        $order = [
            'user_id' => $_POST['id'],
            'status' => 1,
            'payment_method'=> $_POST['payment_method'],
            'total_price' => $totalPriceOrder,
        ];

        (new user)->update($user['id'], $user);
        $order_id = (new Order)->create($order);

        $carts = $_SESSION['cart'];
        foreach($carts as $id => $cart){
            $or_detail = [
                'order_id' => $order_id,
                 'product_id' => $id,
                  'price' => $cart['price'],
                  'quantity' => $cart['quantity'],
            ];

            (new Order)->createOrderDetail($or_detail);
        } 

        $this->clearCart(); //xóa thông tin giỏ hàng
        return header("Location: " . ROOT_URL . "?ctl=success");
    }

    // xóa giỏ hàng
    public function clearCart(){
        unset($_SESSION['cart']);
        unset($_SESSION['totalQuantity']);
        unset($_SESSION['URI']);
    }

    public function success(){
        return view("clients.carts.success");
    }
}


    