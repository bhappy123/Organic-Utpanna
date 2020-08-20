<?php
require 'db_config.php' ;
if(isset($_REQUEST['category'])){
$category = $_REQUEST['category'];
$sql = "SELECT * FROM `product` WHERE `category`='$category' ";
$res = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
else{
    header("Location: ../index.php?err=Choose a Category");
}

?>