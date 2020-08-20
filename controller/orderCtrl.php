<?php 
require 'db_config.php' ;
if(isset($_POST['checkOutBtn']))
{   
    if($_POST['hUserId']){
        $hUserId = $_POST['hUserId'];
        $c_name = $_POST['c_name'];
        $c_phone = $_POST['c_phone'];
        $c_email = $_POST['c_email'];
        $c_address = $_POST['c_address'];
        $c_zip = $_POST['c_zip'];
        $payment_mode = "COD";
        $hCouponStatus = $_POST['hCouponStatus'];
        // Set Using Cart DB
        $grand_price=0;
        $order_items = array();
        $order_status = "Initiated";
        date_default_timezone_set('Asia/Kolkata'); 
        $order_time =  date('h:i a m/d/Y', strtotime("now"));
        // Fetched Data From Cart
        $sql = "SELECT CONCAT(`product_name`,'(', `quantity`,')') AS `ItemQty`,`product_price` FROM `cart` WHERE `user_id`='$hUserId'";
        $res = mysqli_query($conn, $sql);
       if(mysqli_num_rows($res)>0){
        $all_item_n_price = mysqli_fetch_all($res, MYSQLI_ASSOC);
       foreach ($all_item_n_price as $all_price) {

    //Total Price of All Products i.e grand Price
          $grand_price += $all_price['product_price'];
          array_push($order_items, $all_price['ItemQty'] ." ");
       }
       if ($hCouponStatus === "yes") {
           $grand_price *= 0.9;
       }
       if($grand_price < 500){
           $grand_price += 60;
       }
    //    All items in String Format
       $all_ordered_items = implode(", ", $order_items);
    //    echo $all_ordered_items;
    //    echo $grand_price;

    //    Insert Into Order Table
       $grand_price = round($grand_price,0);
       $sql_to_insert_order_data = "INSERT INTO `orders`(`name`, `email`, `zip_code`, `address`, `phone`, `payment_mode`, `products`, `order_time`, `user_id`,`order_status`,`payment`) 
                                    VALUES ('$c_name','$c_email','$c_zip','$c_address','$c_phone','$payment_mode','$all_ordered_items','$order_time','$hUserId','$order_status', '$grand_price')";
       $result_insert_data = mysqli_query($conn, $sql_to_insert_order_data);

       if($result_insert_data)
       {
        //    echo '<script>alert("Order Successful")</script>';
          $sql_to_clear_cart= "DELETE FROM `cart` WHERE `user_id`='$hUserId'";
          $result_of_clear_cart = mysqli_query($conn, $sql_to_clear_cart);
          header("Location: ../order-success.php");
       }
       else{
           echo '<script>alert("Order Unsuccessful")</script>';
       }
    }
    else{
        header("Location: ../checkout.php?err=Nothing Available In Cart");
    }
    }
}

if(isset($_SESSION['userId'])){
    $user_id= $_SESSION['userId'];
    $sql_to_show_orders_to_user= "SELECT * FROM `orders` where `user_id`='$user_id'";
    $get_all_db_order_by_user = mysqli_query($conn, $sql_to_show_orders_to_user);
    $all_user_orders = mysqli_fetch_all($get_all_db_order_by_user, MYSQLI_ASSOC);
    // print_r($all_user_orders);
}
else{
    "Location: login.php?error=Log In To See Your Orders";
}
?>