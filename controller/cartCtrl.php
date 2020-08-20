<?php
require 'db_config.php' ;
session_start();

//NOTE Adding To Cart 
if(isset($_SESSION['userId'])){
    if(isset($_POST['pid'])){

        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $psize = $_POST['psize'];
        $quantity = 1;
        $userId = $_SESSION['userId'];
        
        $sql_query_to_check_item_is_availability = "SELECT * FROM `cart` WHERE `product_id`='$pid' AND `user_id`='$userId'";
        $res = mysqli_query($conn, $sql_query_to_check_item_is_availability);
        if(mysqli_num_rows($res)>0){
            echo 'Item is Already There in Cart';
        }
        else{
            $sql_query_to_add_inside_cart = "INSERT INTO `cart`(`product_name`, `product_price`, `product_image`, `quantity`, `product_id`, `user_id`,`main_price`) VALUES ('$pname','$pprice','$pimage','$quantity','$pid','$userId','$pprice')" ;
            $insert_result=mysqli_query($conn, $sql_query_to_add_inside_cart);
            echo("Item Added Successfully");
        }

    }
}
else{
    echo("login first");
}
// End Of adding to Cart


//NOTE  Deleting From Cart

if(isset($_GET['deleteFromCart'])){
    if(isset($_GET['userId'])){
    $d_cart_productId = $_GET['deleteFromCart'];
    $d_userId = $_GET['userId'];
    $sql_to_delete_from_cart = "DELETE FROM `cart` WHERE `id`='$d_cart_productId' AND `user_id`='$d_userId'";
    $deleteResult = mysqli_query($conn, $sql_to_delete_from_cart);
    if($deleteResult){
        header("Location: ../cart.php");
    }
    else{
        echo 'Something Wrong Happened';
    }
    }
}

// Deleting From Cart
// Increase Decrease In Quantity
if(isset($_POST['productQuantity'])){
    $productQuantity = $_POST['productQuantity'] + 0;
    $hCartItemId = $_POST['hCartItemId'];
    $hCartUserId = $_POST['hCartUserId'];
    $hCartItemPrice = $_POST['hCartItemPrice'];
    $hCartItemMainPrice = $_POST['hCartItemMainPrice'];
    $coupon = $_POST['coupon'];
    $hCartItemPrice = $hCartItemMainPrice * $productQuantity;
    if( $productQuantity >= 1){
        $sql_to_update_qty_change = "UPDATE `cart` SET `product_price`='$hCartItemPrice',`quantity`='$productQuantity' WHERE `id`='$hCartItemId' AND `user_id`='$hCartUserId'";
    
        $updateCart = mysqli_query($conn, $sql_to_update_qty_change);

        echo $productQuantity;
    }
    else{
        echo 'Enter A Valid Quantity';
    }

}
// Increase Decrease In Quantity
else{
    "Location: login.php?error=Log In To Use Cart";
}