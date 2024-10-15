<?php
require_once 'models/Product.php';
require_once 'views/View.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $db = new PDO('mysql:host=localhost;dbname=inventory', 'root', '');
        $this->productModel = new Product($db);
    }

    public function listProducts() {
        $products = $this->productModel->getAllProducts();
        View::render('products/list.php', ['products' => $products]);
    }

    public function showAddProductForm() {
        View::render('products/add.php');
    }

    public function addProduct() {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $this->productModel->addProduct($name, $quantity, $price);
        header('Location: /products');
    }

    public function showEditProductForm() {
        $id = $_GET['id'];
        $product = $this->productModel->getProductById($id);
        View::render('products/edit.php', ['product' => $product]);
    }

    public function editProduct() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $this->productModel->editProduct($id, $name, $quantity, $price);
        header('Location: /products');
    }

    public function showDeleteProductForm() {
        $id = $_GET['id'];
        $product = $this->productModel->getProductById($id);
        View::render('products/delete.php', ['product' => $product]);
    }

    public function deleteProduct() {
        $id = $_POST['id'];
        $this->productModel->deleteProduct($id);
        header('Location: /products');
    }
}
?>
