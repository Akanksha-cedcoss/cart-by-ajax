<?php
session_start();
if ($_REQUEST['action'] == 'deleteproduct') {
    $id = $_REQUEST['id'];
    foreach ($_SESSION['cart'] as $key => $val) {
        if ($_SESSION['cart'][$key]['id'] == $id) {
            array_splice($_SESSION['cart'], $key, 1);
            echo json_encode($_SESSION['cart']);
        }
    }
}
