<?php
session_start();

require 'db_config.php' ;
$category = $_REQUEST['category'];
$_SESSION['global_location'] = $_REQUEST['locationFilter'];
$locationFilter = $_SESSION['global_location'];

if ($category === "all" && $locationFilter==="All") {
    $sql = "SELECT * FROM `product` LIMIT 40 ";
}
else if ($category === "all") {
    $sql = "SELECT * FROM `product` WHERE ".$locationFilter."='yes' LIMIT 40 ";
}
else if($locationFilter==="All"){
    $sql = "SELECT * FROM `product` WHERE `category`='$category' LIMIT 40 ";
}
else{
    $sql = "SELECT * FROM `product` WHERE `category`='$category' AND ".$locationFilter."='yes' LIMIT 40 ";
}

$res = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($res, MYSQLI_ASSOC);




echo json_encode($products);
