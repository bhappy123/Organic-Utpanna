<?php require('../controller/db_config.php');
session_start();
if(isset($_SESSION['deliveryBoyLocation'])){
    $delivery_location = $_SESSION['deliveryBoyLocation'];
    $stock_location = $delivery_location.'_stock';
    $sql_to_show_orders_to_user= "SELECT * FROM `orders` WHERE `location_filter`='$delivery_location'";

    $get_all_db_order_by_user = mysqli_query($conn, $sql_to_show_orders_to_user);

    $all_user_orders = mysqli_fetch_all($get_all_db_order_by_user, MYSQLI_ASSOC);

    if(isset($_POST['order_status_confirm'])){
        $order_id = $_POST['orderId'];
        $order_status_change= $_POST['order-status-change'];
        $payment_status= $_POST['payment_status'];
        $delivery_msg= $_POST['delivery_msg'];
        $sql_to_change_order_status = "UPDATE `orders` SET `order_status`='$order_status_change',`payment_status`='$payment_status' ,`delivery_msg`='$delivery_msg' WHERE `id`='$order_id'";
        $result = mysqli_query($conn, $sql_to_change_order_status);
        if($result){
            // If Order Us delivered then Remove the items from That location
            if($order_status_change === "Delivery"){
                $sql = "SELECT * FROM `inventory_management` WHERE `order_id`='$order_id'";
                $result = mysqli_query($conn, $sql);
                $all_order_items = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach ($all_order_items as $items) {
                    $p_qty = $items['product_quantity'];
                    $p_id = $items['product_id'];
                    echo $p_qty . $p_id . " " . $stock_location;
                    // To get the Stock Of Perticular Location
                    
                    $sql = "SELECT `$stock_location` FROM `product` WHERE `id`='$p_id'";
                    $result = mysqli_query($conn, $sql);
                    $stock = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    print_r($stock);
                    echo $stock[0][$stock_location];
                    $available_stock = $stock[0][$stock_location] - $p_qty;
                    echo $available_stock;
                    $sql = "UPDATE `product` SET `$stock_location`='$available_stock' WHERE `id`='$p_id'";
                    $result = mysqli_query($conn, $sql);
                    $sql = "DELETE FROM `inventory_management` WHERE `order_id`='$order_id'";
                    $result = mysqli_query($conn, $sql);


                }

            }
            echo '<script>alert("Order Status Changed")</script>';
            header("Location: ./index.php");
        }
        else{
            echo '<script>alert("Could not able to change the status")</script>';
            // header("Location: ./index.php");
        }
    }

}
else{
    header(("Location: ./log-in.php?err=Please Login To Continue"));
    }
?>