<?php session_start();
include "header.php";
include "Ajax/functions.php";
//  unset($_SESSION['cart']);
//  unset($_SESSION['subtotal']);

print_r($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <link type="text/css" rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php  ?>
    <div id="main">
        <div id="products">
            <?php product_listing() ?>
        </div>
    </div>
    <div id='cart'>
    </div>
    <?php
    ?>
    <?php include "footer.php" ?>
<script src="script.js"></script>
</body>

</html>