<?php
require 'db_config.php' ;
if(isset($_REQUEST['category'])){
$locationFilter = $_SESSION['global_location'];
$category = $_REQUEST['category'];
$sql = "SELECT * FROM `product` WHERE `category`='$category' AND ".$locationFilter."='yes'";
$res = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
else{
    header("Location: ../index.php?err=Choose a Category");
}

?>