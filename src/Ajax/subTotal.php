<?php
session_start();
include "functions.php";
if ($_REQUEST['action'] == 'subtotal') {
    $subtotal=0;
    foreach ($_SESSION['cart'] as $key => $val) {
        $product =findProduct($val['id']);
        $subtotal += $product['price']*$val['quantity'];
    }
   echo json_encode($subtotal);
}
?>
