<?php   
require('./db_config.php');
session_start();
if(isset($_SESSION['admin'])){

    $sql_to_show_orders_to_user= "SELECT * FROM `orders`";

    $get_all_db_order_by_user = mysqli_query($conn, $sql_to_show_orders_to_user);

    $all_user_orders = mysqli_fetch_all($get_all_db_order_by_user, MYSQLI_ASSOC);

    if(isset($_POST['order_status_confirm'])){
        $order_id = $_POST['orderId'];
        $order_status_change= $_POST['order-status-change'];
        $payment_status= $_POST['payment_status'];
        $dispatched_msg= $_POST['dispatched_msg'];
        $shipped_msg= $_POST['shipped_msg'];
        $delivery_msg= $_POST['delivery_msg'];
        $sql_to_change_order_status = "UPDATE `orders` SET `order_status`='$order_status_change',`payment_status`='$payment_status',`dispatched_msg`='$dispatched_msg',`shipped_msg`='$shipped_msg',`delivery_msg`='$delivery_msg' WHERE `id`='$order_id'";
        $result = mysqli_query($conn, $sql_to_change_order_status);
        if(mysqli_num_rows($result)>0){
            header("Location: ./orders.php");
            echo '<script>alert("Order Status Changed")</script>';
        }
        else{
            echo '<script>alert("Could not able to change the status")</script>';
            header("Location: ./orders.php");
        }
    }

}
else{
    header(("Location: ./log-in.php?err=Please Login To Continue"));
    }
?>