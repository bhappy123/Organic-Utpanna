<?php 
require 'db_config.php' ;
if(isset($_SESSION['userId'])){

// Getting All Data for Cart
$userId = $_SESSION['userId'];
$sql_to_get_cart_items = "SELECT * FROM `cart` WHERE `user_id`='$userId'";
$result = mysqli_query($conn, $sql_to_get_cart_items);
if(mysqli_num_rows($result)<0){
    header("Location: ../cart-empty.php");
}
else{
    $all_cart_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // print_r($all_cart_items);
}


// Getting All Data for Cart
}
else{
    header("Location: login.php?error=Log In To Use Cart");
}