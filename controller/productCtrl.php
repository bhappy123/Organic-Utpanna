<?php
session_start();

require 'db_config.php' ;
$category = $_REQUEST['category'];
$_SESSION['global_location'] = $_REQUEST['locationFilter'];
$locationFilter = $_SESSION['global_location'];

if ($category === "all" && $locationFilter==="All") {
    $sql = "SELECT * FROM `product` ";
}
else if ($category === "all") {
    $sql = "SELECT * FROM `product` WHERE ".$locationFilter."='yes' ";
}
else if($locationFilter==="All"){
    $sql = "SELECT * FROM `product` WHERE `category`='$category' ";
}
else{
    $sql = "SELECT * FROM `product` WHERE `category`='$category' AND ".$locationFilter."='yes'";
}

$res = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($res, MYSQLI_ASSOC);




echo json_encode($products);
