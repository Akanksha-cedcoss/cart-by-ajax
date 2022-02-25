<?php
namespace App;
require_once("class/cart.php");
require_once("class/product.php");

session_start();
$product1 = new Product(101, "BasketBall", 150, "basketball.png");
$product2 = new Product(102, "FootBall", 120, "football.png");
$product3 = new Product(103, "Soccer", 110, "soccer.png");
$product4 = new Product(104, "Table Tennis", 130, "table-tennis.png");
$product5 = new Product(105, "Tennis", 100, "tennis.png");


$_SESSION['products'] = array($product1, $product2, $product3, $product4, $product5);

/**
 * get Product object
 *
 * @param [int] $id
 * @return [Produce]
 */
function getProduct($id)
{
    foreach ($_SESSION['products'] as $k => $product) {
        if ($product->getId() == $id) {
            return $_SESSION['products'][$k];
        }
    }
}

/**
 * Dynamic product listing
 *
 * @return void
 */
function productListing()
{
    $html = "";
    foreach ($_SESSION['products'] as $product) {
        $html .= "<div id='" . $product->getId() . "' class='product'>
                <img src='images/" . $product->getImage() . "'>
                <h3 class='title'><a href='#'>" . $product->getName() . "</a></h3>
                <span>Price: $" . $product->getPrice() . "</span>
                <a class='add-to-cart' data=" . $product->getId() . ">Add To Cart</a></div>";
    }

    echo $html;
}
