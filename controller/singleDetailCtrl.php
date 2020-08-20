<?php
require 'db_config.php' ;
if(isset($_GET['product'])){
    $productId = $_GET['product'];
    $sql = "SELECT * FROM `product` WHERE `id`='$productId' ";
    $singleProductResult = mysqli_query($conn, $sql);

    $viewProduct = mysqli_fetch_all($singleProductResult, MYSQLI_ASSOC);
}

// 