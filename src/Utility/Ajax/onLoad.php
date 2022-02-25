<?php
session_start();

/**
 * Load product cart and fetch products added previously in cart 
 */
if ($_REQUEST['action'] == 'showprevious') {
    if (isset($_SESSION['cart'])) {
        echo json_encode($_SESSION['cart']);
    }
}
