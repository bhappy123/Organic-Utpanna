<?php 
require 'db_config.php' ;
if(isset($_SESSION['userId'])){
$userId = $_SESSION['userId'];

$total_items = "SELECT * FROM `cart` WHERE `user_id`='$userId'";
$total_items_result = mysqli_query($conn, $total_items);

$_SESSION['total_items']= mysqli_num_rows($total_items_result);
}