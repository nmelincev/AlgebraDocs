<?php
session_start();

require_once 'controllers/ProductController.php';
require_once 'controllers/UserController.php';

echo "URI: $uri<br>"; 

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/register') {
    $controller = new UserController();
    $controller->showRegisterForm();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/register/submit') {
    $controller = new UserController();
    $controller->register();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/login') {
    $controller = new UserController();
    $controller->showLoginForm();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/login/submit') {
    $controller = new UserController();
    $controller->login();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/logout') {
    $controller = new UserController();
    $controller->logout();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/products') {
    $controller = new ProductController();
    $controller->listProducts();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/products/add') {
    $controller = new ProductController();
    $controller->showAddProductForm();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/products/add/submit') {
    $controller = new ProductController();
    $controller->addProduct();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/products/edit') {
    $controller = new ProductController();
    $controller->showEditProductForm();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/products/edit/submit') {
    $controller = new ProductController();
    $controller->editProduct();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/products/delete') {
    $controller = new ProductController();
    $controller->showDeleteProductForm();
} elseif ($uri === '/Algebra/Napredni%20PHP/Zadatak%20-%20Sustav%20za%20upravljanje%20inventarom/products/delete/submit') {
    $controller = new ProductController();
    $controller->deleteProduct();
} else {
    echo "404 Not Found";
}
?>
