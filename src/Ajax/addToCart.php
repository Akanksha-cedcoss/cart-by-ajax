<?php
session_start();
if ($_REQUEST['action'] == 'addToCart') {
    $id = $_REQUEST['id'];
    $bool = FALSE;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $val) {
            if ($val['id'] == $id) {
                $_SESSION['cart'][$key]['quantity'] += 1;
                $bool = TRUE;
            }
        }
        if (!$bool) {
            array_push($_SESSION['cart'], ['id' => $id, 'quantity' => 1]);
            $bool = True;
        }
    } else {
        $_SESSION['cart'] = array();
        array_push($_SESSION['cart'], ['id' => $id,'quantity' => 1]);
    }
    echo json_encode($_SESSION['cart']);
}
