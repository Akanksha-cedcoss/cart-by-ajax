<?php
require_once("../class/cart.php");
require_once("../functions.php");
session_start();
if ($_REQUEST['action'] == 'addToCart') {
    $id = $_REQUEST['id'];
    $product = getProduct($id);
    if(!isset($cart)){
        $cart = new Cart();
    }
    $cart->addToCart($product);
    echo json_encode($_SESSION['cart']);
}
