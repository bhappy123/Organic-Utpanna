<?php

    // DB Connection

use function PHPSTORM_META\map;

require 'db_config.php' ;

    if(isset($_POST['query'])){
        $inputText = $_POST['query'];

        $sql = "SELECT `id`, `item_name` FROM `product` WHERE `item_name` LIKE '%$inputText%' LIMIT 6";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $each_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($each_result as $item ) {
                echo  '<p><a href="product-detail.php?product='.$item['id'].'">'.$item['item_name'].'</p></a>';
            }
        }
        else{
            echo 'no result';
        }
    }