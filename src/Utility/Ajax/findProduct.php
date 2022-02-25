<?php
namespace App;
require_once("../functions.php");
//find product in products
if ($_REQUEST['action'] == 'findindex') {
    $id = $_REQUEST['id'];
    $product =getProduct($id);
    echo json_encode(array("id"=>$product->getId(),
            "name" => $product->getName(),
            "image" =>$product->getImage(),
            "price" => $product->getPrice()));
    
}
