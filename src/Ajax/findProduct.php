<?php
session_start();
//find product in products
if ($_REQUEST['action'] == 'findindex') {
    $id = $_REQUEST['id'];
    for ($i = 0; $i < 5; $i++) {
        if ($_SESSION['products'][$i]['id'] == $id) {
            echo json_encode($_SESSION['products'][$i]);
        }
    }
}
?>
