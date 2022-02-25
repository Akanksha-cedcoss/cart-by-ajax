<?php
namespace App;
require_once("product.php");
session_start();

/**
 * class Cart
 */
class Cart
{

    /**
     * Cart class constructor
     */
    public function __construct()
    {
        $_SESSION['cart'];
    }

    /**
     * checks if isItemExists in cart already
     *
     * @param [type] $id
     * @return boolean
     */
    public function isItemExists($id)
    {
        foreach ($_SESSION['cart'] as $k => $object)
        {
            if ($object->getId() == $id)
            {
                return true;
            }
        }
        return false;
    }

    /**
     * add Product into cart
     *
     * @param Product $product
     * @return void
     */
    public function addToCart(Product $product)
    {
        isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        $session = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        if(isset($_SESSION['cart']) and $this->isItemExists($product->getId()) )
        {
            $this->increaseQuantity($product->getId());
        } else {
            $product->quantity = 1;
            array_push($session, $product);
            $_SESSION['cart'] = $session;
        }
        
    }

    /**
     * increase quantity by one if item exits in cart already
     *
     * @param [type] $id
     * @return void
     */
    public function increaseQuantity($id)
    {
        foreach ($_SESSION['cart'] as $k => $object) {
            if ($object->getId() == $id) {
                $_SESSION['cart'][$k]->quantity += 1;
                break;
            }
        }
    }

    /**
     * return session cart
     *
     * @return void
     */
    public function getCart()
    {
        return $_SESSION['cart'];
    }

    
}
