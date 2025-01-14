<?php
class HomeController
{
    //Hiển thị trang chủ
    public function index()
    {
        //Lấy pét
        $product = new Product;
        $pets = $product->listPets();

        //Lấy sản phẩm khác
        $list_products = $product->listOtherProduct();

        //Lây ra danh mục
        $categories = (new Category)->list();

        // lưu lại đường dẫn vào session
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];
        return view(
            'clients.home',
            compact('pets', 'list_products', 'categories')
        );
    }
}
