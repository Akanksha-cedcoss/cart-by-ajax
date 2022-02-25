<?php
namespace App;
require_once("../functions.php");

/**
 * Handle Ajax requst to delete product
 */
if ($_REQUEST['action'] == 'deleteproduct') {
    $id = $_REQUEST['id'];
    foreach ($_SESSION['cart'] as $k => $object) {
        if ($object->getId() == $id) {
            array_splice($_SESSION['cart'], $k, 1);
            echo json_encode($_SESSION['cart']);
        }
    }
}
