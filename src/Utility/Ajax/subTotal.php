<?php
require_once("../functions.php");
session_start();
if ($_REQUEST['action'] == 'subtotal')
{
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $k => $object)
    {
        $quantity = $_SESSION['cart'][$k]->quantity;
        $price = json_encode($object->getPrice());
        $subtotal += ($quantity * $price);
    }
    echo json_encode($subtotal);
}
