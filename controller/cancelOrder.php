<?php 
require 'db_config.php' ;
if(isset($_POST['cancelSubmitBtn'])){
    $orderId= $_POST['orderId'];
    if ($orderId) {
        $sql_to_get_order_status = "SELECT `order_status` FROM `orders` WHERE `id`='$orderId'";
        $res = mysqli_query($conn, $sql_to_get_order_status);
        $resassoc = mysqli_fetch_all($res, MYSQLI_ASSOC);
        $order_status = $resassoc[0]['order_status'];
        if($order_status === "Initiated"){
            $cancelMsg = "Cancelation Initiated";
            $sql_to_change_order_status = "UPDATE `orders` SET `order_status`='$cancelMsg' WHERE `id`='$orderId'";
            $res_of_status_change = mysqli_query($conn,  $sql_to_change_order_status);

            $reason =$_POST['reason'];
            $sql_to_insert_cancel_table = "INSERT INTO `order_cancelation`(`order_id`, `reason`) VALUES ('$orderId', '$reason')";
            $res_of_insert_cancel = mysqli_query($conn,  $sql_to_insert_cancel_table);
            
            if($res_of_insert_cancel){
                header("Location: ../cancel-success.php?cancelSuccess=".$orderId);
            }
            else{
                header("Location: ../order-cancel.php?err=Something Went Wrong");
            }
        }
        else if($order_status = "dispatched"){
            header("Location: ../order-cancel.php?err=order Dispatched Cann't Initiate Return ");
        }
        else if($order_status = "completed"){
            header("Location: ../order-cancel.php?err=order Completed Can not Initiate Return ");
        }
        else{
            header("Location: ../order-cancel.php?err=Something Went Wrong");

        }

    }
    else{
        header("Location: ../order-cancel.php?err=This is not a valid attempt");
    }
}
?>