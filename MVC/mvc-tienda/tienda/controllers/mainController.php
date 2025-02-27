<?php
require_once('models/User.php');
require_once('models/Product.php');
require_once("models/Order.php");
require_once("models/OrderLine.php");
require_once('models/UserRepository.php');
require_once('models/ProductRepository.php');
require_once("models/OrderRepository.php");
require_once("models/OrderLineRepository.php");

session_start();

if (isset($_GET['c']) && $_GET['c'] === 'login') {
    require_once("controllers/userController.php");
    exit();
}

if (isset($_GET['c']) && $_GET['c'] === 'register') {
    require_once("controllers/userController.php");
    exit();
}

if (isset($_GET['c']) && $_GET['c'] === 'product') {
    require_once("controllers/productController.php");
    exit();
}

if (isset($_GET['c']) && $_GET['c'] === 'cart') {
    require_once("controllers/orderController.php");
    exit();
}


if (isset($_POST['search'])) {
    $products = ProductRepository::getProductByName($_POST['search']);
} else {
    $products = ProductRepository::getProducts();
}

if (isset($_GET['viewTopProducts'])) {
    $topProducts = ProductRepository::getTopProducts();
    require_once('views/TopProductsView.phtml');
} else if (isset($_GET['viewTopUsers'])) {
    $topUsers = UserRepository::getTopUsers();
    require_once('views/TopUsersView.phtml');
} else {
    require_once('views/MainView.phtml');
}
